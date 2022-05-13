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
        <form method="post" action="../scripts/saveWays.php" enctype="multipart/form-data">
            <div class="instuction">
                введите необходимые данные для подсчёта кротчайшего пути в неориентированном графе.
                <br>пути:<br>
            </div>
            <div class="ways">
            <?php
            $k = 0; 
            if ($_SESSION['i'] < $_SESSION['numberOfWays']) { ?>
                <p>откуда:</p>
                <input type="text" name="vertex1" value="" size="200" /><br>
                <p>куда:</p>
                <input type="text" name="vertex2" value="" size="200" /><br>
                <p>длина ребра:</p>
                <input type="text" name="edge" value="" size="200" /><br>
            <?php } ?>
            </div>
            <div class="button">
                <input type="submit" value="найти">
            </div>
        </form>
        </div>
        <?php
    ?>
    </main>
    <footer>
        сайт создан в образовательных целях
    </footer>
    </div>
</body>

</html>