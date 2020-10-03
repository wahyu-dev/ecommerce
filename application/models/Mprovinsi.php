<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mprovinsi extends CI_Model
{
    public function view()
    {
        return $this->db->get('provinsi')->result(); // Tampilkan semua data yang
    }
}
