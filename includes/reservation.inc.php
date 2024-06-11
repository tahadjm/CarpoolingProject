<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && $_SESSION["account_type"]== 'passenger') { ;
    if (isset($_SESSION['user_id'])) {
        $passengerID = $_SESSION['user_id'];
        $journeyID = $_GET['journeyID'];
        
        $sql = "INSERT INTO journeyrequests (TripID, PassengerID) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$journeyID, $passengerID]);
        
        if ($stmt->rowCount() > 0) {
            $_SESSION['reservation']='Request successfully submitted.';
            header('Location:../1-Passenger account page.php?request=success');
        } else {
            $_SESSION['reservation']='Failed to submit request.';
        }

    } else {
        header('Location:../index.php');
        exit;
        }
}
else {
    header('Location:../index.php');
    exit;
    }
?>
