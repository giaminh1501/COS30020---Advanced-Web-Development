<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Your Name" />
    <title>Retrieve and display records from the table</title>

    <style>
        table, th, td {
            border: solid;
        }
    </style>
</head>

<body>
    <h1>Web Programming - Lab08</h1>
    <?php
    require_once("settings.php");
    // complete your answer based on Lecture 8 slides 26 and 44

    $conn = @mysqli_connect($host, $user, $pswd) or die("Connection failed: " . mysqli_connect_error());
    @mysqli_select_db($conn, $dbnm) or die("Database selection failed: " . mysqli_error($conn));

    $query = "SELECT car_id, make, model, price FROM cars";

    $items = mysqli_query($conn, $query);

    echo "<table>";
    echo    "<tr>
                <th>Car ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Price</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($items)) {
        echo    "<tr>
                    <td>" . $row['car_id'] . "</td>
                    <td>" . $row['make'] . "</td>
                    <td>" . $row['model'] . "</td>
                    <td>" . $row['price'] . "</td>
                </tr>";
    }
    echo "</table>";

    mysqli_free_result($items);

    mysqli_close($conn);
    ?>
</body>

</html>