<?php
class login_model{

    public function login($data){
        include ('auth.php');

        $sql = "select username,password from admin where username='".$data['username']."'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $password=md5($data['password']);
                if($password == $row['password']){
                    return true;
                }
                
                return false;
    }
}

