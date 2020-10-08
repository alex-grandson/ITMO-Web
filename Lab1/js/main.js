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

//Валидация и отправка формы

$(document).ready(function() {
    $('[data-submit]').on('click', function(e) {
        e.preventDefault();
        let isOkFields = !fieldsEmpty();
        let isOkValues = isValuesValid();
        if (isOkFields && isOkValues) {

          $.ajax({
              url: "../save.php",
              async: true,
              type: "GET",
              data: {
                  "x": x.value,
                  "y": y.value,
                  "r": r.value
              },
              cache: false,
              success: function(response) {
                var table = document.getElementById("tbody");
                table.insertAdjacentHTML('beforeend', response);
              },
              error: function(xhr) {

              }
          });

          // $(this).parent('form').submit();
          // var $form = $(form);
          // let $formId = $(form).attr('id');
          // let dataString = 'x=${x.value}&y=${y.value}&r=${r.value}';
          // if ($formId == 'form') {
          //   let r = new XMLHttpRequest();
          //       r.open('GET', '../save.php?' + dataString, true);
          //       r.addEventListener('readystatechange', function() {
          //         if ((r.readyState == 4) && (r.status == 200)) {
          //           console.log(r.responseText);
          //           if(r.responseText !== ''){
          //             var table = document.getElementById("tbody");
          //             table.insertAdjacentHTML('beforeend', r.responseText);
          //           }
          //         }
          //       });
          //       r.send();
          // }
      }
    })
});
