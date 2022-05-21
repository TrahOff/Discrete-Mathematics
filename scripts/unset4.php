<?php
session_start();

unset($_SESSION['error4']);
unset($_SESSION['numberOfVertices4']);
unset($_SESSION['matrix4']);
unset($_SESSION['newMatrix4']);

header("Location: ".$_SERVER["HTTP_REFERER"]);