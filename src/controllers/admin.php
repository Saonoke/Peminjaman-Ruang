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
        $this->view('template/header');
        $this->view('admin/dashboard');
        $this->view('template/footer');
    }
}
