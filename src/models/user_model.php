<?php

class user_model {
    
    public function get_user(){
        $total;
        include ('auth.php');
        $sql= "select count(id_peminjaman) as jumlah from peminjaman where is_acc='0'";
        $result= $conn->query($sql);
        $row = $result->fetch_assoc();
        $total[0]=$row;
        $sql= "select count(id_peminjaman) as jumlah from peminjaman where is_acc='1'";
        $result= $conn->query($sql);
        $row = $result->fetch_assoc();
        $total[1]=$row;
        return $total;
        
    }

   

}