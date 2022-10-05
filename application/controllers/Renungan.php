<?php

class Renungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model("ModelRenungan");
    }

    public function index()
    {
        $dataRenungan = $this->ModelRenungan->getAll();
        $data = array(
            "renungans" => $dataRenungan
        );

        $data['title'] = 'Data Renungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('renungan/v_list_renungan', $data);
        $this->load->view('template/footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah()
    {
        $data['title'] = 'Form Tambah Renungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('renungan/v_add_renungan', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $config['upload_path']          = './gambar/renungan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Dikirim";
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $judul_renungan = $this->input->post('judul_renungan');
            $isi_renungan = $this->input->post('isi_renungan');
            $tanggal_renungan = $this->input->post('tanggal_renungan');

            $data = array(
                "judul_renungan" => $judul_renungan,
                "isi_renungan" => $isi_renungan,
                "tanggal_renungan" => $tanggal_renungan,
                "gambar_renungan" => $gambar
            );
            $id = $this->ModelRenungan->insertGetId($data);
            redirect('renungan');
        }
    }

    public function ubah($id)
    {
        $renungan = $this->ModelRenungan->getByPrimaryKey($id);
        $data = array(
            "renungan" => $renungan,
        );
        $data['title'] = 'Form Ubah Renungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('renungan/v_update_renungan', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $config['upload_path']          = './gambar/renungan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Dikirim";
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $judul_renungan = $this->input->post('judul_renungan');
            $isi_renungan = $this->input->post('isi_renungan');
            $tanggal_renungan = $this->input->post('tanggal_renungan');
            $id = $this->input->post('id_renungan');
            $data = array(
                "judul_renungan" => $judul_renungan,
                "isi_renungan" => $isi_renungan,
                "tanggal_renungan" => $tanggal_renungan,
                "gambar_renungan" => $gambar
            );
            $id = $this->ModelRenungan->update($id, $data);
            redirect('renungan');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id_renungan');
        $this->ModelRenungan->delete($id);
        redirect('renungan');
    }
}
