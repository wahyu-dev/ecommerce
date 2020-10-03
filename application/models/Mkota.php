<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mkota extends CI_Model
{
    public function viewByProvinsi($kd_prov)
    {

        $this->db->where('kd_prov', $kd_prov);
        $result = $this->db->get('kota')->result(); // Tampilkan semua data kota berdasarkan kd_provinsi
        return $result;
    }
}
