<?php
class ruang_model
{

    private $db;


    public function __construct()
    {
        $this->db = new database;



    }

    public function get_ruang()
    {

        $sql = "select r.kode_ruang as kode_ruang ,r.nama_ruangan as nama_ruangan,r.kapasitas as kapasitas,r.tarif_ruang as tarif_ruang,
        r.lantai as lantai, r.gambar_ruang as gambar_ruang, f.nama_fasilitas as fasilitas from ruang r inner join fasilitas_ruang f on f.id_fasilitas = r.id_fasilitas";
        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function cek_jadwal()
    {
        $sql = "SELECT count(r.nama_ruangan) as jumlah from peminjaman p inner join ruang r on r.kode_ruang = p.kode_ruang where p.jam_awal >= '" . $_POST['mulai'] . "' and p.jam_akhir <= '" . $_POST['akhir'] . "' and p.tanggal_pinjam ='" . $_POST['tanggal'] . "' and p.kode_ruang ='" . $_POST['ruangan'] . "';";
        $this->db->query($sql);
        return $this->db->resultSet();

    }
}