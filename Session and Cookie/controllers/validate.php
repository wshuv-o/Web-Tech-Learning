<?php
//session_start();

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

?>

<?php
$isValid = 1;
function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}

function validateFName($firstName) {
    global $isValid;
    if (empty($firstName)) {
        $isValid = 0;
        return "First name is empty";
    }
    return "";
}

function validateLName($lastName) {
    global $isValid;
    if (empty($lastName)) {
        $isValid = 0;
        return "Last name is empty";
    }

    return "";
}

function validateGender($gender) {
    if (empty($gender)) {
        return "Gender is required";
    } else {
        return '';
    }

}

function validateFatherName($fatherName) {
    global $isValid;
    if (empty($fatherName)) {
        $isValid = 0;
        return "Father's name is empty";
    }
    return "";
}

function validateMotherName($motherName) {
    global $isValid;
    if (empty($motherName)) {
        $isValid = 0;
        return "Mother's name is empty";
    }
    return "";
}

function validateBloodGroup($bloodGroup) {
    global $isValid;
    if (empty($bloodGroup)) {
        $isValid = 0;
        return "Blood group is empty";
    }

    return "";
}

function validateReligion($religion) {
    global $isValid;
    if (empty($religion)) {
        $isValid = 0;
        return "Religion is empty";
    }

    return "";
}

function validateEmail($email) {
    global $isValid;
    if (empty($email)) {
        $isValid = 0;
        return "Email is empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = 0;
        return "Invalid email format";
    }    
    return "";
}

function validatePhoneNumber($phoneNumber) {
    global $isValid;
    if (empty($phoneNumber)) {
        $isValid = 0;
        return "Phone number is required";
    } 
    if (!preg_match('/^\+880[1-9]\d{9}$/', $phoneNumber)) {
        $isValid = false;
        return "Invalid phone number format.";
    }
    return "";
}


function validateWebsite($website) {
    global $isValid;
    if (empty($website)) {
        $isValid = 0;
        return "Empty";
    } elseif (!filter_var($website, FILTER_VALIDATE_URL)) {
        $isValid = 0;
        return "Invalid website URL";
    }
    return "";
}

function validateAddress($address) {
    global $isValid;
    if (empty($address)) {
        $isValid = 0;
        return "Address Field is empty";
    }
    return "";
}

function validatePostcode($postcode) {
    global $isValid;
    if (empty($postcode)) {
        $isValid = 0;
        return "Postcode Field is empty";
    }
    return "";
}

function validateUsername($username) {
    global $isValid;
    if (empty($username)) {
        $isValid = 0;
        return "Username Field is empty";
    }
    return "";
}

function validatePassword($password) {
    global $isValid;
    if (empty($password)) {
        $isValid = 0;
        return "Password Field is empty";
    }

    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'; 
    if (!preg_match($pattern, $password)) { 
        $isValid = 0;
        return "Password should contain at least one uppercase,lowercase, number & one special character";
 
}
    return "";
}

function validateConfirmPassword($password, $confirmPassword) {
    global $isValid;
    if (empty($confirmPassword)) {
        $isValid = 0;
        return "Confirm password is empty";
    } elseif ($password !== $confirmPassword) {
        $isValid = 0;
        return "Passwords do not match";
    }
    return "";
}

function success(){
    global $isValid;

    if ($isValid) {
        header("Location: ../views/showinfo.php");
        $_SESSION['formData']=$_POST;

    }
}
?>
