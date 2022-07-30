function checkusername() {
    if ($('#username').val().length < 3) {
        $('#username_verify').html("Enter Atleast 3 Characters");
    } else {
        var username = $('#username').val();
        $.post("check_username.php", {
            user: username
        },
            function (result) {
                if (result == 1) {
                    $('#username_verify').html(username + ' is Available');
                } else {
                    $('#username_verify').html(username + ' is not Available');
                }
            });
    }
};

function verifyPassword() {
    var pw = document.getElementById("pass").value;
    var cpw = document.getElementById("conpass").value;
    if (pw.length < 8) {
        document.getElementById("message").innerHTML = "Password length must be atleast 8 characters";
        return false;
    } else {
        document.getElementById("message").innerHTML = "";
        return true;
    }
}

function confirmPassword() {
    var pw = document.getElementById("pass").value;
    var cpw = document.getElementById("conpass").value;
    if (cpw != pw) {
        document.getElementById("message2").innerHTML = "Passwords and Confirm Passwords Fields Do not Match";
    } else {
        document.getElementById("message2").innerHTML = "";
    }
}

function showPass() {
    var pw = document.getElementById("pass");
    var cpw = document.getElementById("conpass");

    if (pw.type == 'password') {
        pw.type = 'text'
        cpw.type = 'text'
    } else {
        pw.type = 'password'
        cpw.type = 'password'
    }
}

function checkemail() {
    var email = $('#email').val();
    $.post("check_email.php", {
        email: email
    },
        function (result) {
            if (result != 1) {
                $('#email_verify').html(email + ' is already in use');
            } else {
                $('#email_verify').html('');
            }
        });
}

function checkphone() {
    var phone = $('#phone').val();
    if ($('#phone').val().length == 10) {
        $('#phone_verify').html("")
        $.post("check_phone.php", {
            phone: phone
        },
            function (result) {
                if (result != 1) {
                    $('#phone_verify').html(phone + ' is already in use');
                }
            });
    } else {
        $('#phone_verify').html("Enter a Valid Phone Number");
    }
}