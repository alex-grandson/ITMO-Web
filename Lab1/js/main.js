var r = document.getElementById("r")
var x = document.getElementById("x")
var y = document.getElementById("y")
var table = document.getElementById("table");

function fieldsEmpty() {
    var isEmpty = false;

    if (!r.value) {
        // r.style.borderBottom = "1px solid red";
        $('#messageR').text("Это поле обязательно для заполнения");
        isEmpty = true;
    } else $('#messageR').text("");

    if (!x.value) {
        // x.style.borderBottom = "1px solid red";
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
    if (y.value > 3 || y.value < -5 || isNaN(y.value)){
      y.style.borderBottom = "1px solid red";
      $('#messageY').text("Некорректный ввод");
      isOK = false;
    }
    // if (parseFloat(y.value) != NaN && (-5 > parseFloat(y.value) || parseFloat(y.value) > 3)) {
    //   y.style.borderBottom = "1px solid red";
    //   $('#messageY').text("Некорректный ввод");
    //   isOK = false;
    // }
    return isOK;
}

function writeTable() {


}

//Валидация и отправка формы

$(document).ready(function() {
    $('[data-submit]').on('click', function(e) {
        e.preventDefault();
        let isOkFields = !fieldsEmpty();
        let isOkValues = isValuesValid();
        if (isOkFields && isOkValues) {

          $(this).parent('form').submit();
          var $form = $(form);
          let $formId = $(form).attr('id');

          if ($formId == 'form') {
            let r = new XMLHttpRequest();
                r.open('GET', 'cgi-bin/save.php', true);
                r.addEventListener('readystatechange', function() {
                  if ((r.readyState == 4) && (r.status == 200)) {
                    console.log(r.responseText);
                    if(r.responseText !== ''){
                      //document.getElementById('resultsOutput').style.opacity = 1;
                      var table = document.getElementById("tbody");
                      table.insertAdjacentHTML('beforeend', r.responseText);
                    }
                  }
                });
                r.send();
                  // $.ajax({
                  //     type: 'GET',
                  //     url: $form.attr('action'),
                  //     data: $form.serialize(),
                  //     // success:
                  // })
          }
        }
    })
});
