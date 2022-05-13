<?php
    session_start();
    
    $_SESSION['edges'][$_SESSION['i']] = $_POST['edge'];
    $_SESSION['vertexes1'][$_SESSION['i']] = $_POST['vertex1'];
    $_SESSION['vertexes2'][$_SESSION['i']] = $_POST['vertex2'];
    $_SESSION['i']++;
    if ($_SESSION['i'] == $_SESSION['numberOfWays']) {
        header('location: ../scripts/shortcuts.php');
    } else {
        header('location: ../pages/4labrabDM(2).php');
    }
?>