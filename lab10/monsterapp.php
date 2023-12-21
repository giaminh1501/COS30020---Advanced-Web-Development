<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monster Class</title>
</head>

<body>
    <h1>Web Programming – Lab10</h1>
    <?php
    require_once("monsterclass.php"); // include the monster class
    $monster1 = new Monster(1, "red"); // creates a red monster with 1 eye
    $monster2 = new Monster(3, "blue"); // creates a blue monster with 3 eyes
    echo "<p>", $monster1->describe(), "</p>"; // describe the first monster
    echo "<p>", $monster2->describe(), "</p>"; // describe the second monster
    ?>
</body>

</html>