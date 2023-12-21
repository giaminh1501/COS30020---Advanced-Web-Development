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
            margin: 10px;
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

        <form method="POST" action="postjobprocess.php">
            <div class="row">
                <div class="col-md-2"><label for="pid">Position ID:</label></div>
                <div class="col-md-2"><input type="text" id="pid" name="pid"></div>
            </div>

            <div class="row">
                <div class="col-md-2"><label for="title">Title:</label></div>
                <div class="col-md-2"><input type="text" id="title" name="title"></div>
            </div>

            <div class="row">
                <div class="col-md-2"><label for="desc">Description:</label></div>
                <div class="col-md-2"><textarea id="desc" name="desc"></textarea></div>
            </div>

            <div class="row">
                <div class="col-md-2"><label for="title">Closing Date:</label></div>
                <div class="col-md-2"><input type="text" id="date" name="date" placeholder="dd/mm/yyyy" value="<?php echo date('d/m/y'); ?>"></div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Position:</p>
                </div>

                <div class="col-md-2">
                    <input type="radio" id="ftime" name="position" value="Full Time">
                    <label for="ftime">Full Time</label>
                </div>

                <div class="col-md-2">
                    <input type="radio" id="ptime" name="position" value="Part Time">
                    <label for="ptime">Part Time</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Contract:</p>
                </div>

                <div class="col-md-2">
                    <input type="radio" id="ongo" name="contract" value="On-going">
                    <label for="ongo">On-going</label>
                </div>

                <div class="col-md-2">
                    <input type="radio" id="fterm" name="contract" value="Fixed Term">
                    <label for="fterm">Fixed Term</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Application by:</p>
                </div>

                <div class="col-md-2">
                    <input type="checkbox" id="post" name="application" value="Post">
                    <label for="post">Post</label>
                </div>

                <div class="col-md-2">
                    <input type="checkbox" id="mail" name="application" value="Mail">
                    <label for="mail">Mail</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Location:</p>
                </div>

                <div class="col-md-2">
                    <select name="location">
                        <option value="">---</option>
                        <option value="ACT">ACT</option>
                        <option value="NSW">NSW</option>
                        <option value="NT">NT</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="VIC">VIC</option>
                        <option value="WA">WA</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <input class="button" type="submit" value="Post">
                    <input class="button" type="reset" value="Reset">
                </div>

                <div class="col-md-4">
                    <p>All fields are required. <a href="index.php">Return to Home Page.</a></p>
                </div>
            </div>
    </div>
    </form>
    </div>
</body>

</html>