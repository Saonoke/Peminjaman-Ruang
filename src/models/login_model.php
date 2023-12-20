<?php
class login_model
{

    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function login($data)
    {


        $sql = "select username,password from admin where username='" . $data['username'] . "'";
        $this->db->query($sql);
        $result = $this->db->resultSet();

        if (!empty($result)) {
            $password = md5($data['password']);
            if ($password == $result[0]['password']) {
                return true;
            }

            return false;
        } else {
            return false;
        }

    }
}


