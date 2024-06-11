<?php
// signup.inc.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountType = $_POST["accountType"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $confirmEmail = $_POST["confirmEmail"];
    $pwd = $_POST["pwd"];
    $phone = $_POST["phone"];
    if($accountType =='driver'){
        $DOB = $_POST["dol"];
        $DOL = $_POST["dob"];
    }

    

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS

        $errors = [];

        // CHECK FOR ERRORS
        if(is_input_empty($username, $pwd, $email)){
            $errors['empty_input'] = "Fill in all fields!.";

        }
        else {
            if(is_username_taken($pdo,$username)){
                $errors['existing_username'] = "Username already taken.!";
    
            }
            if(is_username_match_email($username, $email)){
                $errors['user_email'] = "The you username cant be same as the email.!";
    
            }
            if(is_email_invalid($email)){
                $errors['emailer'] = "Invalid email format";
    
            }
            if(is_email_taken($email, $pdo)){
                $errors['email_exist'] = "Email already taken!";
    
            }
            if(is_email_dosnt_match($email,$confirmEmail)){
                $errors['emailmatch'] = "Emails dosen't match.!";
    
            }
            if(is_pwd_invalid($pwd)){
                $errors['passworder'] = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character";
            }
            if(is_phone_invalid($phone)){
                $errors['phoner'] = "Invalid phone number format!";
            }
        }
        


        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;

            $signupData = [
                "username" =>$username,
                "accountType "=>$accountType,
                "gender "=>$gender ,
                "username "=>$username ,
                "email"=>$email,
                "phone"=>$phone
            ];
            $_SESSION['signup_data'] = $errors;


            header("Location: ../1-register page.php");
            die();

        }
        if($accountType =='driver'){

            create_driver_user($pdo,$email,$pwd,$gender,$accountType,$phone,$username,$DOB,$DOL); 

        }
        if($accountType =='passenger')
        {
            create_passenger_user($pdo,$email,$pwd,$gender,$accountType,$phone,$username); 

        }

        header("Location: ../1-sign-in.php?signp=success");


        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");

    die();
}

