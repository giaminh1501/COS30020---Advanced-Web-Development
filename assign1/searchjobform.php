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

        .col-md-3 {
            margin-left: 20px;
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

        <form method="POST" action="searchjobprocess.php?jtitle=&jposition=&jcontract=&japplication=&jlocation=">
            <div class="row">
                <div class="col-md-2"><label for="jtitle">Job Title:</label></div>
                <div class="col-md-2"><input type="text" id="jtitle" name="jtitle"></div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Position:</p>
                </div>

                <div class="col-md-2">
                    <input type="radio" id="ftime" name="jposition" value="Full Time">
                    <label for="ftime">Full Time</label>
                </div>

                <div class="col-md-2">
                    <input type="radio" id="ptime" name="jposition" value="Part Time">
                    <label for="ptime">Part Time</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Contract:</p>
                </div>

                <div class="col-md-2">
                    <input type="radio" id="ongo" name="jcontract" value="On-going">
                    <label for="ongo">On-going</label>
                </div>

                <div class="col-md-2">
                    <input type="radio" id="fterm" name="jcontract" value="Fixed Term">
                    <label for="fterm">Fixed Term</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Application by:</p>
                </div>

                <div class="col-md-2">
                    <input type="checkbox" id="post" name="japplication" value="Post">
                    <label for="post">Post</label>
                </div>

                <div class="col-md-2">
                    <input type="checkbox" id="mail" name="japplication" value="Mail">
                    <label for="mail">Mail</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Location:</p>
                </div>

                <div class="col-md-2">
                    <select name="jlocation">
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
                    <input class="button" type="submit" value="Search">
                    <input class="button" type="reset" value="Reset">
                </div>

                <div class="col-md-4">
                    <a href="index.php">Return to Home Page.</a>
                </div>
            </div>

    </div>
    </div>
    </form>
    </div>
</body>

</html>