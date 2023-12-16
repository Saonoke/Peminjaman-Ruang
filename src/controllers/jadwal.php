<?php


class jadwal extends Controller
{

    public function index()
    {
        $data['ruang'] = $this->model('ruang_model')->get_ruang();
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('jadwal/index', $data);
        $this->view('template/footer');

    }
    public function search()
    {
        $data['ruang'] = $this->model('ruang_model')->get_ruang();
        $data['check'] = $this->model('penyewa')->cek_ruang($_POST);
        $data['post'] = $_POST;
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('jadwal/index', $data);
        $this->view('template/footer');



    }


}