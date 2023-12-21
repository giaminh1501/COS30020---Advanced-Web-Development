<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Your Name" />
    <title>Creating a Guest Book</title>
</head>

<body>
    <h1>Web Programming - Lab 5</h1>
    <?php 
    $filename = "../../data/lab05/guestbook.txt";
    if (!file_exists($filename)) 
    {
        echo "<p>Guestbook is empty!</p>";
        exit;
    } 
    else 
    {
        $handle = fopen($filename, "r");

        // option 1
        /*$data = "";
        while (!feof($handle)) 
        {
            $temp = stripslashes(fgets($handle));
            $data .= $temp;
        }*/

        // option 2
        $data = fread($handle, filesize($filename));

        echo "<p>Guest book signed in:</p>";
        echo "<pre>$data</pre>";
        fclose($handle);
    }
    ?>
</body>

</html>