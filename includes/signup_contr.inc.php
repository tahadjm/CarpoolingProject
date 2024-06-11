<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email){
    if( empty($username) || empty($pwd) || empty($email)){
        return true;
    }
    else{
        return false;
    }
}

function is_username_match_email($username, $email){

    $username_lower = strtolower($username);
    $email_lower = strtolower($email);

    $email_prefix = strtok($email_lower, '@');

    if ($username_lower === $email_prefix) {
        return true;
    } else {
        return false;
    }

}

function is_username_taken(object $pdo,string $username){
    if(get_username($username,$pdo)){
        return true;
    }
    else{
        return false;
    }
}

function is_email_invalid(string $email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else {
        return false;
    }
}

function is_email_taken(string $email,object $pdo){
    if(get_email($email,$pdo)){
        return true;
    }
    else{
        return false;
    }
}

function is_email_dosnt_match(string $email,string $confirmEmail){
    if($email !== $confirmEmail){
        return true;
    }
    else{
        return false;
    }
}


function is_pwd_invalid(string $pwd){
    if(strlen($pwd) < 8 || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/", $pwd)){
        return true;
    }
    else{
        return false;
    }
}



function is_phone_invalid(string $phone){
    if(!preg_match("/^[0-9]{10}$/", $phone)){
        return true;
    }
    else{
        return false;
    }
}


/*function create_user(object $pdo, string $email, string $pwd, string $gender, string $accountType, string $phone, string $username,$dob,$dol) {
    set_user($pdo, $username, $email, $pwd, $gender, $accountType, $phone,$dob,$dol); // Corrected parameter order
}*/
function create_passenger_user(object $pdo, string $email, string $pwd, string $gender, string $accountType, string $phone, string $username)
{
    set_passenger_user($pdo, $username, $email, $pwd, $gender, $accountType, $phone); // Corrected parameter order
}
function create_driver_user(object $pdo, string $email, string $pwd, string $gender, string $accountType, string $phone, string $username,$dob,$dol)
{
    set_driver_user($pdo, $username, $email, $pwd, $gender, $accountType, $phone,$dob,$dol); // Corrected parameter order
}


