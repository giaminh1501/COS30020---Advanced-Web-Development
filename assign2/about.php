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
            <div class="col-md-12">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item">I have managed to complete all tasks except the extra challenge one.</li>
                    <li class="list-group-item">I have created a web page with better visual using Bootstrap and CSS. However, this web page could face some problems with smaller screen size devices.</li>
                    <li class="list-group-item">I have faced a lot of trouble with task 5 - creating a friend add list. I was able to show a list of friends who are not friends of logged in user. However, when I click on "Add as Friend", that friend is still recommended in the list. Luckily, I have solved that problem.</li>
                    <li class="list-group-item">Maybe next time I would try to complete the extra challenge.</li>
                    <li class="list-group-item">I have added an error.php file. If user did not login and move to the 'Friend List Page' or 'Add Friend Page', the web page will redirect user to the error page, asking to login before moving to these 2 pages.</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="friendlist.php" class="list-group-item list-group-item-action">Move to Friend List Page</a>
                    <a href="friendadd.php" class="list-group-item list-group-item-action">Move to Add Friend Page</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center">
        <h3>Discussion</h3>
        <hr>
        <div class="col-md-12">
            <img src="./image/discussion3.png" alt="Discussion" width="100%">
        </div>
    </div>
</body>

</html>