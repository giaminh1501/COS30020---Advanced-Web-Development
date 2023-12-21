<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 3" />
    <meta name="keywords" content="Web,programming" />
    <title>Practicing the use of str_replace()</title>
</head>
<body>
    <h1>Web Programming - Lab 4</h1>
    <form action="standardpalindromeself.php" method="post">
        <label for="str">Enter a string:</label>
        <input type="text" id="str" name="string" required>
        <br/>
        <input type="submit" value="Check">
    </form>

    <?php
        if (isset($_POST["string"]))
        {
            $str = $_POST["string"];
            $strConverter = strtolower(preg_replace('/[^a-zA-Z]/', '', $str));
            $strReverse = strrev($strConverter);
            if (strcmp($strConverter, $strReverse) === 0)
            {
                echo "<p>The text you entered: '$str' is a perfect palindrome!</p>";
            }
            else
            {
                echo "<p>The text you entered: '$str' is NOT a perfect palindrome!</p>";
            }
        }
        else
        {
            echo "<p>Please enter a string.</p>";
        }
    ?>
</body>
</html>