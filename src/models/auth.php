<?php

$conn = new mysqli("localhost","root","","peminjaman");

if($conn -> connect_error){
    die("Connection Failed : ". $conn->connect_error);
}


