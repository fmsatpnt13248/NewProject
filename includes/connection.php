<?php

class MySQLConnection
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbName = "newproject";

    public function mySQLConnect(&$conn)
    {
        // Trying to create connection
        try {
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbName);
            // Checking connection
            // echo "Connected successfully";
            return $conn;

            if (mysqli_connect_error()) {
                throw new Exception(mysqli_connect_error());
            }
        } catch (Exception $e) {
            echo("Connection failed: " . $e);
        }
    }
    public function mySQLSelect(&$row, $id)
    {
        try {
            $conn = $this->mySQLConnect($conn);

            $result = mysqli_query($conn, "SELECT * FROM tasks WHERE task_id=" . $id . ";");

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            return $row;
            die();
        } catch (PDOException $e) {
            echo("Query failed: " . $e);
        }
    }
    public function mySQLGetMaxID(&$maxID)
    {
        try {
            $conn = $this->mySQLConnect($conn);

            $result = mysqli_query($conn, "SELECT MAX(task_id) FROM tasks;");
            $array = mysqli_fetch_all($result);
            $maxID = (int)$array[0][0];
            return $maxID;
        } catch (PDOException $e) {
            echo("Query failed: " . $e);
        }
    }
}
