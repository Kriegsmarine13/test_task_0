<?php
require 'Test.php';

$Test = new Test();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test task</title>
    <script src="main.js" type="text/javascript"></script>
    <link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>
<h1>Да хуй знает с этими заголовками</h1>
<?php
$Test->printSelectBox(["Gay Niggers From Outer Space", "New Kids Turbo", "New Kids Nitro", "100 Tears", "Snuff 102"]);
$Test->scrapKinorium("https://ru.kinorium.com/");
?>
<h2>Ebola</h2>
<div class="tree">
    <div id="main">Фильмы</div>
    <div id="sub-block" class="hidden">
        <div id="pic" class="category">- S kartinkoy</div>
        <div id="pic-children" class="hidden"></div>
        <div id="nopic" class="category">- Bez kartinki</div>
        <div id="nopic-children" class="hidden"></div>
    </div>
</div>
<?php
?>
</body>
</html>
