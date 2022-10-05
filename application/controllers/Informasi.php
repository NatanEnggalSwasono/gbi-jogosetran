<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model("ModelInformasi");
    }

    public function index()
    {
        $dataInformasi = $this->ModelInformasi->getAll();
        $data = array(
            "informasis" => $dataInformasi
        );

        $data['title'] = 'Data Informasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('informasi/v_list_informasi', $data);
        $this->load->view('template/footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah()
    {
        $data['title'] = 'Form Add Informasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('informasi/v_add_informasi', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'pdf';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Dikirim";
        } else {
            $file = $this->upload->data();
            $file = $file['file_name'];
            $judul_informasi = $this->input->post('judul_informasi');
            $isi_informasi = $this->input->post('isi_informasi');
            $tanggal_informasi = $this->input->post('tanggal_informasi');

            $data = array(
                "judul_informasi" => $judul_informasi,
                "isi_informasi" => $isi_informasi,
                "tanggal_informasi" => $tanggal_informasi,
                'file' => $file

            );
            $id = $this->ModelInformasi->insertGetId($data);
            redirect('informasi');
        }
    }

    public function ubah($id)
    {
        $informasi = $this->ModelInformasi->getByPrimaryKey($id);
        $data = array(
            "informasi" => $informasi,
        );
        $data['title'] = 'Form Update Informasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('informasi/v_update_informasi', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'pdf';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Dikirim";
        } else {
            $file = $this->upload->data();
            $file = $file['file_name'];
            $judul_informasi = $this->input->post('judul_informasi');
            $isi_informasi = $this->input->post('isi_informasi');
            $tanggal_informasi = $this->input->post('tanggal_informasi');
            $id = $this->input->post('id_informasi');
            $data = array(
                "judul_informasi" => $judul_informasi,
                "isi_informasi" => $isi_informasi,
                "tanggal_informasi" => $tanggal_informasi,
                "file" => $file
            );
            $id = $this->ModelInformasi->update($id, $data);
            redirect('informasi');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id_informasi');
        $this->ModelInformasi->delete($id);
        redirect('informasi');
    }
}
