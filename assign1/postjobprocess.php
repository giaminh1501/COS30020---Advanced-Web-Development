<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="Web Programming :: Assignment 1" />
  <meta name="keywords" content="Web,programming" />
  <title>Assignment 1 - Job Vacancy Posting System</title>

  <link href="style/bootstrap.min.css" rel="stylesheet" />

  <style>
    div.container {
      min-width: fit-content;
    }

    div.row {
      margin: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Job Vacancy Posting System</h1>
      </div>
    </div>

    <?php
    $dir = "../../data/asm1";
    if (!file_exists($dir)) {
      mkdir($dir, 02770, true);
    }

    $filename = "../../data/asm1/postjob.txt";

    if (!isset($_POST['pid']) || !isset($_POST['title']) || !isset($_POST['desc']) || !isset($_POST['date']) || !isset($_POST['position']) || !isset($_POST['contract']) || !isset($_POST['application']) || !isset($_POST['location'])) {
      echo "Error: All fields are mandatory. Please fill in all the required fields.";
      echo "<br><br>";
      echo "<p>Use the 'Go Back' button in the Browser to go back to the Post Job Vacancy Form.</p>";
      echo "<br>";
      echo "<a href='index.php'>Return to Home Page.</a>";
      exit;
    }

    $positionID = $_POST['pid'];
    $title = $_POST['title'];
    $description = $_POST['desc'];
    $closingDate = $_POST['date'];
    $position = $_POST['position'];
    $contract = $_POST['contract'];
    $application = $_POST['application'];
    $location = $_POST['location'];

    if (!preg_match('/^P\d{4}$/', $positionID)) {
      echo "Error: Invalid ID. Position ID must start with an uppercase 'P' followed by 4 digits.";
      echo "<br><br>";
      echo "<p>Use the 'Go Back' button in the Browser to go back to the Post Job Vacancy Form.</p>";
      echo "<br>";
      echo "<a href='index.php'>Return to Home Page.</a>";
      exit;
    }

    if (strlen($title) > 20 || !preg_match('/^[a-zA-Z0-9\s,.!]+$/', $title)) {
      echo "Error: Invalid Title. Title must not exceed 20 alphanumeric characters including spaces, comma, period (full stop), and exclamation point. Other characters are not accepted.";
      echo "<br><br>";
      echo "<p>Use the 'Go Back' button in the Browser to go back to the Post Job Vacancy Form.</p>";
      echo "<br>";
      echo "<a href='index.php'>Return to Home Page.</a>";
      exit;
    }

    if (strlen($description) > 260) {
      echo "Error: Invalid Description. Description must not exceed 260 characters.";
      echo "<br><br>";
      echo "<p>Use the 'Go Back' button in the Browser to go back to the Post Job Vacancy Form.</p>";
      echo "<br>";
      echo "<a href='index.php'>Return to Home Page.</a>";
      exit;
    }

    if (!preg_match('/^\d{1,2}\/\d{1,2}\/\d{2}$/', $closingDate)) {
      echo "Error: Invalid Closing Date. Closing Date must be in dd/mm/yy or d/m/yy format. e.g 14/10/23 or 4/1/23.";
      echo "<br><br>";
      echo "<p>Use the 'Go Back' button in the Browser to go back to the Post Job Vacancy Form.</p>";
      echo "<br>";
      echo "<a href='index.php'>Return to Home Page.</a>";
      exit;
    }

    $record = $positionID . "\t" . $title . "\t" . $description . "\t" . $closingDate . "\t" . $position . "\t" . $contract . "\t" . $application . "\t" . $location . "\n";

    file_put_contents($filename, $record, FILE_APPEND);

    echo "Job vacancy stored successfully!";
    echo "<br><br>";
    echo "<a href='index.php'>Return to Home Page.</a>";
    ?>
  </div>
</body>

</html>