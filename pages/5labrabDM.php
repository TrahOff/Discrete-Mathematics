<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ДМ л.р. 5</title>
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
        if(!$_SESSION['error5'] && !$_SESSION['newMatrix5']) { ?>
        <div class="form">
            <div class="instuction">
                введите данные для нахождения матицы достижимости<br>
            </div>
            <form method="post" action="../scripts/5labrab.php" enctype="multipart/form-data">
                <div class="input">
                    <p>Названия вершин</p>
                    <input type="text" placeholder="a b c" name="namesOfVertices5" value="<?= $_SESSION['namesOfVertices5'] ?>" size="200"/>
                </div>
                <div class="input">
                    <p>Матрица доступных путей</p>
                    <textarea type="text" placeholder="0 1 1
1 0 1
1 1 0" name="matrixOfWays5" value="" size="200"><?= $_SESSION['formMatrixOfWays4'] ?></textarea>
                </div>
                <div class="button">
                    <input class="submit" type="submit" value="Произвести рассчёты"/>
                </div>
            </form>
        </div>
        <?php } 
        if ($_SESSION['newMatrix5'] && !$_SESSION['error5']) { ?>
        <div class="form">
            <form method="post" action="<?= unSeta() ?>" enctype="multipart/form-data">
            <div class="Signed">Введённые доступные пути</div>
                <table>
                <?php for ($i = 0; $i <= $_SESSION['numberOfVertices5']; $i++) { ?>
                    <tr>
                        <?php for ($j = 0; $j <= $_SESSION['numberOfVertices5']; $j++) { 
                            if ($i == 0 || $j == 0) { ?>
                                <td class="head"><?= $_SESSION['matrix5'][$i][$j] ?></td>
                                <?php } else { ?>
                                <td class="element"><?= $_SESSION['matrix5'][$i][$j] ?></td>
                            <?php } } ?>
                    </tr>
                    <?php } ?>
                </table>
                <div class="Signed">расчитанные возможные пути</div>
                <table>
                <?php for ($i = 0; $i <= $_SESSION['numberOfVertices5']; $i++) { ?>
                    <tr>
                        <?php for ($j = 0; $j <= $_SESSION['numberOfVertices5']; $j++) { 
                            if ($i == 0 || $j == 0) { ?>
                                <td class="head"><?= $_SESSION['newMatrix5'][$i][$j] ?></td>
                                <?php } else { ?>
                                <td class="element"><?= $_SESSION['newMatrix5'][$i][$j] ?></td>
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
        if($_SESSION['error5']) { ?>
        <div class="form">
            <div class="instuction">
                <?php echo $_SESSION['error5']; ?>
            </div>
            <form method="post" action="<?= unsetAll(); ?>" enctype="multipart/form-data">
                <div class="button">
                    <input class="submit" type="submit" value="повторить попытку" />
                </div>
            </form>
        </div>
        <?php }
        function unsetAll() {
            unset($_SESSION['error5']);
            unset($_SESSION['numberOfVertices5']);
            unset($_SESSION['matrix5']);
            unset($_SESSION['newMatrix5']);
        }

        function unSeta() {
            unset($_SESSION['formMatrixOfWays5']);
            unset($_SESSION['namesOfVertices5']);
        }
        ?>
    </main>
    <footer>
        сайт создан в образовательных целях
    </footer>
</div>
</body>
</html>