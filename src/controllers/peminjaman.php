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
    public function peminjaman(){
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('peminjaman/peminjaman');
        $this->view('template/footer');
    }
    public function status($index=1){
      $data['jumlah']=$this->model('user_model')->get_user();
      $data['total'] =  $data['jumlah'][0];
      $data['index']=$index;
        $data['penyewa']=$this->model('penyewa')->get_request($index);
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('peminjaman/status',$data);
        $this->view('template/footer');
        
    }
    public function ruang(){
        $data['ruang']=$this->model('ruang_model')->get_kelas();
     
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('peminjaman/ruang',$data);
        $this->view('template/footer');
        
    }

    public function form(){
       
        $this->view('template/header');
        $this->view('template/navbar');
        $this->view('peminjaman/form',$_POST);
        $this->view('template/footer');
    }

    function tambahPenyewa(){
        $target_dir = "../public/upload/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
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
             
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
        $cek = $this->model('penyewa')->insert_penyewa($_POST);
        if($cek){
          header('Location: http://localhost/peminjamanRuang/public/peminjaman/send');
        }
    }

  
}


?>