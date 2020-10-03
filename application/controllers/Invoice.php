<?php
class Invoice extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect('home');
        }

        $data['title'] = 'Halaman Invoice';
        $data['invoice'] = $this->Minvoice->tampil_data();
        $data['kategori'] = $this->Sepatu_model->vkategori();
        $data['user'] = $this->db->get_where('administrator', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('element/header', $data);
        $this->load->view('element/sidebar-admin');
        $this->load->view('element/topbar-admin', $data);
        $this->load->view('admin/invoice', $data);
        $this->load->view('element/footer');
    }

    public function detail($id_invoice)
    {
        $data['title'] = 'Halaman detail pesanan';
        $data['user'] = $this->db->get_where('administrator', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->Sepatu_model->vkategori();
        $data['invoice'] = $this->Minvoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->Minvoice->ambil_id_pesanan($id_invoice);
        $this->load->view('element/header', $data);
        $this->load->view('element/sidebar-admin');
        $this->load->view('element/topbar-admin');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('element/footer');
    }
}
