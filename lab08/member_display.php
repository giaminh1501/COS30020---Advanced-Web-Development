<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Your Name" />
    <title>VIP member Registration System</title>

    <style>
        table,
        th,
        td {
            border: solid;
        }
    </style>
</head>

<body>
    <h1>VIP Member - Add Member</h1>
    <?php
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pswd) or die("Connection failed: " . mysqli_connect_error());
    @mysqli_select_db($conn, $dbnm) or die("Database selection failed: " . mysqli_error($conn));

    $query = "SELECT member_id, fname, lname FROM vipmembers";

    $items = mysqli_query($conn, $query);

    echo "<table>";
    echo    "<tr>
                <th>Member ID</th>
                <th>First name</th>
                <th>Last name</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($items)) {
        echo    "<tr>
                    <td>" . $row['member_id'] . "</td>
                    <td>" . $row['fname'] . "</td>
                    <td>" . $row['lname'] . "</td>
                </tr>";
    }
    echo "</table>";

    echo "<br/>";

    echo "<a href='vip_member.php'>Return to Home Page.</a>";

    mysqli_free_result($items);

    mysqli_close($conn);
    ?>
</body>

</html>