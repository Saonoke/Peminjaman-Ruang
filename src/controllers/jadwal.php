<?php


class jadwal extends Controller
{

    public function index()
    {
        $data['ruang']=$this->model('ruang_model')->get_kelas();
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('jadwal/index',$data);
        $this->view('template/footer');

    }
    public function search(){
        echo $_POST['ruang'];
        echo $_POST['lantai'];
        echo $_POST['tanggal'];


    }
}