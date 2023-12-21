<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Your Name" />
    <title>Updating the Guest Book System</title>

    <link href="style/bootstrap.min.css" rel="stylesheet" />

    <style>
        table, th, td {
            border: solid;
        }
    </style>
</head>

<body>
    <h1>Web Programming - Lab 6</h1>
    <?php
    $filename = "../../data/lab06/guestbook.txt";
    if (filesize($filename) == 0 || !file_exists($filename)) {
        echo "<p class='alert alert-danger'>Guestbook is empty!</p>";
        exit;
    } else {
        $array = file($filename);
        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "</tr>";

        for ($i = 0; $i < count($array); $i++) {
            $data = explode(",", $array[$i]);
            echo "<tr>";
            echo "<td>" . $data[0] . "</td>";
            echo "<td>" . $data[1] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    echo "<br>";
    echo "<a href='guestbookform.php'>Add Another Visitor</a>";
    ?>
</body>

</html>