<?php
session_start();

$firstname = $lastname = $fathername = $mothername = $email = $phonenum=$website=$addressbox=$postcode=''; 

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    setcookie("firstname", $firstname, time() + (86400 * 30), "/");
    setcookie("lastname", $lastname, time() + (86400 * 30), "/");
    setcookie("fathername", $fathername, time() + (86400 * 30), "/");
    setcookie("mothername", $mothername, time() + (86400 * 30), "/");
    setcookie("email", $email, time() + (86400 * 30), "/");
    setcookie("phonenum", $phonenum, time() + (86400 * 30), "/");
    setcookie("website", $website, time() + (86400 * 30), "/");
    setcookie("addressbox", $addressbox, time() + (86400 * 30), "/");
    setcookie("postcode", $postcode, time() + (86400 * 30), "/");
}
function getCookieValue($cookieName) {
    return isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : '';
}
function setCookieValue($cookieName, $cookieValue) {
    setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/");
}
if (isset($_POST['saveDraft'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mothername = $_POST['mothername'];
    $fathername = $_POST['fathername'];
    $email = $_POST['email'];
    $phonenum = $_POST['phonenum'];
    $website = $_POST['website'];
    $addressbox = $_POST['addressbox'];
    $postcode = $_POST['postcode'];

    setCookieValue('firstname', $firstname);
    setCookieValue('lastname', $lastname);
    setCookieValue('fathername', $fathername);
    setCookieValue("mothername", $mothername );
    setCookieValue("email", $email );
    setCookieValue("phonenum", $phonenum );
    setCookieValue("website", $website);
    setCookieValue("addressbox", $addressbox );
    setCookieValue("postcode", $postcode );


}
?>
<!DOCTYPE html>
<html>
<body>

<h1>Registration</h1>
<?php

include '../controllers/validate.php';

$firstNameErr=$lastNameErr=$genderErr=$fatherNameErr=$motherNameErr=$bloodGroupErr=$religionErr=$emailErr=$phoneNumErr=$websiteErr=$addressBoxErr=$postcodeErr='';
$unameErr=$conPassErr=$passErr=$firstname=$lastname=$fathername=$mothername=$bloodgroup=$religion=$email=$phonenum=$website=$addressbox=$postcode='';
$uname=$pass=$conpass='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$firstNameErr =$firstname = validateFName(sanitize ($_POST['firstname']));
$lastNameErr =$lastname = validateLName(sanitize ($_POST['lastname']));
$fatherNameErr=$fathername = validateFatherName(sanitize ($_POST['fathername']));
$motherNameErr=$mothername = validateMotherName(sanitize ($_POST['mothername']));
$bloodGroupErr=$bloodgroup = validateBloodGroup(sanitize ($_POST['bloodgroup']));
$religionErr =$religion = validateReligion(sanitize ($_POST['religion']));
$emailErr = $email = validateEmail(sanitize ($_POST['email']));
$phoneNumErr = $phonenum = validatePhoneNumber(sanitize ($_POST['phonenum']));
$websiteErr = $website = validateWebsite(sanitize ($_POST['website']));
$addressBoxErr=$addressbox = validateAddress(sanitize ($_POST['addressbox']));
$postcodeErr = $postcode = validatePostcode(sanitize ($_POST['postcode']));
$unameErr =$uname = validateUsername(sanitize ($_POST['uname']));
$passErr =$pass = validatePassword(sanitize ($_POST['pass']));
$conPassErr =$conPass = validateConfirmPassword(sanitize ($_POST['pass']), sanitize ($_POST['conpass']));

    if (isset($_POST['gender'])) {
        $genderErr = validateGender($_POST['gender']);
    } else {
        $genderErr = "Gender is required";
    }
    success();
    
}
?> 
<p><?php
    if (isset($_POST['saveDraft'])) {
        echo "Last modified on: " . date("Y-m-d H:i:s");
    }
?>
</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
<table>
    <tr>
        <td>
            <fieldset>
                <legend>General Information:</legend>
                <table>
                    <tr>
                        <td>First name</td>
                        <td>:</td>
                        <td><input type="text" id="firstname" name="firstname" value="<?php echo getCookieValue('firstname'); ?>">
                        <?php echo $firstNameErr; ?>
                    </td>
                        
                    </tr>
                    <tr>
                        <td>Last name</td>
                        <td>:</td>
                        <td><input type="text" id="lastname" name="lastname" value="<?php echo getCookieValue('lastname'); ?>">
                        <?php echo $lastNameErr; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td><input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
                            <?php echo '<br>'.$genderErr; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Father's name</td>
                        <td>:</td>
                        <td><input type="text" id="fathername" name="fathername" value="<?php echo getCookieValue('fathername'); ?>">
                        <?php echo $fatherNameErr; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mother's name</td>
                        <td>:</td>
                        <td><input type="text" id="mothername" name="mothername" value="<?php echo getCookieValue('mothername'); ?>">
                        <?php echo $motherNameErr; ?>
                    </td>
                    </tr>
                    <tr>
                        <td>Blood Group</td>
                        <td>:</td>
                        <td>
                            <select id="bloodgroup" name="bloodgroup">
                                <option value="a-">A-</option>
                                <option value="b+">B+</option>
                                <option value="b-">B-</option>
                                <option value="ab+">AB+</option>
                                <option value="ab-">AB-</option>
                                <option value="o+">O+</option>
                                <option value="o-">O-</option>
                            </select>
                            <?php echo $bloodGroupErr; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Religion</td>
                        <td>:</td>
                        <td>
                            <select id="religion" name="religion">
                            <option value="islam">Islam</option>
                                <option value="christian">Christian</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddhist">Buddhist</option>
                            </select>
                            <?php echo $religionErr; ?>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </td>

        <td>
            <fieldset>
                <legend>Contact Information:</legend>
                <table>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" id="email" name="email" value="<?php echo getCookieValue('email'); ?>">
                        <?php echo $emailErr; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone/Mobile</td>
                        <td>:</td>
                        <td><input type="tel" id="phonenum" name="phonenum" value="<?php echo getCookieValue('phonenum'); ?>">
                        <?php echo $phoneNumErr; ?></td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td>:</td>
                        <td><input type="url" id="website" name="website" value="<?php echo getCookieValue('website'); ?>">
                        <?php echo $websiteErr; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>
                            <fieldset>
                                <legend>Present Address</legend>
                                <select id="country" name="country">
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                </select>

                                <select id="city" name="city">
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Comilla">Comilla</option>
                                    <option value="Chittagong">Chittagong</option>
                                </select>
                                <br>
                                <textarea id="addressbox" name="addressbox" placeholder="Road/Street/City" rows="4" cols="20" value="<?php echo getCookieValue('addressbox'); ?>"></textarea>
                                <br><?php echo $addressBoxErr; ?>
                                <br>
                                <input type="text" id="postcode" name="postcode" placeholder="Post Code" value="<?php echo getCookieValue('postcode'); ?>">
                                <br><?php echo $postcodeErr; ?>
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </td>
        <td>
            <fieldset>
                <legend>Account Information:</legend>
                <table>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><input type="text" id="uname" name="uname">
                        <?php echo $unameErr; ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input  id="pass" name="pass">
                        <?php echo $passErr; ?></td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td>:</td>
                        <td><input  id="conpass" name="conpass">
                        <?php echo $conPassErr; ?></td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <button type="submit" id="registerbtn" name="registerbtn">Register</button>
            <button type="submit" name="saveDraft">Save Draft</button>
            
        </td>
    </tr>
</table>
</form>

</body>
</html>