<?php

class Jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model("ModelJadwal");
    }

    public function index()
    {
        $dataJadwal = $this->ModelJadwal->getAll();
        $data = array(
            "jadwals" => $dataJadwal
        );

        $data['title'] = 'Data Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('jadwal/v_list_jadwal', $data);
        $this->load->view('template/footer');
    }

    //untuk mengupload tampilan form tambah jadwal
    public function tambah()
    {
        $data['title'] = 'Form Tambah Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('jadwal/v_add_jadwal', $data);
        $this->load->view('template/footer');
    }
    public function insert()
    {
        $data = array(
            "nama_ibadah" => $this->input->post("nama_ibadah"),
            "tanggal" => $this->input->post("tanggal"),
            "waktu" => $this->input->post("waktu"),
            "keterangan" => $this->input->post("keterangan")
        );

        $id = $this->ModelJadwal->insertGetId($data);
        redirect('jadwal');
    }

    public function ubah($id)
    {
        $jadwal = $this->ModelJadwal->getByPrimaryKey($id);
        $data = array(
            "jadwal" => $jadwal,
        );
        $data['title'] = 'Form Update Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('jadwal/v_update_jadwal', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_jadwal');
        $data = array(
            "nama_ibadah" => $this->input->post("nama_ibadah"),
            "tanggal" => $this->input->post('tanggal'),
            "waktu" => $this->input->post('waktu'),
            "keterangan" => $this->input->post('keterangan')
        );
        $this->ModelJadwal->update($id, $data);
        redirect('jadwal');
    }

    public function delete()
    {
        $id = $this->input->post('id_jadwal');
        $this->ModelJadwal->delete($id);
        redirect('jadwal');
    }
}
