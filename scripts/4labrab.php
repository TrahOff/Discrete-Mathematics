<?php
    session_start();
    $matrix = explode("\n", $_POST['matrixOfWays4']);
    $namesOfVertices = explode(" ", $_POST['namesOfVertices4']);
    $_SESSION['formMatrixOfWays4'] = $_POST['matrixOfWays4'];
    $_SESSION['namesOfVertices4'] = $_POST['namesOfVertices4'];

    if (empty($matrix)) {
        $_SESSION['error4'] = 'заполните матрицу доступных путей!';
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    if (empty($namesOfVertices)) {
        $_SESSION['error4'] = 'Введите названия вершин!';
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    if (count($namesOfVertices) != count($matrix)) {
        $_SESSION['error4'] = 'количество названий вершин не совпадает с данными матрицы!';
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    } else {
        for ($i = 0; $i < count($matrix); $i++) {
            $matrix[$i] = explode(" ", $matrix[$i]);
            if (count($matrix[$i]) != count($matrix)) {
                $_SESSION['error4'] = 'ошибка ввода матрицы! <br> Количество элементов строки '. 
                ($i + 1) .' не совпадает с количеством вершин!';
                header("Location: ".$_SERVER["HTTP_REFERER"]);
            }
        }
        $numberOfVertices = count($matrix);
        $_SESSION['numberOfVertices4'] = $numberOfVertices;
    }

    $Matrix = explode("\n", $_POST['matrixOfWays4']);
    for ($i = 0; $i < count($Matrix); $i++) {
        $Matrix[$i] = explode(" ", $Matrix[$i]);
        for ($j = 0; $j < count($Matrix[$i]); $j++) {
            print_r($Matrix[$i][$j]);
        }
        echo "<br>";
    }
    echo "<br>";
    $len = count($Matrix);

    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len; $j++) {
            if ((int) $Matrix[$i][$j] != (int) $Matrix[$j][$i] || ($i == $j && (int) $Matrix[$i][$j] != 0)) {
                $_SESSION['error4'] = 'Матрица должна быть нерефлексивной и симмтричной, так как граф неориентированный!';
                header("Location: ".$_SERVER["HTTP_REFERER"]);
            }
        }
    }
    echo "<br>";

    $inf = 9999;
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len; $j++) {
            if ($i != $j && $Matrix[$i][$j] == 0) {
                $Matrix[$i][$j] = $inf;
            }
        }
    }

    $_SESSION['matrix4'][0][0] = 0;
    for ($i = 0; $i <= $numberOfVertices + 1; $i++) {
        for ($j = 0; $j <= $numberOfVertices + 1; $j++) {
            if ($i == 0 && $j > 0) {
                $_SESSION['matrix4'][$i][$j] = $namesOfVertices[$j - 1];
            }
            if ($i > 0 && $j == 0) {
                $_SESSION['matrix4'][$i][$j] = $namesOfVertices[$i - 1];
            }
            if ($i > 0 && $j > 0) {
                $_SESSION['matrix4'][$i][$j] = $Matrix[$i-1][$j-1];
                if ($_SESSION['matrix4'][$i][$j] == $inf) {
                    $_SESSION['matrix4'][$i][$j] = 'n';
                }
            }
            print_r($_SESSION['matrix4'][$i][$j]);
            echo " ";
        }
        echo "<br>";
    }
    echo "<br><br>";

    $newmatrix = $Matrix;
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len; $j++) {
            for ($k = 0; $k < $len; $k++) {
                if ($newmatrix[$i][$j] > $newmatrix[$i][$k] + $newmatrix[$k][$j]) {
                    $newmatrix[$i][$j] = $newmatrix[$i][$k] + $newmatrix[$k][$j];
                }
            }
        }
    }

    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len; $j++) {
            print_r($newmatrix[$i][$j]);
            echo " ";
        }
        echo "<br>";
    }

    for ($i = 0; $i <= $len; $i++) {
        for ($j = 0; $j <= $len; $j++) {
            if ($i == 0 && $j > 0) {
                $_SESSION['newMatrix4'][$i][$j] = $namesOfVertices[$j - 1];
            }
            if ($i > 0 && $j == 0) {
                $_SESSION['newMatrix4'][$i][$j] = $namesOfVertices[$i - 1];
            }
            if ($i > 0 && $j > 0) {
                $_SESSION['newMatrix4'][$i][$j] = $newmatrix[$i-1][$j-1];
                if ($_SESSION['newMatrix4'][$i][$j] == $inf) {
                    $_SESSION['newMatrix4'][$i][$j] = 'n';
                }
            }
        }
    }

    unset($_SESSION['formMatrixOfWays4']);
    unset($_SESSION['namesOfVertices4']);
    header('location: ../pages/4labrabDM.php');