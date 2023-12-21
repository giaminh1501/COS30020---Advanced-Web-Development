<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 2" />
    <meta name="keywords" content="Web,programming" />
    <title>Using expression and looking up built-in functions</title>
</head>
<body>
    <h1>Web Programming - Lab 2</h1>
    <?php
        $value = $_GET['value'];

        round($value, 0);
        function check($value) {
            if(is_numeric($value) && $value % 2 == 0) {
                echo "<p>$value is numeric and even.</p>";
            }
            else if(is_numeric($value) && $value % 2 != 0){
                echo "<p>$value is numeric and not even.</p>";
            }
            else {
                echo "<p>$value is not numeric.</p>";
            }
        }

        check($value);
    ?>
</body>
</html>