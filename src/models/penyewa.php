<?php
class penyewa{
    public function get_penyewa(){
        include ('auth.php');
        $sql = "select pm.id_peminjaman as id,pe.nama_peminjaman as nama,(select k.kategori from kategori_penyewa k where k.id=pe.kategori) as kategori,pm.deskripsi_pinjam as deskripsi,r.nama_ruangan as ruangan,pm.tanggal_pinjam as tanggal,pm.is_acc as status
        from peminjaman pm
        join peminjam pe on pe.no_identitas=pm.no_identitas
        join ruang r on r.kode_ruang=pm.kode_ruang limit 0,5;";
        $result = $conn->query($sql);
        
        
        
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function insert_penyewa(){
        include ('auth.php');
        $sql = "insert into peminjam values ('".$_POST['nim']."','".$_POST['nama']."','".$_POST['nohp']."','".$_POST['email']."','".$_POST['jabatan']."');";
        $sql2 = "insert into pembayaran values ('','transfer','".$_POST['nominal']."','".$_POST['nim']."');";
        $sql3 = "select id_pembayaran from pembayaran where no_peminjam = '".$_POST['nim']."'";

        
   
        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
          
        $result=$conn->query( $sql3 );
        $row=$result->fetch_assoc();
        
          $sql1 = "insert into peminjaman values ('','".$_POST['nim']."','".$_POST['ruangan']."','adm2',CURDATE(),'".$_POST['tanggal']."','".$_POST['mulai']."' ,'".$_POST['akhir']."','".$_POST['deskripsi']."','0','".$row['id_pembayaran']."');";
      
          if($conn->query($sql1) === TRUE){
            return true;
           
          }
            
          } else {
            return false;
          }



       
    }
    

    public function cek_ruang(){  
      include ('auth.php');
      $sql= "SELECT r.nama_ruangan as ruang, p.tanggal_pinjam as tanggal ,p.jam_awal as mulai ,p.jam_akhir as akhir from peminjaman p inner join ruang r on r.kode_ruang = p.kode_ruang where p.jam_awal >= '".$_POST['time_start']."' and p.jam_akhir <= '".$_POST['time_end']."' and p.tanggal_pinjam ='".$_POST['tanggal']."' and p.kode_ruang ='".$_POST['ruang']."';";
      if ($result=$conn->query($sql)) {
          return mysqli_fetch_all($result,MYSQLI_ASSOC);
      
      }
   
    }

  

    public function acc_sewa($tes=[]){
      include ('auth.php');
      $sql = "update peminjaman set is_acc=1 where id_peminjaman = '".$tes['id']."';";
      if($conn->query($sql) === TRUE){
        return true;
      } else{
        return false;
      }
    }

  

}

