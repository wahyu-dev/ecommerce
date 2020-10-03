<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('home');
        }
        $this->load->model('Mkonsumen');
        $this->load->model('Mprovinsi');
        $this->load->model('Mkota');
        $this->load->model('Minvoice');
    }

    public function index()
    {

        // if ($this->session->userdata('username')) {
        //     redirect('admin');
        // }

        if (!$this->session->userdata('email')) {
            redirect('home');
        }
        $data['title'] = 'Halaman Konsumen';
        $data['barang'] = $this->Sepatu_model->getAll();
        if ($this->input->post('keyword')) {
            $data['barang'] = $this->Sepatu_model->cariDataSepatu();
        }
        $data['kategori'] = $this->Sepatu_model->vkategori();
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('element/header', $data);
        $this->load->view('element/topbar-konsumen', $data);
        $this->load->view('konsumen/index', $data);
        $this->load->view('element/footer-user');
    }

    public function tambah_ke_keranjang($id)
    {
        $barang = $this->Sepatu_model->find($id);

        $data = array(
            'id'      => $barang->kd_brg,
            'qty'     => 1,
            'price'   => $barang->harga * $barang->diskon / 100,
            'name'    => $barang->nama_barang,
        );
        $this->cart->insert($data);
        redirect('konsumen');
    }

    public function detail_keranjang()
    {
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Detail keranjang';
        $this->load->view('element/header', $data);
        $this->load->view('element/topbar-konsumen');
        $this->load->view('konsumen/keranjang');
        $this->load->view('element/footer-user');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('konsumen');
    }

    public function pembayaran()
    {
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pembayaran';
        $data['kd_trans'] = $this->Mkonsumen->kode_transaksi();
        $data['provinsi'] = $this->Mprovinsi->view();
        $this->load->view('element/header', $data);
        $this->load->view('element/topbar-konsumen');
        $this->load->view('konsumen/pembayaran', $data);
        $this->load->view('element/footer-user');
    }

    public function proses_pesanan()
    {
        $is_processed = $this->Minvoice->index();
        $email = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        if ($is_processed) {
            $this->cart->destroy();

            //siapkan token
            $token = base64_encode(random_bytes(32));

            $user_token = [
                'email' => $email['email'],
                'token' => $token,
                'date_created' => time()
            ];
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'konfirmasi pesanan');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pemesanan berhasil, silahkan cek email anda untuk konfirmasi pesanan!</div>');
            redirect('konsumen');
        } else {
            echo "Maaf, pesanan anda gagal diproses";
        }
    }

    private function _sendEmail($token, $type)
    {
        $email = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'wahyupratama181002@gmail.com',    // Ganti dengan email gmail kamu
            'smtp_pass' => '18102002',      // Password gmail kamu
            'smtp_port' => 465,
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('wahyupratama181002@gmail.com', 'Toko Sepatu');
        $this->email->to($email['email']);

        if ($type == 'konfirmasi pesanan') {
            $this->email->subject('konfirmasi pesanan');
            $this->email->message('<p>Klik link berikut untuk konfirmasi pesanan :  
                                        <a href="' . base_url() . 'konsumen/konfirmasi_pesanan?email=' . $email['email'] . '&token=' . urlencode($token) . '" class="btn btn-primary btn-sm">Konfirmasi pesanan</a>
                                </p>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function konfirmasi_pesanan()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $nama = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();

        $konsumen = $this->db->get_where('konsumen', ['email' => $email])->row_array();

        if ($konsumen) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            $where = [
                'nama' => $nama['nama_depan'],
                'status' => '<p class="btn btn-warning btn-sm">Sedang Diproses</p>'
            ];
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('status', '<p class="btn btn-primary btn-sm">Sedang dalam pengiriman</p>');
                    $this->db->where($where);
                    $this->db->update('tb_invoice');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Pesanan akan sampai 3-6 hari, pesanan belum termasuk ongkir!. silahkan sediakan uang anda !</div>');
                    redirect('konsumen');
                } else {
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pemesanan anda gagal! waktu pembayaran anda lebih dari 1 hari.</div>');
                    redirect('konsumen');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pemesanan anda gagal! silahkan coba lagi</div>');
                redirect('konsumen');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pemesanan anda gagal! email anda tidak terdeteksi </div>');
            redirect('konsumen');
        }
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'detail barang';
        $data['det_barang'] = $this->Mjoin->get_by_kd($id);
        $this->load->view('element/header', $data);
        $this->load->view('element/topbar-konsumen');
        $this->load->view('konsumen/detail', $data);
        $this->load->view('element/footer-user');
    }

    public function pesanan($nama)
    {
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pesanan';
        $data['pesanan'] = $this->Mjoin->tampilPesananByNama($nama);
        $this->load->view('element/header', $data);
        $this->load->view('element/topbar-konsumen', $data);
        $this->load->view('konsumen/pesanan', $data);
        $this->load->view('element/footer-user');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $kd_konsumen = $data['user']['kd_konsumen'];
        $data['title'] = 'Profile';
        $data['profile'] = $this->Mkonsumen->get_profile($kd_konsumen);
        $this->load->view('element/header', $data);
        $this->load->view('element/topbar-konsumen', $data);
        $this->load->view('konsumen/profile', $data);
        $this->load->view('element/footer-user');
    }

    public function edit_profile()
    {
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $upload_image = $_FILES['foto']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '3048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $old_image = $data['user']['foto'];
                if ($old_image != 'default.png') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->Mkonsumen->ubah_profile();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profile berhasil diubah!</div>');
        redirect('konsumen/profile');
    }

    public function delete_pesanan($nama)
    {
        $this->db->delete('tb_invoice', array('nama' => $nama));
        redirect('konsumen');
    }
}
