<?php

class user_model
{

    public function get_user($coba = true)
    {

        include('auth.php');
        $sql = "select count(id_peminjaman) as jumlah from peminjaman where is_acc='0'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total[0] = $row;
        $sql = "select count(id_peminjaman) as jumlah from peminjaman where is_acc='1' and is_arsip='0'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total[1] = $row;

        if (!$coba) {
            $sql = "select count(pm.id_peminjaman) as jumlah
            from peminjaman pm
            join peminjam pe on pe.no_identitas=pm.no_identitas
            join ruang r on r.kode_ruang=pm.kode_ruang where pe.nama_peminjaman like '" . $_POST['nama'] . "%'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total[2] = $row;
        }
        return $total;

    }

    public function get_user_arsip()
    {

        include('auth.php');
        $sql = "select count(pm.id_peminjaman) as jumlah
        from peminjaman pm
        join peminjam pe on pe.no_identitas=pm.no_identitas
        join ruang r on r.kode_ruang=pm.kode_ruang where is_arsip = '1'";
        $result = $conn->query($sql);
        return $row = $result->fetch_assoc();
    }






}