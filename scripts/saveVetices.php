<?php 
    session_start();
    $_SESSION['namesOfVertices'] = explode(" ", $_POST['namesOfVertices']);
    $_SESSION['numberOfVertices'] = $_POST['numberOfVertices'];
    $_SESSION['numberOfWays'] = $_POST['numberOfWays'];
    $_SESSION['i'] = 0;
    header('location: ../pages/4labrabDM(2).php');