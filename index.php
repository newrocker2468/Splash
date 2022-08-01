<?php
require 'connection.php';

if (isset($_COOKIE['logkey'])) {
    $vkey = $_COOKIE['logkey'];
    $sql = "SELECT * FROM user_db WHERE vkey = '$vkey' ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['vkey'] = $vkey;
        header("location: home.php");
    } else {
        setcookie("logkey","expired", time() - 100, "", "localhost");
        session_unset();
        session_destroy();
        session_regenerate_id();
    }
}

?>

<html>

<head>
    <title>Welcome, Please Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <!-- CSS only -->

</head>

</html>
<svg width="100%" " id=" svg" viewBox="0 100 1440 400" class="wave">
    <defs>
        <linearGradient id="gradient" x1="87%" y1="17%" x2="13%" y2="83%">
            <stop offset="5%" stop-color="#c3083fff"></stop>
            <stop offset="95%" stop-color="#6f2232ff"></stop>
        </linearGradient>
    </defs>
    <path d="M 0,400 C 0,400 0,200 0,200 C 40.832862696053255,207.82465987184804 81.66572539210651,215.64931974369605 109,230 C 136.3342746078935,244.35068025630395 150.1699611276272,265.22738089706377 187,267 C 223.8300388723728,268.77261910293623 283.65443009738465,251.44115666804885 326,231 C 368.34556990261535,210.55884333195115 393.21231848283423,187.0079924307408 421,178 C 448.78768151716577,168.9920075692592 479.4962959712785,174.52687360898787 510,195 C 540.5037040287215,215.47312639101213 570.8024976320515,250.88451313330785 612,254 C 653.1975023679485,257.11548686669215 705.2937135005154,227.9350738577808 734,214 C 762.7062864994846,200.0649261422192 768.0226483658873,201.37519143556887 803,179 C 837.9773516341127,156.62480856443113 902.6156930359354,110.56416039994377 944,127 C 985.3843069640646,143.43583960005623 1003.5145794903708,222.36816696465596 1032,224 C 1060.4854205096292,225.63183303534404 1099.325989002581,149.9631717414324 1137,130 C 1174.674010997419,110.03682825856758 1211.181464499305,145.77914606961437 1242,185 C 1272.818535500695,224.22085393038563 1297.9481530001985,266.92024398011023 1330,270 C 1362.0518469998015,273.07975601988977 1401.0259234999007,236.53987800994489 1440,200 C 1440,200 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path>
</svg>

<body>
    <div class="form__main">
        <h1 id="welcome">Welcome to Splash</h1>
        <form action="" method="POST">
            <input type="hidden" value="" id="ipinput" name="ip" />
            <br>
            <br>
            <div class="input-group">
                <input required="" type="text" name="username" autocomplete="off" class="input" id="input1">
                <label class="user-label">Username</label>
            </div>
            <div class="input-group">
                <input required="" type="password" name="pass" autocomplete="off" class="input">
                <label class="user-label">Password</label>
            </div>
            <label class="container">
                <input type="checkbox" checked="checked" name="remember" class="box">
                <div class="checkmark" id="checkmark">
                    <div id="checktext">Remember&nbsp;Me&nbsp;Next&nbsp;Time</div>
                </div>
            </label>
            <button class="fancy" href="#" type="submit" name="submit">
                <span class="top-key"></span>
                <span class="text">Login</span>
                <span class="bottom-key-1"></span>
                <span class="bottom-key-2"></span>
            </button>
            <?php if (isset($_GET['invalid']) && $_GET['invalid'] == "true") {
                echo '<p style="color:red">Wrong Username or Password</p>';
            } else if (isset($_GET['register']) && $_GET['register'] == "true") {
                echo '<p style="color:green">Successfully Registered. Please Log In Now</p>';
            } else if (isset($_GET['expired']) && $_GET['expired'] == "true") {
                echo '<p style="color:red">Session Expired, Please Re-Login</p>';
            }
            ?>
            <p> <a href="forgot.php" class="cta">
                    <span class="hover-underline-animation">Forgot Your Password?</span>
                </a></p>

            <p><a href="emailverify.php" class="cta">
                    <span class="hover-underline-animation">Or Create a New Account</span>
                </a></p>
        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $.getJSON("https://api.ipify.org?format=json", function(data) {
        document.getElementById('ipinput').value = data.ip
    });
</script>

<?php

function convert($string)
{
    $table = array(
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Ă' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Æ' => 'A', 'Ǽ' => 'A',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'ă' => 'a', 'ā' => 'a', 'ą' => 'a', 'æ' => 'a', 'ǽ' => 'a',

        'Þ' => 'B', 'þ' => 'b', 'ß' => 'Ss',

        'Ç' => 'C', 'Č' => 'C', 'Ć' => 'C', 'Ĉ' => 'C', 'C' => 'C',
        'ç' => 'c', 'č' => 'c', 'ć' => 'c', 'ĉ' => 'c', 'c' => 'c',

        'Đ' => 'D', 'Ď' => 'D',
        'đ' => 'd', 'ď' => 'd',

        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ĕ' => 'E', 'Ē' => 'E', 'Ę' => 'E', 'Ė' => 'E',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ĕ' => 'e', 'ē' => 'e', 'ę' => 'e', 'ė' => 'e',

        'Ĝ' => 'G', 'Ğ' => 'G', 'Ġ' => 'G', 'Ģ' => 'G',
        'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g',

        'Ĥ' => 'H', 'Ħ' => 'H',
        'ĥ' => 'h', 'ħ' => 'h',

        'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'İ' => 'I', 'Ĩ' => 'I', 'Ī' => 'I', 'Ĭ' => 'I', 'Į' => 'I',
        'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'į' => 'i', 'ĩ' => 'i', 'ī' => 'i', 'ĭ' => 'i', 'i' => 'i',

        'Ĵ' => 'J',
        'ĵ' => 'j',

        'Ķ' => 'K',
        'ķ' => 'k', 'ĸ' => 'k',

        'Ĺ' => 'L', 'Ļ' => 'L', 'Ľ' => 'L', 'Ŀ' => 'L', 'Ł' => 'L',
        'ĺ' => 'l', 'ļ' => 'l', 'ľ' => 'l', 'ŀ' => 'l', 'ł' => 'l',

        'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N', 'Ņ' => 'N', 'Ŋ' => 'N',
        'ñ' => 'n', 'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŋ' => 'n', 'ŉ' => 'n',

        'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ō' => 'O', 'Ŏ' => 'O', 'Ő' => 'O', 'Œ' => 'O',
        'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ō' => 'o', 'ŏ' => 'o', 'ő' => 'o', 'œ' => 'o', 'ð' => 'o',

        'Ŕ' => 'R', 'Ř' => 'R',
        'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r',

        'Š' => 'S', 'Ŝ' => 'S', 'Ś' => 'S', 'Ş' => 'S',
        'š' => 's', 'ŝ' => 's', 'ś' => 's', 'ş' => 's',

        'Ŧ' => 'T', 'Ţ' => 'T', 'Ť' => 'T',
        'ŧ' => 't', 'ţ' => 't', 'ť' => 't',

        'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ũ' => 'U', 'Ū' => 'U', 'Ŭ' => 'U', 'Ů' => 'U', 'Ű' => 'U', 'Ų' => 'U',
        'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ũ' => 'u', 'ū' => 'u', 'ŭ' => 'u', 'ů' => 'u', 'ű' => 'u', 'ų' => 'u',

        'Ŵ' => 'W', 'Ẁ' => 'W', 'Ẃ' => 'W', 'Ẅ' => 'W',
        'ŵ' => 'w', 'ẁ' => 'w', 'ẃ' => 'w', 'ẅ' => 'w',

        'Ý' => 'Y', 'Ÿ' => 'Y', 'Ŷ' => 'Y',
        'ý' => 'y', 'ÿ' => 'y', 'ŷ' => 'y',

        'Ž' => 'Z', 'Ź' => 'Z', 'Ż' => 'Z',
        'ž' => 'z', 'ź' => 'z', 'ż' => 'z',
    );

    $string = strtr($string, $table);
    $string = preg_replace("/[^\x9\xA\xD\x20-\x7F]/u", "", $string);

    return $string;
}

############################################################################

function country($code)
{

    $code = strtoupper($code);

    $countryList = array(
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas the',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island (Bouvetoya)',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
        'VG' => 'British Virgin Islands',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros the',
        'CD' => 'Congo',
        'CG' => 'Congo the',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote d\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FO' => 'Faroe Islands',
        'FK' => 'Falkland Islands (Malvinas)',
        'FJ' => 'Fiji the Fiji Islands',
        'FI' => 'Finland',
        'FR' => 'France, French Republic',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia the',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island and McDonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KP' => 'Korea',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyz Republic',
        'LA' => 'Lao',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'AN' => 'Netherlands Antilles',
        'NL' => 'Netherlands the',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn Islands',
        'PL' => 'Poland',
        'PT' => 'Portugal, Portuguese Republic',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts and Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre and Miquelon',
        'VC' => 'Saint Vincent and the Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome and Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia (Slovak Republic)',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia, Somali Republic',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard & Jan Mayen Islands',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland, Swiss Confederation',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks and Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States of America',
        'UM' => 'United States Minor Outlying Islands',
        'VI' => 'United States Virgin Islands',
        'UY' => 'Uruguay, Eastern Republic of',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Vietnam',
        'WF' => 'Wallis and Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe'
    );

    if (!$countryList[$code]) return $code;
    else return $countryList[$code];
}

############################################################################

session_unset();
session_start();
$username = $password = "";

if (isset($_POST['submit'])) {
    function sanitize($input)
    {
        htmlspecialchars($input);
        stripslashes($input);
        trim($input);

        return $input;
    }

    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['pass']);

    $username = $_POST['username'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM user_db WHERE username = '$username' ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            session_regenerate_id();
            if (password_verify($password, $row['password']) == 1) {
                if (isset($_POST['remember'])) {
                    setcookie("logkey", $row['vkey'], time() + 2592000, "", "localhost");
                    setcookie("expiry", time() + 30, time() + 2592000, "", "localhost");
                    setcookie("sessid", session_id(), time() + 2592000, "", "localhost");
                }
                $login_userid = $row['id'];

                $login_useragent = $_SERVER['HTTP_USER_AGENT'] ?? null;

                $ip = $_POST['ip'];
                $json = file_get_contents("https://ipinfo.io/$ip/geo");
                $details = json_decode($json, true);
                $city = convert($details["city"]);
                $region = convert($details["region"]);
                $country = country(convert($details["country"]));

                $login_location = $city . ", " . $region . ", " . $country;

                date_default_timezone_set('Asia/Kolkata');
                $date = date("d/m/Y");
                $time = date("H:i:s");

                $sessid = session_id();

                $sql2 =     "INSERT INTO user_login (userid, ip, useragent, location, date, time, sessid, status) 
                            VALUES ('$login_userid', '$ip',' $login_useragent', '$login_location', '$date', '$time', '$sessid', 'active')";
                $result = $conn->query($sql2);

                if(!isset($_SESSION['time'])) {
                    $_SESSION['time'] = time();
                    $_SESSION['expiry'] = $_SESSION['time'] + 30; // 30 days
                }

                $_SESSION['vkey'] = $row['vkey'];
                $_SESSION['start'] = 
                header("location: home.php");
            } else {
                header("location: ?invalid=true");
            }
        }
    } else {
        header("location: ?invalid=true");
    }
}



?>