<?php
session_start();

/* if (isset($_SESSION['email']) && isset($_SESSION['verifyFlag']) && isset($_SESSION['token']) && isset($_SESSION['verifykey'])) {
    if ($_SESSION['token'] == $_GET['token'] && $_SESSION['verifykey'] == $_GET['key']) {
        $email = $_SESSION['email'];
        $verifyFlag = $_SESSION['verifyFlag'];
        $token = $_SESSION['token'];
    } else {
        die("Invalid Token or Key");
    }
} else {
    die("Invalid Session");
} */

?>

<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css" />
</head>

</html>

<body>
    <!-- <div class="form__main">
        <form action="registerparse.php" method="POST">
            <h1>Welcome, Let's Start With Your Name</h1>
            <label for="fname">Enter Your First Name</label>
            <input type="text" name="fname" id="fname"><br>
            <label for="lname">Enter Your Last Name</label>
            <input type="text" name="lname" id="lname">


            <h1>Personal Identifiers</h1>
            <label for="email">Enter Your email</label>
            <input type="email" name="email" id="email" onkeyup="checkemail()" autocomplete="off">
            <p id='email_verify'></p>

            <label for="phone">Enter Your Phone number</label>
            <input type="number" name="phone" id="phone" onkeyup="checkphone()" autocomplete="off">
            <p id='phone_verify'></p>

            <label for="gender">What's Your Gender</label>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="dob">Enter Your Date Of Birth</label>
            <input type="date" name="dob" id="dob" />

            <h1>Pick a Nice Username</h1>
            <label for="username">Enter Your username</label>
            <input type='text' id='username' name="username" onkeyup="checkusername()" autocomplete="off">
            <p id='username_verify'></p>

            <h1>Now, Create a Strong Password for Your Account</h1>
            <label for="pass">Enter Your password</label>
            <input type="password" onkeyup="verifyPassword()" name="pass" id="pass" autocomplete="off"><br>
            <p id="message"></p>
            <label for="cpass">Confirm your password</label>
            <input type="password" name="conpass" id="conpass" onkeyup="confirmPassword()" autocomplete="off">
            <p id="message2"></p>
            <a onclick="showPass()">SHOW PASSWORD</a>

            <input type="submit" value="submit">
        </form>
    </div> -->




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
            <form action="registerparse.php" method="post">
                <div class="page slide-page">
                    <div class="title">What Should we Call You?</div>
                    <div class="field">
                        <div class="label">First Name</div>
                        <input type="text" name="fname" required />
                    </div>
                    <div class="field">
                        <div class="label">Last Name</div>
                        <input type="text" name="lname" required />
                    </div>
                    <div class="field">
                        <button class="first-next next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">How should we contact you?</div>
                    <div class="field">
                        <div class="label">Email Address</div>
                        <input type="email" name="email" placeholder="<?php echo $_SESSION['email']; ?>" disabled />
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
                        <input type="date" name="dob" required />
                    </div>
                    <div class="field">
                        <div class="label">Gender</div>
                        <select name="gender" required>
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
                        <input type="text" name="username" required />
                    </div>
                    <div class="field btns">
                        <button class="prev-4 prev">Previous</button>
                        <button class="next-4 next">Next</button>
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
                        <button type="submit" class="submit" id="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="js/register.js"></script>