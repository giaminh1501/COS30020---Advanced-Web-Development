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
                <?php
                session_start();

                // Check the login status
                if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true) {
                    header("Location: error.php");
                    exit;
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

                // Get the details of user
                $email = $_SESSION["email"];
                $getDetail = "SELECT friend_id, profile_name, num_of_friends
                              FROM friends 
                              WHERE friend_email = '$email'";
                $getDetailResult = mysqli_query($dbconn, $getDetail);
                $getDetailRow = mysqli_fetch_assoc($getDetailResult);

                $user = $getDetailRow["friend_id"];
                $profileName = $getDetailRow["profile_name"];
                $numOfFriends = $getDetailRow["num_of_friends"];

                // Get the list of friends that is not friends of user
                $getFriend = "SELECT friend_id, profile_name
                              FROM friends  
                              WHERE friend_id != '$user' 
                              AND friend_id 
                              NOT IN 
                              ( SELECT friend_id1 
                                FROM myfriends  
                                WHERE friend_id2 = '$user')
                              AND friend_id
                              NOT IN
                              ( SELECT friend_id2
                                FROM myfriends 
                                WHERE friend_id1 = '$user')";
                $getFriendResult = mysqli_query($dbconn, $getFriend);

                if (isset($_POST["add"])) {
                    add($_POST["friend"]);
                    header("Location: friendadd.php");
                    exit;
                }

                function add($friend)
                {
                    global $dbconn, $user, $numOfFriends;

                    // Add friend from myfriends table
                    $addFriend = "INSERT INTO myfriends 
                                     (friend_id1, friend_id2)
                                     VALUES ('$user', '$friend')";
                    mysqli_query($dbconn, $addFriend);

                    // Update the friend number of user in friends table after adding
                    $numOfFriends++;
                    $updateFriend = "UPDATE friends 
                                     SET num_of_friends = '$numOfFriends'
                                     WHERE friend_id = '$user'";
                    mysqli_query($dbconn, $updateFriend);

                    // Update the friend number of the added friend from friends table
                    $getFriendNum = "SELECT num_of_friends
                                     FROM friends
                                     WHERE friend_id = '$friend'";
                    $getFriendNumResult = mysqli_query($dbconn, $getFriendNum);
                    $friendNumRow = mysqli_fetch_assoc($getFriendNumResult);
                    $newNumOfFriends = $friendNumRow["num_of_friends"];

                    // Update the new friend number to table
                    $newNumOfFriends++;
                    $updateFriendNum = "UPDATE friends
                                        SET num_of_friends = '$newNumOfFriends' 
                                        WHERE friend_id = '$friend'";
                    mysqli_query($dbconn, $updateFriendNum);
                }
                ?>

                <span class="navbar-brand">Welcome, <?php echo $profileName ?></span>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="friendlist.php">FRIEND LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOG OUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- title -->
    <div class="jumbotron text-center">
        <h1>My Friend System</h1>
        <h1><?php echo $profileName ?>'s Add Friend Page</h1>
        <h1>Total number of friends is <?php echo $numOfFriends ?></h1>
    </div>

    <!-- database connection status -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                // Display table with friends that is not friends of user
                if (mysqli_num_rows($getFriendResult) > 0) {
                    echo "<table class='table table-striped table-hover'>";
                    echo "<thead><tr><th>Friend Name</th><th>Option</th></tr></thead>";

                    while ($friendRow = mysqli_fetch_assoc($getFriendResult)) {
                        $friendID = $friendRow["friend_id"];
                        $friendName = $friendRow["profile_name"];

                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>{$friendName}</td>";
                        echo "<td>";
                        echo "<form action='friendadd.php' method='POST'>";
                        echo "<input class='btn btn-warning' type='submit' name='add' value='Add as Friend'>";
                        echo "<input type='hidden' name='friend' value='{$friendID}'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                    }

                    echo "</table>";
                } else {
                    echo "<p class='alert alert-warning'>You have no friends to add right now!</p>";
                }

                mysqli_close($dbconn);
                ?>
            </div>
        </div>
    </div>
</body>

</html>