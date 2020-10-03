<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mjoin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_kd($id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('det_barang', 'det_barang.kd_brg = barang.kd_brg');
        $this->db->where('barang.kd_brg', $id); // kondisi
        return $this->db->get()->row_array();
    }

    public function kategoriByKd($kd_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join('barang', 'barang.kd_kategori = kategori.kd_kategori');
        $this->db->where('kategori.kd_kategori', $kd_kategori); // kondisi
        return $this->db->get()->result_array();
    }

    public function tampilPesananByNama($nama)
    {

        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_invoice', 'tb_invoice.id = tb_pesanan.id_invoice');
        $this->db->where('tb_invoice.nama', $nama);
        return $this->db->get()->result_array();
        // return $this->db->get_where('tb_invoice', ['nama' => $nama])->row_array();
    }
}
