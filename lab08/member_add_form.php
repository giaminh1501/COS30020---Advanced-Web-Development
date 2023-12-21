<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Lab08" />
    <meta name="keywords" content="Web,programming" />
    <title>VIP member Registration System</title>
</head>

<body>
    <h1>VIP Member - Add Member</h1>
    <form action="member_add.php" method="post">
        <p>
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname">
        </p>
        <p>
            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="lname">
        </p>
        <p>
            <label for="gender">Gender:</label>

            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>

            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </p>
        <p>
            <label for="phone">Phone number:</label>
            <input type="text" id="phone" name="phone">
        </p>
        <p>
            <input type="submit" value="Add">
            <input type="reset" value="Reset">
        </p>
    </form>
</body>

</html>