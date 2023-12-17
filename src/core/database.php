<?php
class database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $conn;
    private $stmt;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection Failed : " . $this->conn->connect_error);
        }


    }

    public function query($query)
    {

        $this->stmt = $this->conn->prepare($query);

    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        $result = $this->stmt->get_result();
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function rowCount()
    {

        return $this->stmt->affected_rows;
    }


}