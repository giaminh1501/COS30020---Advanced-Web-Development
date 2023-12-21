<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 3" />
    <meta name="keywords" content="Web,programming" />
    <title>Creating a Guest Book</title>
</head>

<body>
    <h1>Web Programming - Lab 5</h1>
    <form action="guestbooksave.php" method="post">
        <fieldset>
            <legend>Enter your details to sign our guest book</legend>
            <label for="str">First Name</label>
            <input type="text" id="str" name="fname">
            <br />
            <label for="str">Last Name</label>
            <input type="text" id="str" name="lname">
            <br />
            <input type="submit" value="Sign in">
        </fieldset>
    </form>
</body>

</html>