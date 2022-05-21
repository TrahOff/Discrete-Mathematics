<?php
    session_start();
    $matrix = explode("\n", $_POST['matrixOfWays5']);
    $namesOfVertices = explode(" ", $_POST['namesOfVertices5']);
    $_SESSION['formMatrixOfWays5'] = $_POST['matrixOfWays5'];
    $_SESSION['namesOfVertices5'] = $_POST['namesOfVertices5'];

    if (empty($matrix)) {
        $_SESSION['error5'] = 'заполните матрицу доступных путей!';
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    if (empty($namesOfVertices)) {
        $_SESSION['error5'] = 'Введите названия вершин!';
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    if (count($namesOfVertices) != count($matrix)) {
        $_SESSION['error5'] = 'количество названий вершин не совпадает с данными матрицы!';
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    } else {
        for ($i = 0; $i < count($matrix); $i++) {
            $matrix[$i] = explode(" ", $matrix[$i]);
            if (count($matrix[$i]) != count($matrix)) {
                $_SESSION['error5'] = 'ошибка ввода матрицы! <br> Количество элементов строки '. 
                ($i + 1) .' не совпадает с количеством вершин!';
                header("Location: ".$_SERVER["HTTP_REFERER"]);
            } else {
                for ($j = 0; $j < count($matrix); $j++) {
                    if ($matrix[$i][$j] != 1 && $matrix[$i][$j] != 0) {
                        $_SESSION['error5'] = 'ошибка ввода матрицы! <br> Количество элементов строки '. 
                        ($i + 1) .' не совпадает с количеством вершин! <br>
                        элемент '.($j+1).' больше 1!';
                        header("Location: ".$_SERVER["HTTP_REFERER"]);
                    }
                }
            }
        }
        $numberOfVertices = count($matrix);
        $_SESSION['numberOfVertices5'] = $numberOfVertices;
    }
    

    $Matrix = explode("\n", $_POST['matrixOfWays5']);
    for ($i = 0; $i < count($Matrix); $i++) {
        $Matrix[$i] = explode(" ", $Matrix[$i]);
        for ($j = 0; $j < count($Matrix[$i]); $j++) {
            print_r($Matrix[$i][$j]);
            
        }
        echo "<br>";
    }
    echo "<br>";
    $len = count($Matrix);

    $_SESSION['matrix5'][0][0] = 0;
    for ($i = 0; $i <= $numberOfVertices + 1; $i++) {
        for ($j = 0; $j <= $numberOfVertices + 1; $j++) {
            if ($i == 0 && $j > 0) {
                $_SESSION['matrix5'][$i][$j] = $namesOfVertices[$j - 1];
            }
            if ($i > 0 && $j == 0) {
                $_SESSION['matrix5'][$i][$j] = $namesOfVertices[$i - 1];
            }
            if ($i > 0 && $j > 0) {
                $_SESSION['matrix5'][$i][$j] = $Matrix[$i-1][$j-1];
            }
            print_r($_SESSION['matrix5'][$i][$j]);
            echo " ";
        }
        echo "<br>";
    }
    echo "<br><br>";

    $newmatrix = $Matrix;
    for ($k = 0; $k < $numberOfVertices; $k++) {
        for ($i = 0; $i < $numberOfVertices; $i++) {
            for ($j = 0; $j < $numberOfVertices; $j++) {
                if ($newmatrix[$i][$j] == 0) {
                    if (($newmatrix[$k][$j] == 1) && ($matrix[$i][$k] == 1)){
                        $newmatrix[$i][$j] = 1;
                    }
                }
            }
        }
    }

    for ($i = 0; $i < $numberOfVertices; $i++) {
        for ($j = 0; $j <    $numberOfVertices; $j++) {
            if ($i == $j) {
                $newmatrix[$i][$j] = 1;
            }
            print_r($newmatrix[$i][$j]);
            echo " ";
        }
        echo "<br>";
    }
    echo "<br><br>";

    $_SESSION['newMatrix5'][0][0] = 0;
    for ($i = 0; $i < $numberOfVertices + 1; $i++) {
        for ($j = 0; $j < $numberOfVertices + 1; $j++) {
            if ($i == 0 && $j > 0) {
                $_SESSION['newMatrix5'][$i][$j] = $namesOfVertices[$j - 1];
            }
            if ($i > 0 && $j == 0) {
                $_SESSION['newMatrix5'][$i][$j] = $namesOfVertices[$i - 1];
            }
            if ($i > 0 && $j > 0) {
                if ($i == $j) {
                    $_SESSION['newMatrix5'][$i][$j] = 1;
                } else {
                    $_SESSION['newMatrix5'][$i][$j] = $newmatrix[$i - 1][$j - 1];
                }
            }
            print_r($_SESSION['newMatrix5'][$i][$j]);
            echo " ";
        }
        echo "<br>";
    }

    header('location: ../pages/5labrabDM.php');