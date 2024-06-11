<?php
require_once 'dbh.inc.php';
require_once 'config_session.inc.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $depart = $_POST['depart'];
    $destination = $_POST['destination'];
    $time = $_POST['time'];
    $places = $_POST['places'];
    if (empty($depart) || empty($destination) || empty($time) || empty($places)) {
        header("Location: ../index.php");
        $_SESSION['search_error']='Fill in all fildes';
        die();
    }

    $sql = "SELECT * FROM journey WHERE Deplocation LIKE :depart AND Deslocation LIKE :destination AND date = :time AND Places >= :places";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'depart' => "%$depart%",
        'destination' => "%$destination%",
        'time' => $time,
        'places' => $places
    ]);
    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($searchResults) {
        $_SESSION['search_results'] = $searchResults;
    } else {
        $_SESSION['search_results'] ='There is no journey matches with your result';
    }

    header("Location: ../search result.php");
    exit();
} else {
    header("Location: ../index.php");

}

$pdo = null;
?>
