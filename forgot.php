<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/forgot.css">
</head>

</html>

<body>
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
    <div class="first">
        <svg width="100%" height="75%" class="wave" id="svg" viewBox="0 150 1440 400" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="5%" stop-color="#ac0f3cff"></stop>
                    <stop offset="95%" stop-color="#6f2232ff"></stop>
                </linearGradient>
            </defs>
            <path d="M 0,400 C 0,400 0,200 0,200 C 57.6958021623622,228.15897856142112 115.3916043247244,256.31795712284224 154,236 C 192.6083956752756,215.68204287715773 212.1293848634645,146.8871500700521 263,143 C 313.8706151365355,139.1128499299479 396.0908562214174,200.13344259694944 458,201 C 519.9091437785826,201.86655740305056 561.5071902508656,142.5790795421502 599,131 C 636.4928097491344,119.4209204578498 669.8803827751198,155.55023923444975 714,163 C 758.1196172248802,170.44976076555025 812.9712786486556,149.21996352005075 862,152 C 911.0287213513444,154.78003647994925 954.2345026302573,181.56990668534723 999,198 C 1043.7654973697427,214.43009331465277 1090.0907108303152,220.50040973856034 1142,221 C 1193.9092891696848,221.49959026143966 1251.4026540484815,216.42845436041134 1302,212 C 1352.5973459515185,207.57154563958866 1396.2986729757592,203.78577281979432 1440,200 C 1440,200 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path>
        </svg>
        <div class="form__main">
            <h1>Forgot Your Password?</h1>
            <h3>Relax, It Happens With Best of Us</h3>

            <form action="" method="POST" name="emailform">
                <div class="input-group">
                    <input required type="email" name="email" autocomplete="off" class="input" id="email" onkeyup="checkemail()">
                    <label class="user-label">Enter Your Email</label>
                </div>
                <button id="emailsubmit" name="emailsubmit" value="submit" class="disabled" onclick="emailsub()" disabled="true">
                    <div class="svg-wrapper-1">
                        <div class="svg-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                            </svg>
                        </div>
                    </div>
                    <span>Send</span>
                </button>
                <br>
                <p id="email_verify"></p>
            </form>
            <p><a href="index.php">Or, Continue with Login</a></p>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------------------------------------------------->

    <div class="second">
        <div class="form__main">
            <h1>Enter the OTP emailed to you</h1>
            <form action="" method="POST">
                <div class="input-group">
                    <input required="" type="text" name="otp" id="otp" autocomplete="off" class="input" onkeyup="checkotp()">
                    <label class="user-label">OTP</label>
                </div><br />
                <button type="submit" name="otpsubmit" id="otpsubmit" class="disabled" value="submit" onclick="otpsub()" disabled="true">VERIFY</button>
            </form>
            <p id="otp_verify"></p>
            <p >OR <a class="resend" onclick="resend()">Resend OTP</a></p>
            <p style="color: red;" id="resendtext"></p>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------------------------------------------------->

    <div class="third">
        <svg width="100%" height="60%" id="svg" viewBox="0 100 1440 400" class="wave">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="5%" stop-color="#eb144cff"></stop>
                    <stop offset="95%" stop-color="#bc093dff"></stop>
                </linearGradient>
            </defs>
            <path d="M 0,400 C 0,400 0,200 0,200 C 44.37886277723439,172.1252874778609 88.75772555446878,144.2505749557218 132,135 C 175.24227444553122,125.7494250442782 217.34796055935925,135.1229876549737 263,157 C 308.65203944064075,178.8770123450263 357.8504322080943,213.2574744243834 409,215 C 460.1495677919057,216.7425255756166 513.2503106082635,185.84711464749267 568,177 C 622.7496893917365,168.15288535250733 679.1483253588516,181.35406698564594 733,192 C 786.8516746411484,202.64593301435406 838.1563879563298,210.73661740992355 879,223 C 919.8436120436702,235.26338259007645 950.2261228158293,251.6994633746597 989,246 C 1027.7738771841707,240.3005366253403 1074.9391207803537,212.46552909143776 1132,215 C 1189.0608792196463,217.53447090856224 1256.017394062756,250.43842025958924 1309,253 C 1361.982605937244,255.56157974041076 1400.991302968622,227.78078987020538 1440,200 C 1440,200 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path>
        </svg>
        <div class="form__main">
            <form action="" method="POST">
                <h1>Reset password</h1>
                <div class="input-group">
                    <input required type="password" name="password" autocomplete="off" class="input" id="password" onkeyup="verifyPassword()">
                    <label class="user-label">Create a New Password</label>
                </div>
                <div class="input-group">
                    <input required type="password" name="conpassword" autocomplete="off" class="input" id="conpassword" onkeyup="verifyPassword()">
                    <label class="user-label">Confirm Password</label>
                </div>
                <button type="submit" name="pwsubmit" id="pwsubmit" class="disabled" value="submit" disabled="true" onclick="redirectreset()">RESET</button>
            </form>
            <p onclick="showPass()">SHOW PASSWORD</p>
            <p>Make Sure Your Password is: </p>
            <p>Atleast 8 Characters | Not Reused Anywhere | Strong and difficult to guess</p>

            <p id="message" style="color: red;">&nbsp;</p>
        </div>

</body>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="js/forgot.js"></script>