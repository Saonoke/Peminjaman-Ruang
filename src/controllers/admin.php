<?php

class admin extends Controller
{
    function index()
    {
        $this->view('template/header');
        $this->view('admin/login');
        $this->view('template/footer');
        
    }
    
    function dashboard()
    {
        $data['jumlah']=$this->model('user_model')->get_user();
        $data['penyewa']=$this->model('penyewa')->get_penyewa();
        
        $this->view('template/header');
        $this->view('admin/dashboard',$data);
       
        $this->view('template/footer');
    }

    function login(){
      
        $cek= $this->model('login_model')->login($_POST);
        if($cek){
            session_start();
            $_SESSION['username']=$_POST['username'];
            echo 'hello';
            header('Location: http://localhost/peminjamanRuang/public/admin/dashboard');
        }else{
            header ('Location: http://localhost/peminjamanRuang/public/admin/index');
        }
    }
}
