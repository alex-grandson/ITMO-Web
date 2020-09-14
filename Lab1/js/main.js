function validate() {
    var r = document.getElementById("r")
    var x = document.getElementById("x")
    var y = document.getElementById("y")

    if (!r.value) {
        r.style.borderBottom = "1px solid red";
        return false;
    }

    if (!x.value) {
        x.style.borderBottom = "1px solid red";
        return false;
    }

    if (!y.value) {
        y.style.borderBottom = "1px solid red";
        return false;
    }

    return true;
}