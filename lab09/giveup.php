<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating a simple “Guessing Game”</title>

    <style>
        .notice {
            color: blue;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <p class="notice">The hidden number was:
        <?php
        session_start();
        if (!isset($_SESSION["random"])) {
            echo "<p class='error'>Error: No random number found.</p>";
        } else {
            echo $_SESSION["random"];
        }
        ?>
    </p>

    <p><a href="startover.php">Start Over</a></p>
</body>

</html>