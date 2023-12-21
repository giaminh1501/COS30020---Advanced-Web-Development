<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 3" />
    <meta name="keywords" content="Web,programming" />
    <title>Implementing loop statements</title>
</head>
<body>
    <h1>Web Programming - Lab 3</h1>
    <?php
        $value = $_GET["number"];

        round($value, 0);
        function is_prime($value) {
            if(is_numeric($value) && ($value >= 1 && $value <= 999)) {
                if($value == 1) {
                    return false;
                }

                for($i = 2; $i <= $value / 2; $i++) {
                    if($value % $i == 0) {
                        return false;
                    }
                }
                return true;
            }
            else {
                return 2;
            }
        }

        is_prime($value);

        if(is_prime($value) == 1) {
            echo "<p>$value is a prime number.</p>";
        }
        else if(is_prime($value) == 0) {
            echo "<p>$value is not a prime number.</p>";
        }
        else {
            echo "<p>$value is not a number from 1 to 999.</p>";
        }
    ?>
</body>
</html>