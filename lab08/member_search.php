<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Lab08" />
    <meta name="keywords" content="Web,programming" />
    <title>VIP member Registration System</title>

    <style>
        .success {
            color: green;
        }

        .error {
            color: red;
        }

        table,
        th,
        td {
            border: solid;
        }
    </style>
</head>

<body>
    <h1>VIP Member - Search Member</h1>
    <form action="member_search.php" method="post">
        <p>
            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="lname">
        </p>
        <p>
            <input type="submit" value="Search">
            <input type="reset" value="Reset">
        </p>
    </form>
    <?php
    require_once("settings.php");

    $table = "vipmembers";

    $conn = @mysqli_connect($host, $user, $pswd) or die("Connection failed: " . mysqli_connect_error());
    @mysqli_select_db($conn, $dbnm) or die("Database selection failed: " . mysqli_error($conn));

    if (!isset($_POST['lname'])) {
        echo "<p class='error'>Error: Please fill in the last name.</p>";
        exit;
    }

    $lastName = strtolower($_POST["lname"]);

    $checkTable = "SHOW TABLES LIKE '$table'";

    $result1 = mysqli_query($conn, $checkTable);

    if (mysqli_num_rows($result1) > 0) {
        $query = "SELECT member_id, fname, lname, email FROM $table WHERE LOWER(lname) LIKE '%$lastName%'";
        $result2 = mysqli_query($conn, $query);

        if (mysqli_num_rows($result2) > 0) {
            echo "<p class='success'>Successfully displayed " . mysqli_num_rows($result2) . " result(s)</p>";
            echo "<table>";
            echo    "<tr>
                        <th>Member ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                    </tr>";
            while ($row = mysqli_fetch_assoc($result2)) {
                echo    "<tr>
                            <td>" . $row['member_id'] . "</td>
                            <td>" . $row['fname'] . "</td>
                            <td>" . $row['lname'] . "</td>
                            <td>" . $row['email'] . "</td>
                        </tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='error'>Error: No results match the data input.</p>";
        }

        mysqli_free_result($result2);
    } else {
        echo "<p style='color:red'>Error: Table $table does not exist.</p>";
    }

    mysqli_free_result($result1);
    mysqli_close($conn);

    echo "<br/>";

    echo "<a href='vip_member.php'>Return to Home Page.</a>";
    ?>
</body>

</html>