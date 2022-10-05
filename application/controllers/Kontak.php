<?php

class Kontak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model("ModelKontak");
    }

    public function index()
    {
        $dataKontak = $this->ModelKontak->getAll();
        $data = array(
            "kontaks" => $dataKontak
        );

        $data['title'] = 'Data Kontak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kontak/v_list_kontak', $data);
        $this->load->view('template/footer');
    }

    // untuk me-load tampilan form tambah barang
    public function tambah()
    {
        $data['title'] = 'Form Tambah Kontak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kontak/v_add_kontak', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $data = array(
            "no_telepon" => $this->input->post("no_telepon"),
            "social_media" => $this->input->post("social_media"),
            "email" => $this->input->post("email"),
            "website" => $this->input->post("website"),
            "alamat" => $this->input->post("alamat")
        );
        $id = $this->ModelKontak->insertGetId($data);
        redirect('kontak');
    }

    public function ubah($id)
    {
        $kontak = $this->ModelKontak->getByPrimaryKey($id);
        $data = array(
            "kontak" => $kontak,
        );
        $data['title'] = 'Form Update Kontak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kontak/v_update_kontak', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_kontak');
        $data = array(
            "no_telepon" => $this->input->post("no_telepon"),
            "social_media" => $this->input->post("social_media"),
            "email" => $this->input->post("email"),
            "website" => $this->input->post("website"),
            "alamat" => $this->input->post("alamat")
        );
        echo var_dump($data);
        echo var_dump($id);
        $this->ModelKontak->update($id, $data);
        redirect('kontak');
    }

    public function delete()
    {
        $id = $this->input->post('id_kontak');
        $this->ModelKontak->delete($id);
        redirect('kontak');
    }
}
