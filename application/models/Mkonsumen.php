<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkonsumen extends CI_Model
{
    public function kode_konsumen()
    {
        $this->db->select('RIGHT(konsumen.kd_konsumen,2) as kd_konsumen', FALSE);
        $this->db->order_by('kd_konsumen', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('konsumen');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_konsumen) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kodetampil = "KS" . $batas; // format kodenya
        return $kodetampil;
    }

    public function kode_transaksi()
    {
        $this->db->select('RIGHT(transaksi.kd_trans,2) as kd_trans', FALSE);
        $this->db->order_by('kd_trans', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_trans) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kodetampil = "TR" . $batas; // format kodenya
        return $kodetampil;
    }

    public function tambahKonsumen()
    {
        $email = $this->input->post('email', true);
        $data = [
            'kd_konsumen' => htmlspecialchars($this->input->post('kd_konsumen', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
            'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', true)),
            'kd_prov' => htmlspecialchars($this->input->post('kd_prov', true)),
            'kd_kota' => htmlspecialchars($this->input->post('kd_kota', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'kd_pos' => htmlspecialchars($this->input->post('kd_pos', true)),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
        ];

        $this->db->insert('konsumen', $data);
    }

    public function get_profile($kd_konsumen)
    {
        return $this->db->get_where('konsumen', ['kd_konsumen' => $kd_konsumen])->row_array();
    }

    public function ubah_profile()
    {
        $data = [
            "nama_depan" => $this->input->post('nama_depan'),
            "nama_belakang" => $this->input->post('nama_belakang'),
            "alamat" => $this->input->post('alamat'),
            "kd_pos" => $this->input->post('kd_pos'),
            "telp" => $this->input->post('telp')
        ];

        $this->db->where('kd_konsumen', $this->input->post('kd_konsumen'));
        $this->db->update('konsumen', $data);
    }
}
