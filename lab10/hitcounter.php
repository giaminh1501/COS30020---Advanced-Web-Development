<?php
class HitCounter
{
    private $dbConnect;
    function __construct($host, $username, $password, $dbname)
    {
        $this->dbConnect = new mysqli($host, $username, $password, $dbname);

        if ($this->dbConnect->connect_error) {
            die("<p>Cannot connect to the database server.</p>"
                . "<p>Error: " . $this->dbConnect->connect_error . "</p>");
        }

        $table = "hitcounter";
        $sql = "SELECT * FROM $table;";
        $this->dbConnect->query($sql)
            or die("<p>Cannot execute the query.</p>"
                . "<p>Error: " . $this->dbConnect->error . "</p>");
    }

    function getHits()
    {
        $sql = "SELECT * FROM hitcounter;";
        $this->dbConnect->query($sql)
            or die("<p>Cannot execute the query.</p>"
                . "<p>Error: " . $this->dbConnect->error . "</p>");
        $result = $this->dbConnect->query($sql);
        $row = $result->fetch_assoc();
        return $row["hits"];
    }

    function setHits($hit)
    {
        $sql = "UPDATE hitcounter SET hits = $hit;";
        $this->dbConnect->query($sql)
            or die("<p>Cannot execute the query.</p>"
                . "<p>Error: " . $this->dbConnect->error . "</p>");
    }

    function closeConnection()
    {
        $this->dbConnect->close();
    }

    function startOver()
    {
        $sql = "UPDATE hitcounter SET hits = 0;";
        $this->dbConnect->query($sql)
            or die("<p>Cannot execute the query.</p>"
                . "<p>Error: " . $this->dbConnect->error . "</p>");
    }
}
