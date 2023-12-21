<!DOCTYPE html>
<html>

<head>
	<title>Leap Year</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<?php
	if (!empty($_GET["year"]) && is_numeric($_GET["year"])) {
		$Year = $_GET["year"];
		if ($Year % 4 != 0)
			echo "The year you entered is a standard year.";
		else if ($Year % 400 == 0)
			echo "The year you entered is a leap year.";
		else if ($Year % 100 == 0)
			echo "The year you entered is a standard year.";
		else
			echo "The year you entered is a leap year.";
	} else {
		echo "Enter a year.";
	}
	?>
</body>

</html>