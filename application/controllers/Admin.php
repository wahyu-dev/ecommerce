<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();



        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }

    public function index()
    {

        // if ($this->session->userdata('email')) {
        //     redirect('konsumen');
        // }

        $data['title'] = 'Halaman admin';
        $data['user'] = $this->db->get_where('administrator', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->Sepatu_model->getAll();
        if ($this->input->post('keyword')) {
            $data['barang'] = $this->Sepatu_model->cariDataSepatu();
        }
        $data['kode'] = $this->Sepatu_model->kode_barang();
        $data['kategori'] = $this->Sepatu_model->vkategori();
        $this->load->view('element/header', $data);
        $this->load->view('element/sidebar-admin', $data);
        $this->load->view('element/topbar-admin');
        $this->load->view('admin/index', $data);
        $this->load->view('element/footer');
    }

    public function kategori($kd_kategori)
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db->get_where('administrator', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->Sepatu_model->vkategori();
        $data['vkategori'] = $this->Mjoin->kategoriByKd($kd_kategori);
        $this->load->view('element/header', $data);
        $this->load->view('element/sidebar-admin', $data);
        $this->load->view('element/topbar-admin');
        $this->load->view('admin/kategori', $data);
        $this->load->view('element/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Tambah';
        $data['user'] = $this->db->get_where('administrator', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->Sepatu_model->vkategori();

        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('element/header', $data);
            $this->load->view('element/sidebar-admin', $data);
            $this->load->view('element/topbar-admin');
            $this->load->view('admin/index', $data);
            $this->load->view('element/footer');
        } else {

            $foto  = $_FILES['foto']['name'];

            if ($foto = '') { } else {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo 'Gambar gagal di upload';
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $this->Sepatu_model->tambahData($foto);
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('admin');
        }
    }

    public function hapus($id)
    {
        $this->Sepatu_model->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin');
    }

    public function ubah($id)
    {
        $data['user'] = $this->db->get_where('administrator', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->Sepatu_model->vkategori();
        $data['title'] = 'form edit';
        $data['ebarang'] = $this->Sepatu_model->getBarangById($id);

        $this->form_validation->set_rules('kd_brg', 'Kode barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('element/header', $data);
            $this->load->view('element/sidebar-admin', $data);
            $this->load->view('element/topbar-admin');
            $this->load->view('admin/edit', $data);
            $this->load->view('element/footer');
        } else {

            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '3048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['ebarang']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Sepatu_model->ubahData();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin');
        }
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('administrator', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->Sepatu_model->vkategori();
        $data['title'] = 'detail barang';
        $data['det_barang'] = $this->Mjoin->get_by_kd($id);
        $this->load->view('element/header', $data);
        $this->load->view('element/topbar-admin');
        $this->load->view('admin/detail', $data);
        $this->load->view('element/footer');
    }

    public function konfirmasi_pembayaran($id)
    {
        $this->db->set('status', '<p class="btn btn-success btn-sm">Pesanan telah diterima</p>');
        $this->db->where('id', $id);
        $this->db->update('tb_invoice');

        redirect('invoice');
    }
}
