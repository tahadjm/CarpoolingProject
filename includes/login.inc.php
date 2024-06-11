<?php
require_once 'dbh.inc.php';
require_once 'login_contr.inc.php';
require_once 'login_model.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_type = $_POST["accountType"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        $errors = [];

        if (empty($email) || empty($pwd)) {
            $errors['empty_input'] = "Fill in all fields!";
        } 
            if($account_type == 'driver'){
                $result = get_driver_email($email, $pdo);

            }
            if($account_type == 'passenger'){
                $result = get_passenger_email($email, $pdo);

            }

            if (!$result) {
                $errors["login_incorrect"] = "Incorrect Email!";
            } 
            else {
                if (!is_pwd_wrong($pwd, $result["pwd"])) {
                    $errors["login_incorrect"] = "Incorrect login info!";
                }
            }
        
        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../1-sign-in.php");
            exit();
        } 

        $newSessionid = session_create_id();
        $sessionId = $newSessionid . "_" . $result["ID"];
        session_id($sessionId);
        $_SESSION['user_id'] = $result["ID"];
        $_SESSION['user_username'] = htmlspecialchars($result["Username"]);
        $_SESSION['email'] = htmlspecialchars($result["Email"]);
        $_SESSION['phone'] = $result["phone_number"];
        if($account_type=='driver')
        {
            $_SESSION['dob'] = $result["dob"];
            $_SESSION['dol'] = $result["dob"];
        }
        $_SESSION['account_type'] = $result["AccountType"];
        $_SESSION["last_generation"] = time();
        header("Location: ../index.php?login=success");
        $pdo=null;
        $stmt=null;

        die();

    } catch (PDOException $e) {
        die ("Query Failed" . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
