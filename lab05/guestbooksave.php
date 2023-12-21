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
    <?php // read the comments for hints on how to answer each item
    $dir = "../../data/lab05";
    if (!file_exists($dir)) {
        mkdir($dir, 02770);
    }

    if (isset($_POST["fname"]) && isset($_POST["lname"]) && !empty($_POST["fname"]) && !empty($_POST["lname"])) { // check if both form data exists
        $fname = $_POST["fname"]; // obtain the form first name data
        $lname = $_POST["lname"]; // obtain the form last name data
        $filename = "../../data/lab05/guestbook.txt"; // assumes php file is inside lab05
        $handle = fopen($filename, "append"); // open the file in append mode
        if (is_writeable($filename)) // check if file is writeable
        {
            $fname = addslashes($fname);
            $lname = addslashes($lname);
            $data = $fname . " " . $lname . "\n"; // concatenate first and last name delimited by comma
            if (fwrite($handle, $data) === false) // check if writeable or not
            {
                echo "<p>Cannot add your name to the guest book!</p> ";
            }
            else 
            {
                echo "<p>Thank you for signing our guest book!</p> ";
            }
            fclose($handle);
        }
        else
        {
            echo "<p>Cannot add your name to the guest book!</p> ";
            fclose($handle);
        }
    } 
    else 
    { 
        echo "<p>You must enter your first and last name!</p> ";
        echo "<p>Use the Browser's 'Go back' button to return to the Guestbook form.</p> ";
    }

    echo "<a href='guestbookshow.php'>Go to guest book signed list.</a>";
    ?>
</body>

</html>