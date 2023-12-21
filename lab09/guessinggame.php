<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating a simple “Guessing Game”</title>

    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>
    <h1>Guessing Game</h1>

    <p>Enter a number between 1 and 100, then press the Guess button.</p>

    <form method="post">
        <input type="text" id="guess" name="guess">
        <input type="submit" value="Guess">
    </form>

    <?php
    session_start();

    if (!isset($_SESSION["random"])) {
        $_SESSION["random"] = rand(1, 100);
        $_SESSION["count"] = 0;
    }

    if (!isset($_POST["guess"])) {
        echo "<p class='error'>Please guess a number!</p>";
    } else {
        if (!is_numeric($_POST["guess"]) && empty($_POST["guess"]) && $_POST["guess"] < 1 && $_POST["guess"] > 100) {
            echo "<p class='error'>The guessed number must be between 1 and 100!</p>";
        } else {
            $guess = $_POST["guess"];
            $_SESSION["count"]++;

            if ($guess > $_SESSION["random"]) {
                echo "<p class='error'>Please guess lower!</p>";
            } else if ($guess < $_SESSION["random"]) {
                echo "<p class='error'>Please guess higher!</p>";
            } else {
                echo "<p class='success'>Congratulation! You guessed the hidden number!</p>";
            }
        }
    }
    ?>

    <p>Number of guesses: <?php echo $_SESSION["count"]; ?>.</p>

    <p><a href="giveup.php">Give Up</a></p>
    <p><a href="startover.php">Start Over</a></p>
</body>

</html>