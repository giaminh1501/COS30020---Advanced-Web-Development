<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hit Counter</title>
</head>

<body>
    <h1>Web Programming - Lab10</h1>
    <form method="post">
        <p>
            <label for="uname">Username:</label>
            <input name="uname" id="uname">
        </p>

        <p>
            <label for="pwd">Password:</label>
            <input name="pwd" type="password" id="pwd">
        </p>

        <p>
            <label for="dbname">Database:</label>
            <input name="dbname" id="dbname">
        </p>

        <p>
            <input type="submit" value="Set Up">
            <input type="reset" value="Reset">
        </p>
    </form>
</body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = "feenix-mariadb.swin.edu.au";

    if (isset($_POST["uname"]) && isset($_POST["pwd"]) && isset($_POST["dbname"]) && !empty($_POST["uname"]) && !empty($_POST["pwd"]) && !empty($_POST["dbname"])) {
        $username = $_POST["uname"];
        $password = $_POST["pwd"];
        $dbname = $_POST["dbname"];

        $dbConnect = new mysqli($host, $username, $password, $dbname);

        umask(0007);
        $dir = "../../data/lab10";
        if (!file_exists($dir)) {
            mkdir($dir, 02770);
        }

        $file = "../../data/lab10/mykeys.txt";

        if ($dbConnect->connect_error) {
            die("<p>Cannot connect to the database server.</p>"
                . "<p>Error: " . $dbConnect->connect_error . "</p>");
        } else {
            $table = "hitcounter";
            $sql1 = "CREATE TABLE $table ( `id` SMALLINT NOT NULL PRIMARY KEY, `hits` SMALLINT NOT NULL );";
            $sql2 = "INSERT INTO $table VALUES (1,0);";

            $query = $dbConnect->query($sql1)
                or die("<p>Cannot execute the query.</p>"
                    . "<p>Error: " . $dbConnect->error . "</p>");

            $query = $dbConnect->query($sql2)
                or die("<p>Cannot execute the query.</p>"
                    . "<p>Error: " . $dbConnect->error . "</p>");

            echo "<p>Table " . $table . " set up successfully.</p>";

            $handle = fopen($file, "w");
            if (!$handle) {
                echo "<p>Cannot open the file.</p>";
            } else {
                $data = $host . "\n" . $username . "\n" . $password . "\n" . $dbname . "\n";
                fwrite($handle, $data);
                fclose($handle);
                echo "<p>Login details saved to text file.</p>";
                echo "<p><a href='countvisits.php'>Count Visits</a></p>";
            }
        }

        $dbConnect->close();
    } else {
        echo "<p>All fields are mandatory. Please fill in all fields.</p>";
    }
}
?>

</html>