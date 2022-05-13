<!DOCTYPE html>
<html lang="ru">
<?php 
session_start();
?>
<head>
    <meta charset="UTF-8">
    <title>ДМ л.р. 4</title>
    <link href="../styles/labrabs.css" type="text/css" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">работа №1</a></li>
                <li><a href="2labrabDM.html">работа №2</a></li>
                <li><a href="3labrabDM.html">работа №3</a></li>
                <li><a href="4labrabDM.php">работа №4</a></li>
                <li><a href="5labrabDM.html">работа №5</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="form">
        <?php $inf = 9999; ?>
        <div class="Signed">введённый граф:</div>
        <form method="post" action="4labrabDM(1).php" enctype="multipart/form-data">
        <table>
        <?php for ($i = 0; $i < $_SESSION['numberOfVertices'] + 1; $i++) { ?>
        <tr>
        <?php for ($j = 0; $j < $_SESSION['numberOfVertices'] + 1; $j++) {
            if ($_SESSION['matrix'][$i][$j] == $inf) {
                $_SESSION['matrix'][$i][$j] = 'n';
            }
            $_SESSION['matrix'][0][0] = "_"; 
            if ($i == 0 || $j == 0) { ?>
            <td class="head"><?= $_SESSION['matrix'][$i][$j] ?></td>
            <?php } else { ?>
            <td class="element"><?= $_SESSION['matrix'][$i][$j] ?></td>
        <?php } } ?>
        </tr>
        <?php } ?>
        </table>
        <div class="Signed">матрица кротчайших путей:</div>
        <table>
        <?php for ($i = 0; $i < $_SESSION['numberOfVertices'] + 1; $i++) { ?>
        <tr>
        <?php for ($j = 0; $j < $_SESSION['numberOfVertices'] + 1; $j++) {
                $_SESSION['newmatrix'][0][0] = "_"; if ($i == 0 || $j == 0) { ?>
                    <td class="head"><?= $_SESSION['newmatrix'][$i][$j] ?></td>
                    <?php } else { ?>
                    <td class="element"><?= $_SESSION['newmatrix'][$i][$j] ?></td>
        <?php } } ?>
        </tr>
        <?php } ?>
        </table>
        <div class="button">
            <input type="submit" value="вернуться в начало">
        </div>
        </form>
        </div>
    </main>
    <footer>
        сайт создан в образовательных целях
    </footer>
    </div>
</body>
</html>