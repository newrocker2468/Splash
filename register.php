<html>

<head>
    <title>
        Email Verification Phase
    </title>
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/register.css">
</head>

</html>
<div class="spinner__parent" id="spinner">
    <div class="spinner">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<body>
    <div class="first">
        <div class="form__main">
            <h1>Welcome To Splash</h1>
            <form action="" method="POST">
                <div class="form-control">
                    <input type="value" type="email" name="email" id="email" autocomplete="off" onkeyup="verifyemail()" >
                    <label>
                        <span style="transition-delay:0ms">E</span><span style="transition-delay:50ms">M</span><span style="transition-delay:100ms">A</span><span style="transition-delay:150ms">I</span><span style="transition-delay:200ms">L</span>
                    </label>
                </div>

                <button type="submit" name="emailsubmit" id="emailsubmit" class="button" onclick="validatemail()">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> Join The Club!
                </button>
            </form>
            <p id="email_validate" style="color:red"></p>
        </div>

    </div>

    <!------------------------------------------------------------------------------------------------------------------------->


    <div class="second">
        <div class="form__main">
            <form action="" method="POST">
                <div class="form-control">
                    <input type="number" name="otp" id="otp" autocomplete="off" onkeyup="verifyOtp()" >
                    <label>
                        <span style="transition-delay:0ms">O</span><span style="transition-delay:50ms">T</span><span style="transition-delay:100ms">P</span>
                    </label>
                </div>

                <button type="submit" name="otpsubmit" id="otpsubmit" value="otpsubmit" class="button" onclick="parseOtp()">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> Verify
                </button>
            </form>
            <p id="verify_otp" style="color:red"></p>
        </div>
    </div>



    <div class="third">
        <div class="container">
            <header>Splash</header>
            <div class="progress-bar">
                <div class="step">
                    <p>Name</p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Contact</p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Birth Info</p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Username</p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Password</p>
                    <div class="bullet">
                        <span>5</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
            </div>
            <div class="form-outer">
                <form action="" method="post">
                    <div class="page slide-page">
                        <div class="title">What Should we Call You?</div>
                        <div class="field">
                            <div class="label">First Name</div>
                            <input type="text" name="fname" id="fName" required />
                        </div>
                        <div class="field">
                            <div class="label">Last Name</div>
                            <input type="text" name="lname" id="lName"required />
                        </div>
                        <div class="field">
                            <button class="first-next next">Next</button>
                        </div>
                    </div>
                    <div class="page">
                        <div class="title">How should we contact you?</div>
                        <div class="field">
                            <div class="label">Email Address</div>
                            <input type="email" name="email" placeholder="" disabled id="emailholder"/>
                        </div>
                        <div class="field">
                            <div class="label">Phone Number</div>
                            <input type="number" name="phone" id='phone' onkeyup="phonenumber()" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required />
                        </div>
                        <div class="field1">
                            <p id='phmessage'></p>
                        </div>
                        <div class="field btns">
                            <button class="prev-1 prev">Previous</button>
                            <button class="next-1 next" id="phvalid">Next</button>
                        </div>
                    </div>
                    <div class="page">
                        <div class="title">Birth Information</div>
                        <div class="field">
                            <div class="label">Date</div>
                            <input type="date" name="dob" id="dob" required />
                        </div>
                        <div class="field">
                            <div class="label">Gender</div>
                            <select name="gender" id="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="field btns">
                            <button class="prev-4 prev">Previous</button>
                            <button class="next-4 next">Next</button>
                        </div>
                    </div>
                    <div class="page">
                        <div class="title">Username</div>
                        <div class="field">
                            <div class="label">Enter a meaningful username</div>
                            <input type="text" name="username" id="username" onkeyup="checkusername()" required />
                        </div>
                        <p id="username_verify"></p>
                        <div class="field btns">
                            <button class="prev-4 prev">Previous</button>
                            <button class="next-4 next" id="uservalid">Next</button>
                        </div>
                    </div>
                    <div class="page">
                        <div class="title" id='message'>Make a <span style="font-weight:bolder;">Strong</span> and <span style="font-weight:bolder;">Memorable</span> Password that you will not use anywhere else.</div>
                        <div class="field">
                            <div class="label">Password</div>
                            <input type="password" name="pass" id="pass" onkeyup='verifyPassword()' required />
                        </div>
                        <div class="field">
                            <div class="label">Confirm Password</div>
                            <input type="password" name="conpass" id="conpass" onkeyup='verifyPassword();' required /><br>
                        </div>
                        <div class="field1">
                            <p id="pwErrorField"></p>
                            <a class="eyeparent" onclick="showPass()" id="passeye">Show Password</a>
                        </div>
                        <div class="field btns">
                            <button class="prev-5 prev">Previous</button>
                            <button type="submit" class="submit" id="registerSubmit" onclick="registerParse()" >Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="js/register.js"></script>