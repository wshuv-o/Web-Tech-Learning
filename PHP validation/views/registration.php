<?php
session_start();

// Include validation functions
include '../controllers/validate.php';

// Initialize variables to store error messages for each field
$errors = array(
    'firstName' => '',
    'lastName' => '',
    'gender' => '',
    'fatherName' => '',
    'motherName' => '',
    'bloodGroup' => '',
    'religion' => '',
    'email' => '',
    'phoneNum' => '',
    'website' => '',
    'addressBox' => '',
    'postcode' => '',
    'uname' => '',
    'pass' => '',
    'conPass' => ''
);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize each input field
    $fields = array('firstname', 'lastname', 'gender', 'fathername', 'mothername', 'bloodgroup', 'religion', 'email', 'phonenum', 'website', 'addressbox', 'postcode', 'uname', 'pass', 'conpass');

    foreach ($fields as $field) {
        $value = isset($_POST[$field]) ? sanitize($_POST[$field]) : '';
        $errors[$field] = call_user_func("validate" . ucfirst($field), $value);
    }

    // Validate gender separately
    if (empty($_POST['gender'])) {
        $errors['gender'] = "Gender is required";
    }

    // Check for password match
    if ($_POST['pass'] !== $_POST['conpass']) {
        $errors['conPass'] = "Passwords do not match";
    }

    // If no errors, perform additional actions (not specified in the provided code)
    if (!array_filter($errors)) {
        // Additional actions or redirection can be added here
        success();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
    <body>

    <h1>Registration</h1>

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
                        <td><input type="text" id="firstname" name="firstname">
                        <?php echo $errors['firstName']; ?>
                    </td>
                        
                    </tr>
                    <tr>
                        <td>Last name</td>
                        <td>:</td>
                        <td><input type="text" id="lastname" name="lastname">
                        <?php echo $errors['lastName']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td><input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
                            <?php echo '<br>'.$errors['gender']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Father's name</td>
                        <td>:</td>
                        <td><input type="text" id="fathername" name="fathername">
                        <?php echo $errors['fatherName']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mother's name</td>
                        <td>:</td>
                        <td><input type="text" id="mothername" name="mothername">
                        <?php echo $errors['motherName']; ?>
                    </td>
                    </tr>
                    <tr>
                        <td>Blood Group</td>
                        <td>:</td>
                        <td>
                            <select id="bloodgroup" name="bloodgroup">
                                <option value="b+">B+</option>
                                <option value="o+">O+</option>
                                <option value="a+">A+</option>
                            </select>
                            <?php echo $errors['bloodGroup']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Religion</td>
                        <td>:</td>
                        <td>
                            <select id="religion" name="religion">
                                <option value="islam">Islam</option>
                                <option value="islam">Islam</option>
                                <option value="islam">Islam</option>
                            </select>
                            <?php echo $errors['religion']; ?>
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
                        <td><input type="email" id="email" name="email">
                        <?php echo $errors['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone/Mobile</td>
                        <td>:</td>
                        <td><input type="tel" id="phonenum" name="phonenum">
                        <?php echo $errors['phoneNum']; ?></td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td>:</td>
                        <td><input type="url" id="website" name="website">
                        <?php echo $errors['website']; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>
                            <fieldset>
                                <legend>Present Address</legend>
                                <select id="country" name="country">
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Japan">Japan</option>
                                    <option value="England">England</option>
                                </select>

                                <select id="city" name="city">
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Comilla">Comilla</option>
                                    <option value="Chittagong">Chittagong</option>
                                </select>
                                <br>
                                <textarea id="addressbox" name="addressbox" placeholder="Road/Street/City" rows="5" cols="20"></textarea>
                                <br><?php echo $errors['addressBox']; ?>
                                <br>
                                <input type="text" id="postcode" name="postcode" placeholder="Post Code">
                                <br><?php echo $errors['postcode']; ?>
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
                        <?php echo $errors['uname']; ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input  id="pass" name="pass">
                        <?php echo $errors['pass']; ?></td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td>:</td>
                        <td><input  id="conpass" name="conpass">
                        <?php echo $errors['conPass']; ?></td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <button type="submit" id="registerbtn" name="registerbtn">Register</button>
            
        </td>
    </tr>
</table>
        




        </form>

    </body>
</html>
