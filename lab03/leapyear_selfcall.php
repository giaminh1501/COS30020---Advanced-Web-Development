<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 3" />
    <meta name="keywords" content="Web,programming" />
    <title>Using if and while statements</title>
</head>
<body>
    <h1>Web Programming - Lab 3</h1>
    <form action = "leapyear_selfcall.php" method = "get">
        <label for="value">Enter a number: </label><br />
        <input type="text" id="year" name="year">
        <input type="submit" value="Check">

        <?php
        if(isset($_GET["year"])) {
            $value = $_GET["year"];
            round($value, 0);
            function is_leapyear($value) {
                if(is_numeric($value) && $value > 0) {
                    if(($value % 4 == 0 || $value % 400 == 0) && $value % 100 != 0) {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
                else {
                    return 2;
                }
            }

            is_leapyear($value);

            if(is_leapyear($value) == 1) {
                echo "<p>$value is a leap year.</p>";
            }
            else if(is_leapyear($value) == 0) {
                echo "<p>$value is a standard year.</p>";
            }
            else {
                echo "<p>$value is not a suitable number for a year.</p>";
            }
        }

        
    ?>
    </form>
</body>
</html>