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
                <li><a href="5labrabDM.php">работа №5</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php session_start();
        $inf = 9999;
        if(!$_SESSION['error4'] && !$_SESSION['newMatrix4']) { ?>
        <div class="form">
            <div class="instuction">
                введите данные для нахождения кратчайших путей неориентированного графа<br>
            </div>
            <form method="post" action="../scripts/4labrab.php" enctype="multipart/form-data">
                <div class="input">
                    <p>Названия вершин</p>
                    <input type="text" placeholder="a b c" name="namesOfVertices4" value="<?= $_SESSION['namesOfVertices4'] ?>" size="200"/>
                </div>
                <div class="input">
                    <p>Матрица длин рёбер</p>
                    <textarea type="text" placeholder="0 2 1
2 0 3
1 3 0" name="matrixOfWays4" value="" size="200"><?= $_SESSION['formMatrixOfWays4'] ?></textarea>
                </div>
                <div class="button">
                    <input class="submit" type="submit" value="Произвести рассчёты"/>
                </div>
            </form>
        </div>
        <?php } 
        if ($_SESSION['newMatrix4'] && !$_SESSION['error4']) { ?>
        <div class="form">
            <form method="post" action="../scripts/unset4.php" enctype="multipart/form-data">
            <div class="Signed">Введённые доступные пути</div>
                <table>
                <?php for ($i = 0; $i <= $_SESSION['numberOfVertices4']; $i++) { ?>
                    <tr>
                        <?php for ($j = 0; $j <= $_SESSION['numberOfVertices4']; $j++) { 
                            if ($i == 0 || $j == 0) { ?>
                                <td class="head"><?= $_SESSION['matrix4'][$i][$j] ?></td>
                                <?php } else { ?>
                                <td class="element"><?= $_SESSION['matrix4'][$i][$j] ?></td>
                            <?php } } ?>
                    </tr>
                    <?php } ?>
                </table>
                <div class="Signed">расчитанные возможные пути</div>
                <table>
                <?php for ($i = 0; $i <= $_SESSION['numberOfVertices4']; $i++) { ?>
                    <tr>
                        <?php for ($j = 0; $j <= $_SESSION['numberOfVertices4']; $j++) { 
                            if ($i == 0 || $j == 0) { ?>
                                <td class="head"><?= $_SESSION['newMatrix4'][$i][$j] ?></td>
                                <?php } else { ?>
                                <td class="element"><?= $_SESSION['newMatrix4'][$i][$j] ?></td>
                            <?php } } ?>
                    </tr>
                    <?php } ?>
                </table>
                <div class="button">
                    <input class="submit" type="submit" value="вернуться в начало"/>
                </div>
            </form>
        </div>
        <?php }
        if($_SESSION['error4']) { ?>
        <div class="form">
            <div class="instuction">
                <?php echo $_SESSION['error4']; ?>
            </div>
            <form method="post" action="<?= unsetAll(); ?>" enctype="multipart/form-data">
                <div class="button">
                    <input class="submit" type="submit" value="повторить попытку" />
                </div>
            </form>
        </div>
        <?php }
        function unsetAll() {
            unset($_SESSION['error4']);
            unset($_SESSION['numberOfVertices4']);
            unset($_SESSION['matrix4']);
            unset($_SESSION['newMatrix4']);
        }
        ?>
    </main>
    <footer>
        сайт создан в образовательных целях
    </footer>
</div>
</body>
</html>