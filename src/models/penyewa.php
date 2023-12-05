<?php
class penyewa{
    public function get_penyewa(){
        include ('auth.php');
        $sql = "select pm.id_peminjaman as id,pe.nama_peminjaman as nama,(select k.kategori from kategori_penyewa k where k.id=pe.kategori) as kategori,pm.deskripsi_pinjam as deskripsi,r.nama_ruangan as ruangan,pm.tanggal_pinjam as tanggal,pm.is_acc as status
        from peminjaman pm
        join peminjam pe on pe.no_identitas=pm.no_identitas
        join ruang r on r.kode_ruang=pm.kode_ruang;";
        $result = $conn->query($sql);
        
        
        
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function insert_penyewa(){
        include ('auth.php');
        $sql = "insert into peminjam values ('".$_POST['nim']."','".$_POST['nama']."','".$_POST['nohp']."','".$_POST['email']."','".$_POST['jabatan']."');";
        $sql1 = "insert into peminjaman values ('P02','".$_POST['nim']."','".$_POST['ruangan']."','adm2','P001',CURDATE(),CURDATE(),'".$_POST['deskripsi']."','0');";
        if ($conn->query($sql) === TRUE) {
      
          if($conn->query($sql1) === TRUE){

            return true;
          }
            
          } else {
            return false;
          }
    }

}