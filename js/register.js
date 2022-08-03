
$(".second").fadeOut();
$(".third").fadeOut();
$(".first").fadeIn();
$("#spinner").delay(1000).fadeOut();
var email

function verifyemail() {
    email = $('#email').val();
    $.post("registerparse.php", {
        verifyEmail: true,
        email: email
    },
        function (result) {
            console.log(result);
            if (result == 0) {
                document.getElementById('emailsubmit').disabled = true;
                document.getElementById('emailsubmit').className = "disabled";
                $('#email_validate').html('Email Already in Use');
            } else if (result == 1) {
                document.getElementById('emailsubmit').disabled = false;
                document.getElementById('emailsubmit').className = "button";
                $('#email_validate').html("");
            }
        });
};

document.getElementById("emailsubmit").addEventListener("click", function (event) {
    event.preventDefault()
});

function validatemail() {
    $("#spinner").fadeIn();
    document.getElementById('spinner').style.zIndex = "1"
    $(".third").fadeOut();
    $(".first").fadeOut();
    $(".second").delay(1000).fadeIn();
    console.log(email);
    $.post("registerparse.php", {
        validateEmail: true,
        email: email
    },
        function (result) {
            console.log(result)
            if (result == 1) {
                $("#spinner").fadeOut();
            }
        });
};


/****************************************************************************************************************** */

function verifyOtp() {
    var otp = $('#otp').val();
    console.log(otp)
    $.post("registerparse.php", {
        verifyOtp: true,
        otp: otp
    },
        function (result) {
            if (result == 1) {
                $('#verify_otp').html('');
                document.getElementById('otpsubmit').disabled = false;
                document.getElementById('otpsubmit').className = "button";
                console.log(result)
            } else {
                $('#verify_otp').html('Please Check the OTP You Have Entered');
                document.getElementById('otpsubmit').disabled = true;
                document.getElementById('otpsubmit').className = "disabled";
                console.log(result)
            }
        });
}



document.getElementById("otpsubmit").addEventListener("click", function (event) {
    event.preventDefault()
});


function parseOtp() {
    document.getElementById('spinner').style.zIndex = "1"
    $("#spinner").fadeIn()
    $(".first").fadeOut()
    $(".second").fadeOut()
    $(".third").delay(2000).fadeIn()
    $("#spinner").delay(1000).fadeOut()
    $('#emailholder').attr("placeholder", email);
};


/********************************************************************************************************************/


initMultiStepForm();

function initMultiStepForm() {
    const progressNumber = document.querySelectorAll(".step").length;
    const slidePage = document.querySelector(".slide-page");
    const submitBtn = document.querySelector(".submit");
    const progressText = document.querySelectorAll(".step p");
    const progressCheck = document.querySelectorAll(".step .check");
    const bullet = document.querySelectorAll(".step .bullet");
    const pages = document.querySelectorAll(".page");
    const nextButtons = document.querySelectorAll(".next");
    const prevButtons = document.querySelectorAll(".prev");
    const stepsNumber = pages.length;


    document.documentElement.style.setProperty("--stepNumber", stepsNumber);

    let current = 1;

    for (let i = 0; i < nextButtons.length; i++) {
        nextButtons[i].addEventListener("click", function (event) {
            event.preventDefault();

            inputsValid = validateInputs(this);
            // inputsValid = true;

            if (inputsValid) {
                slidePage.style.marginLeft = `-${(100 / stepsNumber) * current
                    }%`;
                bullet[current - 1].classList.add("active");
                progressCheck[current - 1].classList.add("active");
                progressText[current - 1].classList.add("active");
                current += 1;
            }
        });
    }

    for (let i = 0; i < prevButtons.length; i++) {
        prevButtons[i].addEventListener("click", function (event) {
            event.preventDefault();
            slidePage.style.marginLeft = `-${(100 / stepsNumber) * (current - 2)
                }%`;
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
    }

    function validateInputs(ths) {
        let inputsValid = true;

        const inputs =
            ths.parentElement.parentElement.querySelectorAll("input");
        for (let i = 0; i < inputs.length; i++) {
            const valid = inputs[i].checkValidity();
            if (!valid) {
                inputsValid = false;
                inputs[i].classList.add("invalid-input");
            } else {
                inputs[i].classList.remove("invalid-input");
            }
        }
        return inputsValid;
    }
}


document.addEventListener('keypress', function (e) {
    if (e.keyCode === 13 || e.which === 13) {
        e.preventDefault();
        return false;
    }

});

/******************************************************************************************************/

function phonenumber() {
    var inputtxt = document.getElementById('phone').value;
    result = /^\d{10}$/.exec(inputtxt);
    if (!result) {
        document.getElementById('phmessage').style.color = 'red';
        document.getElementById('phmessage').innerHTML = "*Phone Number Format is Incorrect";
        document.getElementById("registerSubmit").disabled = true;
        document.getElementById("phvalid").disabled = true;
        document.getElementById("phvalid").className = "disabledbutt";
        return false;
    }
    else {
        document.getElementById('phmessage').style.color = "green";
        document.getElementById('phmessage').innerHTML = '<p class="phonecheck"><i class="fas fa-check"></i>You can proceed now</p>';
        document.getElementById("phvalid").disabled = false;
        document.getElementById("phvalid").className = "btns"
        document.getElementById("registerSubmit").disabled = true;
        return true;
    }
};


function checkusername() {
    if ($('#username').val().length < 3) {
        $('#username_verify').html("Enter Atleast 3 Characters");
    } else {
        var username = $('#username').val();
        $.post("registerparse.php", {
            checkUsername: true,
            user: username
        },
            function (result) {
                if (result == 1) {
                    $('#username_verify').html(username + ' is Available');
                    document.getElementById('username_verify').style.color = 'green';
                    document.getElementById("uservalid").disabled = false;
                    document.getElementById("uservalid").className = "";
                } else {
                    $('#username_verify').html(username + ' is not Available');
                    document.getElementById('username_verify').style.color = 'red';
                    document.getElementById("uservalid").disabled = true;
                    document.getElementById("uservalid").className = "disabledbutt";
                }
            });
    }
};

function verifyPassword() {
    var pw = document.getElementById("pass").value;
    var cpw = document.getElementById("conpass").value;
    if (pw.length < 8 || cpw != pw) {
        document.getElementById('message').style.color = 'red';
        document.getElementById("message").innerHTML = "Invalid Password Format or Passwords Do Not Match";
        document.getElementById("registerSubmit").disabled = true;
        document.getElementById("registerSubmit").className = "disabledbutt";
        return false;
    } else {
        document.getElementById('message').style.color = 'white';
        document.getElementById("message").innerHTML = 'Make a <span style="font-weight:bolder;">Strong</span> and <span style="font-weight:bolder;">Memorable</span> Password that you will not use anywhere else.';
        document.getElementById("registerSubmit").className = "btns"
        document.getElementById("registerSubmit").disabled = false;
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


/****************************************************************************************************************************/

document.getElementById("registerSubmit").addEventListener("click", function (event) {
    event.preventDefault();
});

function registerParse() {
    var firstName = $('#fName').val()
    var lastName = $('#lName').val()
    var Phone = $('#phone').val()
    var username = $('#username').val()
    var dob = $('#dob').val()
    var gender = $('#gender').val()
    var password = $('#pass').val()

    $.post("registerparse.php", {
        submitData: true,
        fName: firstName,
        lName: lastName,
        email: email,
        phone: Phone,
        username, username,
        dob: dob,
        gender: gender,
        password: password,
    },
        function (result) {
            console.log(result)
            if (result == 1) {
                window.location.replace("index.php?register=true")
            }
        });
}
