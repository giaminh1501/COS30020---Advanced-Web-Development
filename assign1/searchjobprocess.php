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

        $jobTitle = $_POST['jtitle'];
        if (isset($_POST['jposition'])) {
            $position = $_POST['jposition'];
        } else {
            $position = "";
        }
        if (isset($_POST['jcontract'])) {
            $contract = $_POST['jcontract'];
        } else {
            $contract = "";
        }
        if (isset($_POST['japplication'])) {
            $application = $_POST['japplication'];
        } else {
            $application = "";
        }
        if (isset($_POST['jlocation'])) {
            $location = $_POST['jlocation'];
        } else {
            $location = "";
        }

        if (empty($jobTitle)) {
            $errorMessage = "Please enter a job title.";
            echo "Error: $errorMessage";
            echo "<br><p>Use the 'Go Back' button in the Browser to go back to the Search Job Vacancy Form.</p>";
            echo "<br><a href='index.php'>Return to Home Page.</a>";
            exit;
        }

        if (!file_exists($filename)) {
            $errorMessage = "The job vacancy data is not available.";
            echo "Error: $errorMessage";
            echo "<br><p>Use the 'Go Back' button in the Browser to go back to the Search Job Vacancy Form.</p>";
            echo "<br><a href='index.php'>Return to Home Page.</a>";
            exit;
        }

        $jobs = file($filename, FILE_IGNORE_NEW_LINES);

        $matches = [];
        foreach ($jobs as $job) {
            $jobData = explode("\t", $job);
            $title = $jobData[1];
            $iContract = $jobData[5];
            $iPosition = $jobData[4];
            $iApplication = $jobData[6];
            $iLocation = $jobData[7];
            $closingDate = $jobData[3];

            $match = true;

            if (!empty($position) && $position != $iPosition) {
                $match = false;
            }

            if (!empty($contract) && $contract != $iContract) {
                $match = false;
            }

            if (!empty($application) && $application != $iApplication) {
                $match = false;
            }

            if (!empty($location) && $location != $iLocation) {
                $match = false;
            }

            if ($match && stripos($title, $jobTitle) !== false && $closingDate >= date('d/m/y')) {
                $matches[] = $job;
            }
        }

        if (count($matches) > 0) {
            echo "<h2>Job Vacancy Information</h2>";
            foreach (array_reverse($matches) as $match) {
                $jobData = explode("\t", $match);

                $title = $jobData[1];
                $description = $jobData[2];
                $closingDate = $jobData[3];
                $contract = $jobData[5];
                $position = $jobData[4];
                $application = $jobData[6];
                $location = $jobData[7];

                echo "<p><strong>Job Title:</strong> $title</p>";
                echo "<p><strong>Description:</strong> \"$description\"</p>";
                echo "<p><strong>Closing Date:</strong> $closingDate</p>";
                echo "<p><strong>Position:</strong> $contract - $position</p>";
                echo "<p><strong>Application by:</strong> $application</p>";
                echo "<p><strong>Location:</strong> $location</p>";
                echo "<br>";
            }
            echo "<br><p>Use the 'Go Back' button in the Browser to go back to the Search Job Vacancy Form.</p>";
            echo "<br><a href='index.php'>Return to Home Page.</a>";
        } else {
            $errorMessage = "No job vacancies found based on the provided title.";
            echo "Error: $errorMessage";
            echo "<br><p>Use the 'Go Back' button in the Browser to go back to the Search Job Vacancy Form.</p>";
            echo "<br><a href='index.php'>Return to Home Page.</a>";
        }
        ?>
    </div>
</body>

</html>