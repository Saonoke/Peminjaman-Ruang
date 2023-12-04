<?php
class ruang_model{
    public function get_kelas(){
        include ('auth.php');
        $sql= "select * from ruang";
        $result= $conn->query($sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
}