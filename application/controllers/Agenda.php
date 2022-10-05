<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model("ModelAgenda");
    }

    public function index()
    {
        $dataAgenda = $this->ModelAgenda->getAll();
        $data = array(
            "barangs" => $dataAgenda
        );

        $data['title'] = 'Data Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('agenda/v_list_agenda', $data);
        $this->load->view('template/footer');
    }
    //untuk mengupload tampilan form tambah barang
    public function tambah()
    {
        $data['title'] = 'Form Tambah Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('agenda/v_add_agenda', $data);
        $this->load->view('template/footer');
    }
    public function insert()
    {
        $config['upload_path']          = './gambar/agenda/';
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
            $judul_warta = $this->input->post('judul_warta');
            $jenis_warta = $this->input->post('jenis_warta');

            $data = array(
                "judul_warta" => $judul_warta,
                "jenis_warta" => $jenis_warta,
                "gambar" => $gambar

            );
            $id = $this->ModelAgenda->insertGetId($data);
            redirect('agenda');
        }
    }

    public function ubah($id)
    {
        $agenda = $this->ModelAgenda->getByPrimaryKey($id);
        $data = array(
            "agenda" => $agenda,
        );
        $data['title'] = 'Form Update Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('agenda/v_update_agenda', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $config['upload_path']          = './gambar/agenda/';
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
            $judul_warta = $this->input->post('judul_warta');
            $jenis_warta = $this->input->post('jenis_warta');
            $id = $this->input->post('kode_warta');
            $data = array(
                "judul_warta" => $judul_warta,
                "jenis_warta" => $jenis_warta,
                "gambar" => $gambar

            );
            $id = $this->ModelAgenda->update($id, $data);
            redirect('agenda');
        }
    }
    public function delete()
    {
        $id = $this->input->post('kode_warta');
        $this->ModelAgenda->delete($id);
        redirect('agenda');
    }
}
