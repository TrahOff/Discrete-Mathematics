<?php
session_start();

unset($_SESSION['error5']);
unset($_SESSION['numberOfVertices5']);
unset($_SESSION['matrix5']);
unset($_SESSION['newMatrix5']);



header('location: ../pages/5labrabDM.php');