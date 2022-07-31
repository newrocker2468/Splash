function checkemail() {
    var email = $('#email').val();
    $.post("check_email.php", {
        email: email
    },
        function (result) {
            if (result != 1) {
                $('#email_verify').html('Good to Go!');
                document.getElementById('submit').disabled = false;
                document.getElementById('submit').className = "";
            } else {
                $('#email_verify').html('An account with this email does not exist');
                document.getElementById('submit').disabled = true;
                document.getElementById('submit').className = "disabled";
            }
        });
}

function checkotp() {
    var otp = $('#otp').val();
    console.log(otp);
    $.post("check_otp.php", {
        otp: otp
    },
        function (result) {
            if (result == 1) {
                $('#otp_verify').html('Good to Go!');
                document.getElementById('submit').disabled = false;
                document.getElementById('submit').className = "button";
            } else {
                $('#otp_verify').html('Please Check the OTP You Have Entered');
                document.getElementById('submit').disabled = true;
                document.getElementById('submit').className = "disabled";
            }
        });
}

function verifyPassword() {
    var pw = document.getElementById("pass").value;
    var cpw = document.getElementById("conpass").value;
    if (pw.length < 8 || cpw != pw) {
        document.getElementById('submit').disabled = true;
        document.getElementById("message").innerHTML = "Invalid Password Format or Passwords Do Not Match";
        document.getElementById('submit').className = "disabled";
        return false;
    } else {
        document.getElementById('submit').disabled = false;
        document.getElementById("message").innerHTML = "";
        document.getElementById('submit').className = "button";
        return true;
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