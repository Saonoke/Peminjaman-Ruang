<?php


class jadwal extends Controller
{

    public function index()
    {
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('jadwal/index');
        $this->view('template/footer');

    }
}