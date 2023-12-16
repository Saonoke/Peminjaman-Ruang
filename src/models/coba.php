<?php
class Coba
{

    private $db;
    public function __construct()
    {
        $this->db = new database;
    }
    public function get_peminjaman()
    {
        $this->db->query('select * from peminjaman');
        return $this->db->resultSet();
    }
}