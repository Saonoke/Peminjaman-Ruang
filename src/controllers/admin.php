<?php

class admin extends Controller
{
    function index($flash = false)
    {
        $data['flash'] = $flash;
        $this->view('template/header');
        $this->view('admin/login', $data);
        $this->view('template/footer');

    }



    function dashboard($index = 1)
    {

        $coba = $this->model('user_model');

        $data['jumlah'] = $coba->get_user();


        $data['total'] = $data['jumlah'][1];
        $data['index'] = $index;
        $data['penyewa'] = $this->model('penyewa')->get_penyewa($data['index']);




        $this->view('template/header');
        $this->view('template/sidebar');
        $this->view('admin/dashboard', $data);

        $this->view('template/footer');
    }

    function arsip($index = 1)
    {

        $data['jumlah'] = $this->model('user_model')->get_user_arsip();

        $data['total'] = $data['jumlah'];
        $data['index'] = $index;
        $data['penyewa'] = $this->model('history')->get_history($data['index']);


        $this->view('template/header');
        $this->view('template/sidebar');
        $this->view('admin/arsip', $data);

        $this->view('template/footer');
    }



    function login()
    {

        $cek = $this->model('login_model')->login($_POST);
        if ($cek) {
            session_start();
            $_SESSION['username'] = $_POST['username'];
            echo 'hello';
            header('Location: http://localhost/peminjamanRuang/public/admin/dashboard');
            exit();
        } else {
            $this->index(true);

        }
    }
    function logout()
    {
        session_start();
        session_destroy();
        header('Location: http://localhost/peminjamanRuang/public/admin/index');
        exit();

    }


    function acc($id = 0)
    {
        $data['id'] = $id;

        $cek = $this->model('penyewa')->acc_sewa($data);
        if ($cek) {
            header('Location: http://localhost/peminjamanRuang/public/admin/dashboard');
        }
    }

    function dec($id = 0)
    {
        $data['id'] = $id;

        $cek = $this->model('penyewa')->dec_sewa($data);
        if ($cek) {
            header('Location: http://localhost/peminjamanRuang/public/admin/dashboard');
        }
    }


    function request($index = 1)
    {
        $data['jumlah'] = $this->model('user_model')->get_user();
        $data['total'] = $data['jumlah'][0];
        $data['index'] = $index;
        $data['penyewa'] = $this->model('penyewa')->get_request($data['index']);

        $this->view('template/header');
        $this->view('template/sidebar');
        $this->view('admin/dashboard', $data);

        $this->view('template/footer');
    }

    function search($index = 1)
    {

        $data['penyewa'] = $this->model('penyewa')->get_user_search($index, $_POST);
        $data['jumlah'] = $this->model('user_model')->get_user($cek = false);

        $data['total'] = $data['jumlah'][2];
        $data['index'] = $index;
        $this->view('template/header');
        $this->view('template/sidebar');
        $this->view('admin/dashboard', $data);

        $this->view('template/footer');
    }

    function searcharch($index = 1)
    {

        $data['penyewa'] = $this->model('penyewa')->get_user_searcharch($index, $_POST);

        $data['jumlah'] = $this->model('user_model')->get_user_arsip();

        $data['total'] = $data['jumlah'];
        $data['index'] = $index;
        $this->view('template/header');
        $this->view('template/sidebar');
        $this->view('admin/arsip', $data);

        $this->view('template/footer');

    }

    function jadwal()
    {
        $data['ruang'] = $this->model('ruang_model')->get_ruang();
        $this->view('template/header');
        $this->view('template/sidebar');
        $this->view('admin/jadwal', $data);
        $this->view('template/footer');
    }

    function searchjadwal()
    {
        $data['ruang'] = $this->model('ruang_model')->get_ruang();
        $data['check'] = $this->model('penyewa')->cek_ruang($_POST);
        $data['post'] = $_POST;
        $this->view('template/header');
        $this->view('template/sidebar');
        $this->view('admin/jadwal', $data);
        $this->view('template/footer');

    }

    function coba()
    {
        $data['peminjaman'] = $this->model('coba')->get_peminjaman();
        echo var_dump($data['peminjaman']);
    }
}
