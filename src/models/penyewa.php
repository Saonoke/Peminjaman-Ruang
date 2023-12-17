<?php
class penyewa
{

  private $db;

  public function __construct()
  {
    $this->db = new database;
  }
  public function get_penyewa($index = 0)
  {


    if ($index > 1) {
      $page = $index;
    } else {
      $page = 1;
    }

    $start_from = ($page - 1) * 20;

    $sql = "select pm.id_peminjaman as id,pm.no_identitas as identitas,pe.nama_peminjaman as nama,(select k.kategori from kategori_penyewa k where k.id=pe.kategori) as kategori,pm.deskripsi_pinjam as deskripsi,r.nama_ruangan as ruangan,pm.tanggal_pinjam as tanggal,pm.jam_awal as jam_mulai,pm.jam_akhir as jam_akhir,pm.is_acc as status,pm.upload as upload,pe.no_telp as nomer,is_decline as decline
        from peminjaman pm
        join peminjam pe on pe.no_identitas=pm.no_identitas
        join ruang r on r.kode_ruang=pm.kode_ruang where is_arsip='0' limit " . $start_from . ",20;";
    $this->db->query($sql);


    return $this->db->resultSet();
  }




  public function insert_penyewa()
  {

    $query = "select no_identitas from peminjam where no_identitas = '" . $_POST['nim'] . "'";
    if ($_POST['jabatan'] == '3') {
      $sql2 = "insert into pembayaran values ('','transfer','" . $_POST['nominal'] . "','" . $_POST['nim'] . "');";
    } else {
      $sql2 = "insert into pembayaran values ('','gratis','0','" . $_POST['nim'] . "');";
    }
    $sql3 = "select id_pembayaran from pembayaran where no_peminjam = '" . $_POST['nim'] . "'";
    $this->db->query($query);
    $row = $this->db->resultSet();

    if (!is_null($row)) {
      $sql = "update peminjam  set nama_peminjaman='" . $_POST['nama'] . "',no_telp='" . $_POST['nohp'] . "',email='" . $_POST['email'] . "',kategori='" . $_POST['jabatan'] . "' where no_identitas='" . $_POST['nim'] . "';";
      $this->db->query($sql);
      $this->db->execute();
    } else {

      $sql = "insert into peminjam values ('" . $_POST['nim'] . "','" . $_POST['nama'] . "','" . $_POST['nohp'] . "','" . $_POST['email'] . "','" . $_POST['jabatan'] . "');";
      $this->db->query($sql);
      $this->db->execute();

    }



    $this->db->query($sql2);
    $this->db->execute();
    echo $this->db->rowCount();
    if ($this->db->rowCount() > 0) {


      $this->db->query($sql3);
      $row = $this->db->resultSet();


      $sql1 = "insert into peminjaman values ('','" . $_POST['nim'] . "','" . $_POST['ruangan'] . "','adm2',CURDATE(),'" . $_POST['tanggal'] . "','" . $_POST['mulai'] . "' ,'" . $_POST['akhir'] . "','" . $_POST['deskripsi'] . "','0','" . $row[0]['id_pembayaran'] . "','0','" . $_FILES["fileToUpload"]["name"] . "','0');";
      $this->db->query($sql1);
      $this->db->execute();

      if ($this->db->rowCount() > 0) {
        echo 'tes';
        return true;

      }

    } else {
      return false;
    }




  }


  public function cek_ruang()
  {

    $sql = "SELECT r.nama_ruangan as ruang, p.tanggal_pinjam as tanggal ,p.jam_awal as mulai ,p.jam_akhir as akhir from peminjaman p inner join ruang r on r.kode_ruang = p.kode_ruang where p.jam_awal >= '" . $_POST['time_start'] . "' and p.jam_akhir <= '" . $_POST['time_end'] . "' and p.tanggal_pinjam ='" . $_POST['tanggal'] . "' and p.kode_ruang ='" . $_POST['ruang'] . "';";
    $this->db->query($sql);
    return $this->db->resultSet();

  }



  public function acc_sewa($tes = [])
  {

    $sql = "update peminjaman set is_acc=1 where id_peminjaman = '" . $tes['id'] . "';";
    $this->db->query($sql);
    $this->db->execute();

    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function dec_sewa($tes = [])
  {

    $sql = "update peminjaman set is_decline=1 where id_peminjaman = '" . $tes['id'] . "';";
    $this->db->query($sql);
    $this->db->execute();
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }


  public function get_request($index = 1)
  {

    if ($index > 1) {
      $page = $index;
    } else {
      $page = 1;
    }

    $start_from = ($page - 1) * 20;

    $sql = "select  pm.id_peminjaman as id,pm.no_identitas as identitas,pe.nama_peminjaman as nama,(select k.kategori from kategori_penyewa k where k.id=pe.kategori) as kategori,pm.deskripsi_pinjam as deskripsi,r.nama_ruangan as ruangan,pm.tanggal_pinjam as tanggal,pm.jam_awal as jam_mulai,pm.jam_akhir as jam_akhir,pm.is_acc as status,pm.upload as upload,pe.no_telp as nomer,is_decline as decline
        from peminjaman pm
        join peminjam pe on pe.no_identitas=pm.no_identitas
        join ruang r on r.kode_ruang=pm.kode_ruang where pm.is_acc='0' and pm.is_decline='0'  limit " . $start_from . ",20;";

    $this->db->query($sql);


    return $this->db->resultSet();
  }
  public function get_status($index = 1)
  {

    if ($index > 1) {
      $page = $index;
    } else {
      $page = 1;
    }

    $start_from = ($page - 1) * 20;

    $sql = "select  pm.id_peminjaman as id,pm.no_identitas as identitas,pe.nama_peminjaman as nama,(select k.kategori from kategori_penyewa k where k.id=pe.kategori) as kategori,pm.deskripsi_pinjam as deskripsi,r.nama_ruangan as ruangan,pm.tanggal_pinjam as tanggal,pm.jam_awal as jam_mulai,pm.jam_akhir as jam_akhir,pm.is_acc as status,pm.upload as upload,pe.no_telp as nomer,is_decline as decline
        from peminjaman pm
        join peminjam pe on pe.no_identitas=pm.no_identitas
        join ruang r on r.kode_ruang=pm.kode_ruang where pe.nama_peminjaman!= 'diah' limit " . $start_from . ",20;";

    $this->db->query($sql);


    return $this->db->resultSet();
  }



  public function get_user_search($index = 1)
  {

    if ($index > 1) {
      $page = $index;
    } else {
      $page = 1;
    }

    $start_from = ($page - 1) * 20;

    $sql = "select pm.id_peminjaman as id,pm.no_identitas as identitas,pe.nama_peminjaman as nama,(select k.kategori from kategori_penyewa k where k.id=pe.kategori) as kategori,pm.deskripsi_pinjam as deskripsi,r.nama_ruangan as ruangan,pm.tanggal_pinjam as tanggal,pm.jam_awal as jam_mulai,pm.jam_akhir as jam_akhir,pm.is_acc as status,pm.upload as upload,pe.no_telp as nomer,is_decline as decline
        from peminjaman pm
        join peminjam pe on pe.no_identitas=pm.no_identitas
        join ruang r on r.kode_ruang=pm.kode_ruang where pe.nama_peminjaman like '" . $_POST['nama'] . "%' limit " . $start_from . ",20;";
    $this->db->query($sql);


    return $this->db->resultSet();
  }

  public function get_user_searcharch($index = 1)
  {

    if ($index > 1) {
      $page = $index;
    } else {
      $page = 1;
    }

    $start_from = ($page - 1) * 20;

    $sql = "select pm.id_peminjaman as id,pm.no_identitas as identitas,pe.nama_peminjaman as nama,(select k.kategori from kategori_penyewa k where k.id=pe.kategori) as kategori,pm.deskripsi_pinjam as deskripsi,r.nama_ruangan as ruangan,pm.tanggal_pinjam as tanggal,pm.jam_awal as jam_mulai,pm.jam_akhir as jam_akhir,pm.is_acc as status,pm.upload as upload,pe.no_telp as nomer,is_decline as decline
        from peminjaman pm
        join peminjam pe on pe.no_identitas=pm.no_identitas
        join ruang r on r.kode_ruang=pm.kode_ruang where pe.nama_peminjaman like '" . $_POST['nama'] . "%' AND pm.is_arsip='1' limit " . $start_from . ",20;";
    $this->db->query($sql);


    return $this->db->resultSet();
  }





}

