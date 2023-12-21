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
    </style>
</head>

<body>
    <h1>VIP Member - Add Member</h1>
    <?php
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pswd) or die("Connection failed: " . mysqli_connect_error());

    @mysqli_select_db($conn, $dbnm) or die("Database selection failed: " . mysqli_error($conn));

    $table = "vipmembers";

    $sql1 = "CREATE TABLE IF NOT EXISTS $table (
        member_id INT AUTO_INCREMENT PRIMARY KEY,
        fname VARCHAR(50),
        lname VARCHAR(50),
        gender VARCHAR(6),
        email VARCHAR(50),
        phone VARCHAR(15)
      )";

    if (mysqli_query($conn, $sql1)) {
        echo "<p class='success'>Successfully created table $table !</p>";
    } else {
        echo "<p class='error'>Error creating table: " . mysqli_error($conn) . "</p>";
    }

    if (!isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['gender']) || !isset($_POST['email']) || !isset($_POST['phone'])) {
        echo "<p class='error'>Error: All fields are mandatory. Please fill in all the required fields.</p>";
        echo "<br><br>";
        echo "<p>Use the 'Go Back' button in the Browser to go back to the Add VIP Member Form.</p>";
        echo "<br>";
        echo "<a href='vip_member.php'>Return to Home Page.</a>";
        exit;
    }

    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (!preg_match('/^[a-zA-Z\s]+$/', $firstName)) {
        echo "<p class='error'>Error: Invalid first name. First name must contain only alphabet characters and space.</p>";
        echo "<br><br>";
        echo "<p>Use the 'Go Back' button in the Browser to go back to the Add VIP Member Form.</p>";
        echo "<br>";
        echo "<a href='vip_member.php'>Return to Home Page.</a>";
        exit;
    }

    if (!preg_match('/^[a-zA-Z\s]+$/', $lastName)) {
        echo "<p class='error'>Error: Invalid last name. Last name must contain only alphabet characters or space.</p>";
        echo "<br><br>";
        echo "<p>Use the 'Go Back' button in the Browser to go back to the Add VIP Member Form.</p>";
        echo "<br>";
        echo "<a href='vip_member.php'>Return to Home Page.</a>";
        exit;
    }

    if (!preg_match('/^[a-zA-Z0-9\.\/]+@(outlook\.com|gmail\.com)$/', $email)) {
        echo "<p class='error'>Error: Invalid email. The user name part must contain alphabet characters, numbers or special characters like '.' or '/'. Domain part must 
                be 'outlook.com' or 'gmail.com'.</p>";
        echo "<br><br>";
        echo "<p>Use the 'Go Back' button in the Browser to go back to the Add VIP Member Form.</p>";
        echo "<br>";
        echo "<a href='vip_member.php'>Return to Home Page.</a>";
        exit;
    }

    if (!preg_match('/^(?:\+84|0)[0-9]{9}$/', $phone)) {
        echo "<p class='error'>Error: Invalid phone number. Phone number must start with '+84' or '0', followed by 9 numbers. For example
                +84987654321 or 0987654321.</p>";
        echo "<br><br>";
        echo "<p>Use the 'Go Back' button in the Browser to go back to the Add VIP Member Form.</p>";
        echo "<br>";
        echo "<a href='vip_member.php'>Return to Home Page.</a>";
        exit;
    }

    $existedData = "SELECT * FROM vipmembers WHERE fname = '$firstName' AND lname = '$lastName'";

    $result = mysqli_query($conn, $existedData);

    if (mysqli_num_rows($result) > 0) {
        echo "<p class='error'>Error: First and last name inputted are already existed. Try others.</p>";
        echo "<br><br>";
        echo "<p>Use the 'Go Back' button in the Browser to go back to the Add VIP Member Form.</p>";
        echo "<br>";
        echo "<a href='vip_member.php'>Return to Home Page.</a>";
    } else {
        $sql2 = "INSERT INTO vipmembers (fname, lname, gender, email, phone) VALUES ('$firstName', '$lastName', '$gender', '$email', '$phone')";

        if (mysqli_query($conn, $sql2)) {
            echo "<p class='success'>Successfully inserted data into $table table.</p>";
            echo "<br><br>";
            echo "<p>Use the 'Go Back' button in the Browser to go back to the Add VIP Member Form.</p>";
            echo "<br>";
            echo "<a href='vip_member.php'>Return to Home Page.</a>";
        } else {
            echo "<p class='error'>Error inserting into table: " . mysqli_error($conn) . "</p>";
            echo "<br><br>";
            echo "<p>Use the 'Go Back' button in the Browser to go back to the Add VIP Member Form.</p>";
            echo "<br>";
            echo "<a href='vip_member.php'>Return to Home Page.</a>";
        }
    }

    mysqli_close($conn);
    ?>
</body>

</html>