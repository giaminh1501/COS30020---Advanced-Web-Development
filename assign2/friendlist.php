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

                // Get the list of friends of the logged in user
                $getFriend = "SELECT DISTINCT f.friend_id, f.profile_name
                              FROM friends f JOIN myfriends mf
                              ON f.friend_id = mf.friend_id1 OR f.friend_id = mf.friend_id2
                              WHERE (mf.friend_id1 = '$user' OR mf.friend_id2 = '$user')
                              AND f.friend_id != '$user'";
                $getFriendResult = mysqli_query($dbconn, $getFriend);

                // Unfriend button
                if (isset($_POST["delete"])) {
                    // Call method to remove that friend from the list
                    delete($_POST["friend"]);

                    // Redirect to the page itself, reset the list of friend
                    header("Location: friendlist.php");
                    exit;
                }

                function delete($friend)
                {
                    global $dbconn, $user, $numOfFriends;

                    // Delete friend from myfriends table
                    $deleteFriend = "DELETE FROM myfriends 
                                     WHERE (friend_id1 = '$user' AND friend_id2 = '$friend') OR (friend_id1 = '$friend' AND friend_id2 = '$user')";
                    mysqli_query($dbconn, $deleteFriend);

                    // Update the friend number of user in friends table after deleting
                    $numOfFriends--;
                    $updateFriend = "UPDATE friends 
                                     SET num_of_friends = '$numOfFriends'
                                     WHERE friend_id = '$user'";
                    mysqli_query($dbconn, $updateFriend);

                    // Update the friend number of the deleted friend from friends table
                    $getFriendNum = "SELECT num_of_friends
                                     FROM friends
                                     WHERE friend_id = '$friend'";
                    $getFriendNumResult = mysqli_query($dbconn, $getFriendNum);
                    $friendNumRow = mysqli_fetch_assoc($getFriendNumResult);
                    $newNumOfFriends = $friendNumRow["num_of_friends"];

                    // Update the new friend number to table
                    $newNumOfFriends--;
                    $updateFriendNum = "UPDATE friends
                                        SET num_of_friends = '$newNumOfFriends' WHERE friend_id = '$friend'";
                    mysqli_query($dbconn, $updateFriendNum);
                }
                ?>

                <!-- Welcome the user -->
                <span class="navbar-brand">Welcome, <?php echo $profileName ?></span>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="friendadd.php">ADD FRIEND</a>
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
        <h1><?php echo $profileName ?>'s Friend List Page</h1>
        <h1>Total number of friends is <?php echo $numOfFriends ?></h1>
    </div>

    <!-- database connection status -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                // Display table with friends of that user
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
                        echo "<form action='friendlist.php' method='POST'>";
                        echo "<input class='btn btn-danger' type='submit' name='delete' value='Unfriend'>";
                        echo "<input type='hidden' name='friend' value='{$friendID}'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                    }

                    echo "</table>";
                } else {
                    echo "<p class='alert alert-warning'>You have no friends available. Add some first!</p>";
                }

                mysqli_close($dbconn);
                ?>
            </div>
        </div>
    </div>
</body>

</html>