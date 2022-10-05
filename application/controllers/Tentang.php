<?php

class Tentang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model("ModelTentang");
    }

    public function index()
    {
        $dataTentang = $this->ModelTentang->getAll();
        $data = array(
            "tentangs" => $dataTentang
        );

        $data['title'] = 'Data Tentang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('tentang/v_list_tentang', $data);
        $this->load->view('template/footer');
    }

    // untuk me-load tampilan form tambah tentang
    public function tambah()
    {
        $data['title'] = 'Form Tambah Tentang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('tentang/v_add_tentang', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $data = array(
            "visi" => $this->input->post("visi"),
            "misi" => $this->input->post("misi"),
            "nama_pendeta" => $this->input->post("nama_pendeta"),
            "background_pendeta" => $this->input->post("background_pendeta")
        );
        $id = $this->ModelTentang->insertGetId($data);
        redirect('tentang');
    }

    public function ubah($id)
    {
        $tentang = $this->ModelTentang->getByPrimaryKey($id);
        $data = array(
            "tentang" => $tentang,
        );
        $data['title'] = 'Form Ubah Tentang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('tentang/v_update_tentang', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_tentang');
        $data = array(
            "visi" => $this->input->post("visi"),
            "misi" => $this->input->post("misi"),
            "nama_pendeta" => $this->input->post("nama_pendeta"),
            "background_pendeta" => $this->input->post("background_pendeta")
        );
        $this->ModelTentang->update($id, $data);
        redirect('tentang');
    }

    public function delete()
    {
        $id = $this->input->post('id_tentang');
        $this->ModelTentang->delete($id);
        redirect('tentang');
    }
}
