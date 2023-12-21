<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My friend system</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Friend</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">SIGN UP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">LOG IN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">ABOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- title -->
    <div class="jumbotron text-center">
        <h1>My Friend System</h1>
        <h1>Registration Page</h1>
    </div>

    <!-- details -->
    <div class="container-fluid">
        <form action="signup.php" method="POST">
            <div class="row">
                <div class="col-md-7 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" />
                </div>
                <div class="col-md-7 form-group">
                    <input class="form-control" id="pfname" name="pfname" placeholder="Profile Name" type="text" />
                </div>
                <div class="col-md-7 form-group">
                    <input class="form-control" id="pwd" name="pwd" placeholder="Password" type="password" />
                </div>
                <div class="col-md-7 form-group">
                    <input class="form-control" id="confirmpwd" name="confirmpwd" placeholder="Confirm Password" type="password" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-1 form-group">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
                <div class="col-md-1 form-group">
                    <button class="btn btn-secondary" type="reset">Clear</button>
                </div>
            </div>
        </form>
    </div>

    <!-- database connection status -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Validation data input
                    $email = $_POST["email"];
                    $profileName = $_POST["pfname"];
                    $passwordInput = $_POST["pwd"];
                    $confirmPassword = $_POST["confirmpwd"];

                    // Validate email format
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo "<p class='alert alert-danger'>Error: Invalid email format!</p>";
                    }

                    // Database connection
                    $host = "feenix-mariadb.swin.edu.au";
                    $username = "s103487156";
                    $password = "150103";
                    $database = "s103487156_db";

                    $dbconn = mysqli_connect($host, $username, $password, $database);

                    // Check connection
                    if (!$dbconn) {
                        die("Failed to connect: " . mysqli_connect_error());
                    }

                    // Check if input email has already existed in the 'friends' table or not
                    $selectSql = "SELECT * FROM friends WHERE friend_email = '$email'";
                    if (mysqli_num_rows(mysqli_query($dbconn, $selectSql)) > 0) {
                        echo "<p class='alert alert-danger'>Error: Input email has already existed!</p>";
                    }

                    // Validate profile name format
                    if (!preg_match("/^[a-zA-Z ]*$/", $profileName)) {
                        echo "<p class='alert alert-danger'>Error: Profile name can only consist of free letters and spaces!</p>";
                    }

                    // Validate password format
                    if (!preg_match("/^[a-zA-Z0-9]*$/", $passwordInput)) {
                        echo "<p class='alert alert-danger'>Error: Password can only consist of free letters and numbers. No special characters are allowed!</p>";
                    }

                    // Check if confirmed password is similar to input password
                    if ($passwordInput !== $confirmPassword) {
                        echo "<p class='alert alert-danger'>Error: Passwords do not match!</p>";
                    }

                    // Add data to 'friends' table if input valid
                    if (filter_var($email, FILTER_VALIDATE_EMAIL) && mysqli_num_rows(mysqli_query($dbconn, $selectSql)) == 0 && preg_match("/^[a-zA-Z ]*$/", $profileName) && preg_match("/^[a-zA-Z0-9]*$/", $passwordInput) && $passwordInput === $confirmPassword) {
                        // Add data to 'friends' table
                        $dateStarted = date("Y-m-d");
                        $numOfFriends = 0;

                        $insertSql = "INSERT INTO friends (friend_email, password, profile_name, date_started, num_of_friends) VALUES ('$email', '$passwordInput', '$profileName', '$dateStarted', $numOfFriends)";
                        if (mysqli_query($dbconn, $insertSql)) {
                            echo "<p class='alert alert-success'>Successfully registered!</p>";

                            // Set session variable(s) for successful login status
                            session_start();
                            $_SESSION["loggedIn"] = true;
                            $_SESSION["email"] = $email;

                            // Redirect to Add Friend List Page
                            header("Location: friendadd.php");
                            exit;
                        } else {
                            echo "<p class='alert alert-danger'>Error: " . mysqli_error($dbconn) . "</p>";
                        }
                    }

                    // Stop connecting to database
                    mysqli_close($dbconn);
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>