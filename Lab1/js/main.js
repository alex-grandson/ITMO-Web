var r = document.getElementById("r")
var x = document.getElementById("x")
var y = document.getElementById("y")

function fieldsEmpty() {
    var isEmpty = false;

    if (!r.value) {
        r.style.borderBottom = "1px solid red";
        $('#messageR').text("Это поле обязательно для заполнения");
        isEmpty = true;
    } else $('#messageR').text("");

    if (!x.value) {
        x.style.borderBottom = "1px solid red";
        $('#messageX').text("Это поле обязательно для заполнения");
        isEmpty = true;
    } else $('#messageR').text("");

    if (!y.value) {
        y.style.borderBottom = "1px solid red";
        $('#messageY').text("Это поле обязательно для заполнения");
        isEmpty = true;
    } else $('#messageR').text("");

    return isEmpty;
}

function isValuesValid() {
    var isOK = true;
    if (parseFloat(r.value) != NaN && ![1, 2, 3, 4, 5].includes(parseFloat(r.value))) {
      r.style.borderBottom = "1px solid red";
      $('#messageR').text("Некорректный ввод");
      isOK = false;
    }
    if (parseFloat(x.value) != NaN && ![-2, -1.5, -1, -0.5, 0, 0.5, 1, 1.5, 2].includes(parseFloat(x.value))) {
      x.style.borderBottom = "1px solid red";
      $('#messageX').text("Некорректный ввод");
      isOK = false;
    }
    if (parseFloat(y.value) != NaN && (-5 > parseFloat(y.value) || parseFloat(y.value) > 3)) {
      y.style.borderBottom = "1px solid red";
      $('#messageY').text("Некорректный ввод");
      isOK = false;
    }
    return isOK;
}

//Валидация и отправка формы

$(document).ready(function() {
    $('[data-submit]').on('click', function(e) {
        e.preventDefault();
        var isOkFields = !fieldsEmpty();
        var isOkValues = isValuesValid();
        if (isOkFields && isOkValues) {
          $(this).parent('form').submit();
          $('#loader').fadeIn();
          var $form = $(form);
          var $formId = $(form).attr('id');

          if ($formId == 'form') {
                  $.ajax({
                      type: 'GET',
                      url: $form.attr('action'),
                      data: $form.serialize(),
                  })
                  .always(function(response) {
                      setTimeout(function() {
                          $('#loader').fadeOut();
                      }, 800);
                      setTimeout(function() {
                          $('#overlay').fadeIn();
                          $form.trigger('reset');
                          //строки для остлеживания целей в Я.Метрике и Google Analytics
                      }, 1100);
                      $('#overlay').on('click', function(e) {
                          $(this).fadeOut();
                      });

                  });

          }
        }


    })



});
