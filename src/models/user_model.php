<?php

class user_model
{

    private $db;


    public function __construct()
    {
        $this->db = new database;
    }

    public function get_user($coba = true)
    {



        $sql = "select count(id_peminjaman) as jumlah from peminjaman where is_acc='0' and is_decline='0' ";
        $this->db->query($sql);
        $result = $this->db->resultSet();

        $total[0] = $result[0]['jumlah'];
        $sql = "select count(id_peminjaman) as jumlah from peminjaman where is_acc='1' and is_arsip='0'";
        $this->db->query($sql);
        $result = $this->db->resultSet();

        $total[1] = $result[0]['jumlah'];

        if (!$coba) {
            $sql = "select count(pm.id_peminjaman) as jumlah
            from peminjaman pm
            join peminjam pe on pe.no_identitas=pm.no_identitas
            join ruang r on r.kode_ruang=pm.kode_ruang where pe.nama_peminjaman like '" . $_POST['nama'] . "%'";
            $this->db->query($sql);
            $result = $this->db->resultSet();

            $total[2] = $result[0]['jumlah'];
        }
        return $total;

    }

    public function get_user_arsip()
    {


        $sql = "select count(pm.id_peminjaman) as jumlah
        from peminjaman pm
        join peminjam pe on pe.no_identitas=pm.no_identitas
        join ruang r on r.kode_ruang=pm.kode_ruang where is_arsip = '1' and is_decline=''";
        $this->db->query($sql);
        $result = $this->db->resultSet();

        return $result[0]['jumlah'];

    }






}