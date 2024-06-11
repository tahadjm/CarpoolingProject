<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $journeyID = $_GET['journeyID'];

    $sql = "SELECT * FROM journey WHERE journeyID = :journeyID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':journeyID', $journeyID, PDO::PARAM_STR);
    $stmt->execute();
    $journey_res_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['journey_res_details'] = $journey_res_details;

    if (!empty($journey_res_details)) {
        $username = $journey_res_details[0]['username'];

        $sql = "SELECT * FROM driver WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $driver = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['driver'] = $driver;

        header("Location: ../1-journey-details.php");
        exit();
    } else {
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
