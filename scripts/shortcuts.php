<?php 
session_start();

$inf = 9999;
for ($i = 0; $i < $_SESSION['numberOfVertices'] + 1; $i++) {
    for ($j = 0; $j < $_SESSION['numberOfVertices'] + 1; $j++) {
        if ($i == $j) {
            $_SESSION['matrix'][$i][$j] = 0;
        } else {
            if ($i == 0 && $j > 0) {
                $_SESSION['matrix'][$i][$j] = $_SESSION['namesOfVertices'][$j-1];
            }
            if ($j == 0 && $i > 0) {
                $_SESSION['matrix'][$i][$j] = $_SESSION['namesOfVertices'][$i-1];
            }
            if ($i > 0 && $j > 0) {
                $_SESSION['matrix'][$i][$j] = $inf;
            }
        }
    }
}

for ($i = 0; $i < count($_SESSION['vertexes1']); $i++) {
    $index1 = array_search($_SESSION['vertexes1'][$i], $_SESSION['namesOfVertices']);
    $index2 = array_search($_SESSION['vertexes2'][$i], $_SESSION['namesOfVertices']);
    $_SESSION['matrix'][$index1+1][$index2+1] = $_SESSION['edges'][$i];
    $_SESSION['matrix'][$index2+1][$index1+1] = $_SESSION['edges'][$i];
}

$_SESSION['newmatrix'] = $_SESSION['matrix'];
for ($i = 1; $i < $_SESSION['numberOfVertices'] + 1; $i++) {
    for ($j = 1; $j < $_SESSION['numberOfVertices'] + 1; $j++) {
        for ($k = 1; $k < $_SESSION['numberOfVertices'] + 1; $k++) {
            if ($_SESSION['newmatrix'][$i][$j] > $_SESSION['newmatrix'][$i][$k] + $_SESSION['newmatrix'][$k][$j]) {
                $_SESSION['newmatrix'][$i][$j] = $_SESSION['newmatrix'][$i][$k] + $_SESSION['newmatrix'][$k][$j];
            }
        }
    }
}

header('location: ../pages/4labrabDM(3).php');