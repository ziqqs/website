<?php

//check passwords match
function checkPasswordMatch($password1, $password2) {
    global $errors;
    $pass = true;
    if (strcmp($password1, $password2) != 0) {
        $errors['password'] .= " Passwords do not match.";
        $pass = false;
    }
    return $pass;
}

function checkPassword($password1, $password2) {
    global $errors;
    $pass = true;
    if (strcmp($password1, $password2) != 0) {
        $errors['password'] .= " Incorrect password.";
        $pass = false;
    }
    return $pass;
}

function checkPasswordLength($password) {
    global $errors;
    $pass = true;
    if (strlen($password) < 8) {
        $errors['password'] .= " Password must be longer than 8 characters.";
        $pass = false;
    }
    return $pass;
}

//require each input
function checkRequiredFieldsPresent($input) {
    global $errors;
    $pass = true;
    foreach ($input as $key => $value) {
        if (empty($value)) {
            $errors[$key] .= " This field is required.";
            $pass = false;
        }
    }
    return $pass;
}

//check valid email
function checkEmailValid($email) {
    global $errors;
    $pass = true;
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] .= " Invalid email, please enter an email address of the form 'someone@example.com'.";
        $pass = false;
    }
    return $pass;
}
