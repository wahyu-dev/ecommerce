<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Minvoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $kd_trans = $this->input->post('kd_trans');
        $tgl_trans = date('Y-m-d H:i:s');
        $kd_konsumen = $this->input->post('kd_konsumen');
        $kd_prov = $this->input->post('kd_prov');
        $kd_kota = $this->input->post('kd_kota');

        $transaksi = [
            'kd_trans' => $kd_trans,
            'tgl_trans' => $tgl_trans,
            'kd_konsumen' => $kd_konsumen,
            'kd_prov' => $kd_prov,
            'kd_kota' => $kd_kota,
        ];

        $this->db->insert('transaksi', $transaksi);

        $invoice = [
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
            'status' => '<p class="btn btn-warning btn-sm">Sedang Diproses</p>'
        ];

        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {

            // $detdata = [
            //     'kd_trans' => $kd_trans,
            //     'kd_brg' => $item['id'],
            //     'harga' => $item['price'],
            //     'jumlah' => $item['qty'],
            //     'diskon' => 0,
            //     'sub_total' => $item['qty'] * $item['price']
            // ];

            $data = [
                'id_invoice' => $id_invoice,
                'kd_brg' => $item['id'],
                'nama_barang' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price'],
                'sub_total' => $item['qty'] * $item['price']
            ];
            $this->db->insert('tb_pesanan', $data);
            // $this->db->insert('det_transaksi', $detdata);
        }

        return TRUE;
    }

    public function tampil_data()
    {
        $result = $this->db->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
