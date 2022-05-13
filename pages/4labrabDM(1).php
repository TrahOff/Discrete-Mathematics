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
        <form method="post" action="../scripts/saveVetices.php" enctype="multipart/form-data">
            <div class="instuction">
                введите необходимые данные для составления неориентированнго графа.
            </div>
            <div class="input">
                <p>количество вершин:</p>
                <input type="text" name="numberOfVertices" value="" size="200" />
            </div>
            <div class="input">
                <p>названия вершин</p>
                <input type="text" name="namesOfVertices" value="" size="200" />
            </div>
            <div class="input">
                <p>количество рёбер:</p>
                <input type="text" name="numberOfWays" value="" size="200" />
            </div>
            <div class="button">
                <input type="submit" value="найти">
            </div>
        </form>
        </div>
    </main>
    <footer>
        сайт создан в образовательных целях
    </footer>
    </div>
</body>
<?php 
unset($_SESSION['vertexes2']);
unset($_SESSION['vertexes1']);
unset($_SESSION['edges']);
unset($_SESSION['namesOfVertices']);
unset($_SESSION['numberOfVertices']);
unset($_SESSION['numberOfWays']);
unset($_SESSION['newmatrix']);
unset($_SESSION['matrix']);
?>
</html>