let sumbitButton = document.querySelector('input[type="submit"]').addEventListener('click', register);

// Register validation.
//
function register(e) {
    if (document.getElementById('password_reg').value == "" || document.getElementById('password_reg_confirm').value == "") {
        window.alert("The password is blank.");
        document.getElementById('password_reg').style.border = "solid red 3pt";
        document.getElementById('password_reg_confirm').style.border = "solid red 3pt";
        e.preventDefault();
    } else if (document.getElementById('password_reg').value != document.getElementById('password_reg_confirm').value) {
        window.alert("The password confirm is unmatched.");
        document.getElementById('password_reg').style.border = "solid red 3pt";
        document.getElementById('password_reg_confirm').style.border = "solid red 3pt";
        e.preventDefault();
    }
}