$(document).ready(function () {
    $(".second").fadeOut();
    $(".third").fadeOut();
    $("#spinner").delay(1000).fadeOut();
    $(".first").fadeIn();
});

function checkemail() {
    var email = $('#email').val();
    $.post("resetvalidation.php", {
        verifyemail: true,
        email: email,
    },
        function (result) {
            if (result == 1) {
                document.getElementById('email_verify').style.color = "green"
                $('#email_verify').html('Good to Go!');
                document.getElementById('emailsubmit').disabled = false
                document.getElementById('emailsubmit').className = " "
            } else {
                document.getElementById('email_verify').style.color = "red"
                $('#email_verify').html('An account with this email does not exist')
                document.getElementById('emailsubmit').disabled = true;
                document.getElementById('emailsubmit').className = "disabled"
            }
        });
}

document.getElementById("emailsubmit").addEventListener("click", function (event) {
    event.preventDefault()
});

function emailsub() {
    $("#spinner").fadeIn();
    document.getElementById('spinner').style.zIndex = "1"
    $(".first").fadeOut();
    $(".second").fadeIn();
    $(".third").fadeOut();
    var email = $('#email').val();
    $.post("resetvalidation.php", {
        validateemail: true,
        email: email
    },
        function (result) {
            if (result == 1) {
                $("#spinner").fadeOut()
            } else {
            };
        });
}


/*******************************************************************************************************************/

function checkotp() {
    var otp = $('#otp').val();
    $.post("resetvalidation.php", {
        validateotp: true,
        otp: otp
    },
        function (result) {
            if (result == 1) {
                $('#otp_verify').html('Good to Go!');
                document.getElementById('otpsubmit').disabled = false;
                document.getElementById('otpsubmit').className = "button"
            } else {
                $('#otp_verify').html('Please Check the OTP You Have Entered')
                document.getElementById('otpsubmit').disabled = true;
                document.getElementById('otpsubmit').className = "disabled"
            }
        });
}

document.getElementById("otpsubmit").addEventListener("click", function (event) {
    event.preventDefault()
});

function resend() {
    $("#spinner").fadeIn();
    document.getElementById('spinner').style.zIndex = "1"
    $(".first").fadeOut();
    $(".second").fadeIn();
    $(".third").fadeOut();
    var email = $('#email').val();
    $.post("resetvalidation.php", {
        validateemail: true,
        email: email
    },
        function (result) {
            if (result == 1) {
                $('#otp_verify').html('Please Check the OTP You Have Entered')
                document.getElementById('otpsubmit').disabled = true;
                document.getElementById('otpsubmit').className = "disabled"
                document.getElementById('resendtext').innerHTML= "OTP Resent Successfully";
                $("#spinner").fadeOut()
            } else {
            };
        });
}

function otpsub() {
    $("#spinner").fadeIn()
    document.getElementById('spinner').style.zIndex = "1"
    $(".first").fadeOut()
    $(".second").fadeOut()
    $(".third").fadeIn()
    $("#spinner").delay(2000).fadeOut()
}

/*******************************************************************************************************************/

function verifyPassword() {
    var pw = document.getElementById("password").value
    var cpw = document.getElementById("conpassword").value
    if (pw.length < 8 || cpw != pw) {
        document.getElementById('pwsubmit').disabled = true;
        document.getElementById("message").innerHTML = "Invalid Password Format or Passwords Do Not Match"
        document.getElementById('pwsubmit').className = "disabled"
        return false;
    } else {
        document.getElementById('pwsubmit').disabled = false;
        document.getElementById("message").innerHTML = ""
        document.getElementById('pwsubmit').className = "button"
        return true;
    }
}

function showPass() {
    var pw = document.getElementById("password")
    var cpw = document.getElementById("conpassword")

    if (pw.type == 'password') {
        pw.type = 'text'
        cpw.type = 'text'
    } else {
        pw.type = 'password'
        cpw.type = 'password'
    }
}

document.getElementById("pwsubmit").addEventListener("click", function (event) {
    event.preventDefault()
});

function redirectreset() {
    var password = $('#password').val();
    $.post("resetvalidation.php", {
        changepassword: true,
        password: password
    },
        function (result) {
            if (result == 1) {
                window.location.replace("index.php?reset=true")
            } else {
                
            }
        });
}