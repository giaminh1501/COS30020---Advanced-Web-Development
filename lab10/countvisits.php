<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hit Counter</title>
</head>

<body>
    <?php
    require_once("hitcounter.php");

    umask(0007);
    $dir = "../../data/lab10";
    if (!file_exists($dir)) {
        echo "<p>Directory " . $dir . " does not exist.</p>";
    }

    $file = "../../data/lab10/mykeys.txt";

    $handle = @fopen($file, "r");
    if (!$handle) {
        echo "<p>Cannot open the file.</p>";
    } else {
        $host = trim(fgets($handle));
        $username = trim(fgets($handle));
        $password = trim(fgets($handle));
        $dbname = trim(fgets($handle));
        fclose($handle);

        $Counter = new HitCounter($host, $username, $password, $dbname);
        $hit = $Counter->getHits();
        echo "<p>This page got $hit hits.</p>";
        $hit++;
        $Counter->setHits($hit);
        $Counter->closeConnection();
    }
    ?>
    <p><a href="startover.php">Start Over</a></p>
</body>

</html>