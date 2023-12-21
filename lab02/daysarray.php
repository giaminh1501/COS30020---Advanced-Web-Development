<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 2" />
    <meta name="keywords" content="Web,programming" />
    <title>Experimenting on arrays</title>
</head>
<body>
    <h1>Web Programming - Lab 2</h1>
    <?php
        $days = array ("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"); // declare and initialise array
        $daysEng = implode(", ", $days);
        echo "<p>The days of the week in English are: $daysEng.</p><br />";

        $days[0] = "Dimanche";
        $days[1] = "Lundi";
        $days[2] = "Mardi";
        $days[3] = "Mercredi";
        $days[4] = "Jeudi";
        $days[5] = "Vendredi";
        $days[6] = "Samedi";
        $daysFrench = implode(", ", $days);
        echo "<p>The days of the week in French are: $daysFrench.</p>";
    ?>
</body>
</html>