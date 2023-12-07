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
        echo $_POST['time_start'];
        $data['ruang']=$this->model('ruang_model')->get_kelas();
        $data['check' ]= $this->model('penyewa')->cek_ruang();
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('jadwal/index',$data);
        $this->view('template/footer');



    }


}