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
<h1>Заголовок 1</h1>
<?php
$Test->printSelectBox(["Avatar", "New Kids Turbo", "New Kids Nitro", "100 Tears", "Snuff 102"]);
$Test->scrapKinorium("https://ru.kinorium.com/");
?>
<h2>Заголовок 2</h2>
<div class="tree">
    <div id="main">Фильмы (нажми меня)</div>
    <div id="sub-block" class="hidden">
        <div id="pic" class="category">- S kartinkoy(и меня нажми)</div>
        <div id="pic-children" class="hidden"></div>
        <div id="nopic" class="category">- Bez kartinki(и даже меня)</div>
        <div id="nopic-children" class="hidden"></div>
    </div>
</div>
<?php
?>
</body>
</html>
