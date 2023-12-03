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
}
