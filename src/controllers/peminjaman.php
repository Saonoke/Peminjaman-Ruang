<?php

class peminjaman extends Controller
{

  public function index()
  {
    $this->view('template/header');
    $this->view('template/navbar');
    $this->view('peminjaman/index');
    $this->view('template/footer');
  }

  public function send()
  {
    $this->view('template/header');
    $this->view('peminjaman/thanks');
    $this->view('template/footer');
  }
  public function peminjaman()
  {
    $this->view('template/header');
    $this->view('template/navbar');
    $this->view('peminjaman/peminjaman');
    $this->view('template/footer');
  }
  public function status($index = 1)
  {
    $data['jumlah'] = $this->model('user_model')->get_user();
    $data['total'] = $data['jumlah'][0];
    $data['index'] = $index;
    $data['penyewa'] = $this->model('penyewa')->get_status($index);
    $this->view('template/header');
    $this->view('template/navbar');
    $this->view('peminjaman/status', $data);
    $this->view('template/footer');

  }

  public function print()
  {
    $this->view('peminjaman/form_izin');
  }
  public function ruang($coba = '0')
  {
    $data['checking'] = $coba;
    $data['ruang'] = $this->model('ruang_model')->get_ruang();


    $this->view('template/header');
    $this->view('template/navbar');
    $this->view('peminjaman/ruang', $data);
    $this->view('template/footer');

  }

  public function form($data)
  {

    $this->view('template/header');
    $this->view('template/navbar');
    $this->view('peminjaman/form', $data);
    $this->view('template/footer');
  }

  public function cek()
  {
    $cek = $this->model('ruang_model')->cek_jadwal($_POST);
    if ($cek[0]['jumlah'] == 0) {
      $this->form($_POST);
    } else {
      header('Location: http://localhost/peminjamanRuang/public/peminjaman/ruang/error');
    }
    ;
  }

  function tambahPenyewa()
  {
    $cek = $this->model('penyewa')->insert_penyewa($_POST, $_FILES);

    $target_dir = "../public/upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $filename = $_FILES["fileToUpload"]["name"];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $query = "update peminjaman set upload='" . $filename . "' where no_identitas='" . $_POST['nim'] . "'";

      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    if ($cek) {
      header('Location: http://localhost/peminjamanRuang/public/peminjaman/send');
    }
  }

  function search($index = 1)
  {

    $data['penyewa'] = $this->model('penyewa')->get_user_search($index, $_POST);
    $data['jumlah'] = $this->model('user_model')->get_user($cek = false);

    $data['total'] = $data['jumlah'][2];
    $data['index'] = $index;
    $this->view('template/header');
    $this->view('template/navbar');
    $this->view('peminjaman/status', $data);
    $this->view('template/footer');
  }


}


?>