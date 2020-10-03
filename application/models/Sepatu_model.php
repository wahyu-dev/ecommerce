<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sepatu_model extends CI_Model
{
    public function kode_barang()
    {
        $this->db->select('RIGHT(barang.kd_brg,2) as kd_brg', FALSE);
        $this->db->order_by('kd_brg', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_brg) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kodetampil = "BR" . $batas; // format kodenya
        return $kodetampil;
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.kd_kategori = barang.kd_kategori');
        $this->db->join('det_barang', 'det_barang.kd_brg = barang.kd_brg');
        return $this->db->get()->result_array();
    }

    public function tambahData($foto)
    {
        $kd_brg = $this->input->post('kd_brg', true);
        $data = [
            "kd_brg" => $kd_brg,
            "nama_barang" => $this->input->post('nama_barang', true),
            "bahan" => $this->input->post('bahan', true),
            "warna" => $this->input->post('warna', true),
            "harga" => $this->input->post('harga', true),
            "keyword" => $this->input->post('keyword', true),
            "kd_kategori" => $this->input->post('kd_kategori', true),
            "diskon" => $this->input->post('diskon', true),
            "foto" => $foto
        ];
        $this->db->insert('barang', $data);
        $datadet = [
            'kd_brg' => $kd_brg,
            'ukuran' => $this->input->post('ukuran', true),
            'berat' => $this->input->post('berat', true),
            'stok' => $this->input->post('stok', true)
        ];
        $this->db->insert('det_barang', $datadet);
    }

    public function hapusData($id)
    {
        $this->db->delete('barang', ['kd_brg' => $id]);
    }

    public function getBarangById($id)
    {
        $this->db->join('det_barang', 'det_barang.kd_brg=barang.kd_brg');
        return $this->db->get_where('barang', ['barang.kd_brg' => $id])->row_array();
    }

    public function ubahData()
    {
        $data = [
            "nama_barang" => $this->input->post('nama_barang', true),
            "bahan" => $this->input->post('bahan', true),
            "warna" => $this->input->post('warna', true),
            "harga" => $this->input->post('harga', true),
            "keyword" => $this->input->post('keyword', true),
            "kd_kategori" => $this->input->post('kd_kategori', true),
            "diskon" => $this->input->post('diskon', true)
        ];

        $this->db->where('kd_brg', $this->input->post('kd_brg'));
        $this->db->update('barang', $data);

        $data2 = [
            "ukuran" => $this->input->post('ukuran', true),
            "berat" => $this->input->post('berat', true),
            "stok" => $this->input->post('stok', true),
        ];
        $this->db->where('kd_brg', $this->input->post('kd_brg'));
        $this->db->update('det_barang', $data2);
    }

    public function find($id)
    {
        $result =  $this->db->where('kd_brg', $id)
            ->limit(1)
            ->get('barang');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function vkategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function cariDataSepatu()
    {

        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('keyword', $keyword);
        $this->db->or_like('nama_kategori', $keyword);

        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.kd_kategori = barang.kd_kategori');
        return $this->db->get()->result_array();
    }
}
