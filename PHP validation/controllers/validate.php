<?php

$isValid = true;
$errors = array();

function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
}

function validateFirstName($firstName) {
    global $isValid, $errors;
    if (empty($firstName)) {
        $isValid = false;
        $errors['firstName'] = "First name is empty";
    }
}

function validateLastName($lastName) {
    global $isValid, $errors;
    if (empty($lastName)) {
        $isValid = false;
        $errors['lastName'] = "Last name is empty";
    }
}

function validateGender($gender) {
    global $errors;
    if (empty($gender)) {
        $errors['gender'] = "Gender is required";
    }
}

function validateFatherName($fatherName) {
    global $isValid, $errors;
    if (empty($fatherName)) {
        $isValid = false;
        $errors['fatherName'] = "Father's name is empty";
    }
}

function validateMotherName($motherName) {
    global $isValid, $errors;
    if (empty($motherName)) {
        $isValid = false;
        $errors['motherName'] = "Mother's name is empty";
    }
}

function validateBloodGroup($bloodGroup) {
    global $isValid, $errors;
    if (empty($bloodGroup)) {
        $isValid = false;
        $errors['bloodGroup'] = "Blood group is empty";
    }
}

function validateReligion($religion) {
    global $isValid, $errors;
    if (empty($religion)) {
        $isValid = false;
        $errors['religion'] = "Religion is empty";
    }
}

function validateEmail($email) {
    global $isValid, $errors;
    if (empty($email)) {
        $isValid = false;
        $errors['email'] = "Email is empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = "Invalid email format";
    }
}

function validatePhonenum($phoneNumber) {
    global $isValid, $errors;
    if (empty($phoneNumber)) {
        $isValid = false;
        $errors['phoneNum'] = "Phone number is empty";
    } elseif (!preg_match('/^\+880[1-9]\d{9}$/', $phoneNumber)) {
        $isValid = false;
        $errors['phoneNum'] = "Invalid phone number format. Please enter a valid number with country code +880.";
    }
}

function validateWebsite($website) {
    global $isValid, $errors;
    if (empty($website)) {
        $isValid = false;
        $errors['website'] = "Empty";
    } elseif (!filter_var($website, FILTER_VALIDATE_URL)) {
        $isValid = false;
        $errors['website'] = "Invalid website URL";
    }
}

function validateAddressbox($address) {
    global $isValid, $errors;
    if (empty($address)) {
        $isValid = false;
        $errors['addressBox'] = "Address is empty";
    }
}

function validatePostcode($postcode) {
    global $isValid, $errors;
    if (empty($postcode)) {
        $isValid = false;
        $errors['postcode'] = "Postcode is empty";
    }
}

function validateUname($username) {
    global $isValid, $errors;
    if (empty($username)) {
        $isValid = false;
        $errors['uname'] = "Username is empty";
    }
}

function validatePass($password) {
    global $isValid, $errors;
    if (empty($password)) {
        $isValid = false;
        $errors['pass'] = "Password is empty";
    }

    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
    if (!preg_match($pattern, $password)) {
        $isValid = false;
        $errors['pass'] = "Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long.";
    }
}

function validateConpass( $confirmPassword) {
    global $isValid, $errors;
    if (empty($confirmPassword)) {
        $isValid = false;
        $errors['conPass'] = "Confirm password is empty";
    }
}

function success() {
    global $isValid, $errors;

    if ($isValid) {
        header("Location: ../views/profile.php");
        $_SESSION['formData'] = $_POST;
    }
}
?>
