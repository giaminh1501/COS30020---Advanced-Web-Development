<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Your Name" />
    <title>Updating the Guest Book System</title>

    <link href="style/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <h1>Web Programming - Lab 6</h1>
    <?php // read the comments for hints on how to answer each item
    umask(0007);
    $dir = "../../data/lab06";
    if (!file_exists($dir)) {
        mkdir($dir, 02770);
    }

    if (isset($_POST["name"]) && isset($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["email"])) { // check if both form data exists
        $name = $_POST["name"]; // obtain the form first data
        $email = $_POST["email"]; // obtain the form last data

        $regexp = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/";
        if (preg_match($regexp, $email)) {
            echo "<p style='color:green'>Email address is valid.</p>";

            $filename = "../../data/lab06/guestbook.txt"; // assumes php file is inside lab06
            $handle = fopen($filename, "a"); // open the file in append mode
            $alldata = array();
            if (is_writable($filename)) {
                $itemdata = array();
                $handle = fopen($filename, "r"); // open the file in append mode
                while (!feof($handle)) {
                    $onedata = fgets($handle);
                    if ($onedata !== "") {
                        $data = explode(",", $onedata);
                        $alldata[] = $data;
                        $itemdata[] = $alldata[0];
                    }
                }
                fclose($handle);
                $newdata = !(in_array($name, $itemdata));
            } else {
                $newdata = true;
            }
            if ($newdata) {
                $handle = fopen($filename, "a");
                $data = $name . "," . $email . "\n"; // concatenate first and last delimited by comma and end of line character
                fputs($handle, $data);
                echo "<p class='alert alert-success'>Thanks you for signing in our guest book.<p>";
                fclose($handle); // close the text file
            } else {
                echo "<p class='alert alert-danger'>You have already signed the guest book!</p>";
            }
        }
        else {
            echo "<p class='alert alert-danger'>Invalid email.</p>";
        }
    } else { // no input
        echo "<p class='alert alert-danger'>You must enter your name and email address!</p>";
        echo "<p class='alert alert-danger'>Use the Browser's 'Go Back' button to return to the Guestbook form.</p>";
    }

    echo "<a href='guestbookform.php'>Add Another Visitor</a>";
    echo "<br>";
    echo "<a href='guestbookshow.php'>View Guest Book</a>";
    ?>
</body>

</html>