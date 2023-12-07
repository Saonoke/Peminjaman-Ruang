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
            exit();
        }else{
            header ('Location: http://localhost/peminjamanRuang/public/admin/index');
        }
    }
    function logout(){
            session_start();
            session_destroy();
            header ('Location: http://localhost/peminjamanRuang/public/admin/index');
            exit();
        
    }


    function acc($id=0){
        $data['id']=$id;
        
        $cek= $this->model('penyewa')->acc_sewa($data);
        if($cek){
            header('Location: http://localhost/peminjamanRuang/public/admin/dashboard');
        }
    }
}
