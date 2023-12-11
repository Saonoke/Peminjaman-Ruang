<?php
class ruang_model{
    public function get_kelas(){
        include ('auth.php');
        $sql= "select r.kode_ruang as kode_ruang ,r.nama_ruangan as nama_ruangan,r.kapasitas as kapasitas,r.tarif_ruang as tarif_ruang,
        r.lantai as lantai, r.gambar_ruang as gambar_ruang, f.nama_fasilitas as fasilitas from ruang r inner join fasilitas_ruang f on f.id_fasilitas = r.id_fasilitas";
        $result= $conn->query($sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
}