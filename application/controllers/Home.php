<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mprovinsi');
        $this->load->model('Mkota');
        $this->load->model('Mkonsumen');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('konsumen');
        }

        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $data['title'] = 'Home';
        $data['kd_ks'] = $this->Mkonsumen->kode_konsumen();
        $data['sepatu'] = $this->Sepatu_model->getAll();
        if ($this->input->post('keyword')) {
            $data['sepatu'] = $this->Sepatu_model->cariDataSepatu();
        }
        $data['provinsi'] = $this->Mprovinsi->view();
        // $data['kd_prov'] = $this->Sepatu_model->get_kd_prov();
        $this->load->view('element/header', $data);
        $this->load->view('element/topbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('element/footer-user');
    }


    public function listkota()
    {
        $kd_prov = $this->input->post('kd_prov'); // Ambil data ID pelanggan yang dikirim via ajax post
        $kota = $this->Mkota->viewByProvinsi($kd_prov);
        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>Pilih</option>";

        foreach ($kota as $data) {
            $lists .= "<option value='" . $data->kd_kota . "'>" . $data->nama_kota . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_kota' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_transaksi

        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function detail($id)
    {
        if ($this->session->userdata('email')) {
            redirect('konsumen');
        }

        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $data['title'] = 'detail barang';
        $data['det_barang'] = $this->Mjoin->get_by_kd($id);
        $this->load->view('element/header', $data);
        $this->load->view('element/topbar');
        $this->load->view('home/detail', $data);
        $this->load->view('element/footer-user');
    }

    public function login()
    {
        $email = htmlspecialchars(trim($this->input->post('email')));
        $password = htmlspecialchars(trim($this->input->post('password')));

        if ($email == 'admin' && $password == 'admin') {

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $admin = $this->db->get_where('administrator', ['username' => $email])->row_array();
            if ($admin) {
                // cek password 
                if ($password == $admin['password']) {
                    $data = [
                        'username' => $admin['username']
                    ];
                    // set session
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password !</div>');
                    redirect('home');
                }
            }
        } else {

            $konsumen = $this->db->get_where('konsumen', ['email' => $email])->row_array();
            // $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($konsumen) {
                // cek password
                if (password_verify($password, $konsumen['password'])) {
                    $data = [
                        'email' => $konsumen['email'],
                    ];
                    // set session
                    $this->session->set_userdata($data);
                    redirect('konsumen');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password !</div>');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email not registered !</div>');
                redirect('home');
            }
        }
    }

    public function daftar()
    {
        $data = [
            'kd_konsumen' => htmlspecialchars($this->input->post('kd_konsumen', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
            'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', true)),
            'kd_prov' => htmlspecialchars($this->input->post('kd_prov', true)),
            'kd_kota' => htmlspecialchars($this->input->post('kd_kota', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'kd_pos' => htmlspecialchars($this->input->post('kd_pos', true)),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'foto' => htmlspecialchars($this->input->post('foto', true)),
        ];

        // cek email apakah sudah terdaftar
        if ($this->db->get_where('konsumen', ['email' => $this->input->post('email')])->row_array()) {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda sudah terdaftar</div>');
            redirect('home');
        }

        // cek nama apakah sudah ada atau belum
        if ($this->db->get_where('konsumen', ['nama_depan' => $this->input->post('nama_depan')])->row_array()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama pengguna tidak tersedia</div>');
            redirect('home');
        }

        // insert ke database
        $this->db->insert('konsumen', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation ! your account has been created</div>');
        redirect('home');
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        redirect('home', 'refresh');
    }
}
