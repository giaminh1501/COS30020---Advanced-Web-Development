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
        <h1>Assignment Home Page</h1>
    </div>

    <!-- details -->
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-md-4">
                <p><strong>Name:</strong> Nguyen Gia Minh</p>
                <p><strong>Email:</strong> 103487156@student.swin.edu.au</p>
            </div>

            <div class="col-md-4">
                <p><strong>Student ID:</strong> 103487156</p>
            </div>

            <div class="col-md-12">
                <p>I declare that this assignment is my individual work. I have not worked collaboratively nor
                    have I copied from any other student's work or from any other source.</p>
            </div>
        </div>
    </div>

    <!-- database connection status -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
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

                // Create table 'friends' if it does not exist
                $sql1 = "CREATE TABLE IF NOT EXISTS friends (
                    friend_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
                    friend_email VARCHAR(50) NOT NULL,
                    password VARCHAR(20) NOT NULL,
                    profile_name VARCHAR(30) NOT NULL,
                    date_started DATE NOT NULL,
                    num_of_friends INT UNSIGNED
                )";

                // Check table creation
                if (mysqli_query($dbconn, $sql1)) {
                    echo "<p class='alert alert-success'>Table 'friends' created successfully!</p>";
                } else {
                    echo "<p class='alert alert-danger'>Error: " . mysqli_error($dbconn) . "</p>";
                }

                // Create table 'myfriends' if it does not exist
                $sql2 = "CREATE TABLE IF NOT EXISTS myfriends (
                    friend_id1 INT NOT NULL,
                    friend_id2 INT NOT NULL
                )";

                // Check table creation
                if (mysqli_query($dbconn, $sql2)) {
                    echo "<p class='alert alert-success'>Table 'myfriends' created successfully!</p>";
                } else {
                    echo "<p class='alert alert-danger'>Error: " . mysqli_error($dbconn) . "</p>";
                }

                // Check for data in table before populating
                $selectSql1 = "SELECT * FROM friends";
                if (mysqli_num_rows(mysqli_query($dbconn, $selectSql1)) > 0) {
                    echo "<p class='alert alert-warning'>Warning: Table 'friends' has already populated with data. Stop populating table with new data!</p>";
                } else {
                    // Populate table 'friends' with 10 records
                    $sql3 = "INSERT INTO friends (friend_email, password, profile_name, date_started, num_of_friends)
                    VALUES
                    ('mingng@gmail.com', 'mingng123', 'Minh Nguyen', '2023-08-12', 2),
                    ('giangc@gmail.com', 'giangc888', 'Giang Canh', '2023-04-01', 2),
                    ('ducng@gmail.com', 'ducng999', 'Duc Nguyen', '2023-07-16', 2),
                    ('vydo@gmail.com', 'vydo456', 'Vy Do', '2023-09-22', 2),
                    ('chiph@gmail.com', 'chiph555', 'Chi Pham', '2023-01-15', 2),
                    ('longtr@gmail.com', 'longtr789', 'Long Truong', '2023-05-24', 2),
                    ('maiph@gmail.com', 'maiph222', 'Mai Pham', '2023-02-04', 2),
                    ('quannv@gmail.com', 'quannv468', 'Quan Nguyen Viet', '2023-09-21', 2),
                    ('quanl@gmail.com', 'quanl000', 'Quan Luong', '2023-03-11', 2),
                    ('ngocvu@gmail.com', 'ngocvu111', 'Ngoc Vu', '2023-11-15', 2)";

                    // Check records population
                    if (mysqli_query($dbconn, $sql3)) {
                        echo "<p class='alert alert-success'>Successfully populated table 'friends' with records.</p>";
                    } else {
                        echo "<p class='alert alert-danger'>Error: " . mysqli_error($dbconn) . "</p>";
                    }
                }

                // Check for data in table before populating
                $selectSql2 = "SELECT * FROM myfriends";
                if (mysqli_num_rows(mysqli_query($dbconn, $selectSql2)) > 0) {
                    echo "<p class='alert alert-warning'>Warning: Table 'myfriends' has already populated with data. Stop populating table with new data!</p>";
                } else {
                    // Populate table 'myfriends' with records
                    $sql4 = "INSERT INTO myfriends (friend_id1, friend_id2)
                    VALUES
                    (1, 2),
                    (1, 3),
                    (2, 1),
                    (2, 4),
                    (3, 1),
                    (3, 5),
                    (4, 2),
                    (4, 6),
                    (5, 3),
                    (5, 6),
                    (6, 4),
                    (6, 5),
                    (7, 8),
                    (7, 10),
                    (8, 7),
                    (8, 9),
                    (9, 8),
                    (9, 10),
                    (10, 9),
                    (10, 7)";

                    // Check records population
                    if (mysqli_query($dbconn, $sql4)) {
                        echo "<p class='alert alert-success'>Successfully populated table 'myfriends' with records.</p>";
                    } else {
                        echo "<p class='alert alert-danger'>Error: " . mysqli_error($dbconn) . "</p>";
                    }
                }

                // Stop connecting to database
                mysqli_close($dbconn);
                ?>
            </div>
        </div>
    </div>
</body>

</html>