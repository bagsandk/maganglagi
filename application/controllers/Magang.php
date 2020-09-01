<?php


class Magang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Magang_model');
        authcek();
    }

    /*
     * Listing of tbl_magang
     */
    function index()
    {
        $this->load->model('Karyawan_model');
        $this->load->model('Mhs_magang_model');

        $data['_view'] = 'magang/index';
        if ($this->session->userdata('role') == 2) {
            $kd = $this->Karyawan_model->get_karyawan_user($this->session->userdata('email'));
            $data['tbl_magang'] = $this->Magang_model->get_tbl_magang_to_karyawan($kd['id_karyawan']);
        } else if ($this->session->userdata('role') == 3) {
            $kd = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
            $data['tbl_magang'] = $this->Magang_model->get_tbl_magang_to_mhs($kd['id_mhs']);
            if ($this->session->has_userdata('email') and $kd['status'] == 'p') {
                $data['tittle'] = 'Data Magang';
                $data['message'] = 'Permohonan magang kamu sedang di verifikasi! Pengumuman akan dikirim melalui whatsapp';
                $data['_view'] = 'magang/status';
            }
        } else {
            $data['tbl_magang'] = $this->Magang_model->get_all_tbl_magang();
        }
        $data['tittle'] = 'Data Magang';
        $this->load->view('layouts/main', $data);
    }
    /*
     * Adding a new magang
     */
    function add()
    {
        admincek();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_mhs', 'Id Mhs', 'required|integer');
        $this->form_validation->set_rules('id_bagian', 'Id Bagian', 'required|integer');
        $this->form_validation->set_rules('id_karyawan', 'Id karyawan', 'required|integer');
        $this->form_validation->set_rules('status', 'Status', 'required|max_length[1]');
        if ($this->form_validation->run()) {
            $params = array(
                'id_mhs' => $this->input->post('id_mhs'),
                'id_bagian' => $this->input->post('id_bagian'),
                'id_karyawan' => $this->input->post('id_karyawan'),
                'nilai' => '',
                'status_magang' => $this->input->post('status'),
                'created_at' => date('Y-m-d H:i:s')
            );
            $magang_id = $this->Magang_model->add_magang($params);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data magang berhasil ditambahkan </div>');
            redirect('magang/index');
        } else {
            $this->load->model('Mhs_magang_model');

            $data['mhs'] = $this->Mhs_magang_model->get_all_free_mhs_magang();

            $this->load->model('Karyawan_model');

            $data['karyawan'] = $this->Karyawan_model->get_all_tbl_karyawan();

            $this->load->model('Bagian_model');

            $data['bagian'] = $this->Bagian_model->get_all_tbl_bagian();

            $data['tittle'] = 'Tambah Data Magang';
            $data['_view'] = 'magang/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a magang
     */
    function edit($id_magang)
    {
        admincek();
        // check if the magang exists before trying to edit it
        $data['magang'] = $this->Magang_model->get_magang($id_magang);

        if (isset($data['magang']['id_magang'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_mhs', 'Id Mhs', 'required|integer');
            $this->form_validation->set_rules('id_bagian', 'Id Bagian', 'required|integer');
            $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'required');
            $this->form_validation->set_rules('status', 'Status_magang', 'required|max_length[1]');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_mhs' => $this->input->post('id_mhs'),
                    'id_bagian' => $this->input->post('id_bagian'),
                    'id_karyawan' => $this->input->post('id_karyawan'),
                    'status_magang' => $this->input->post('status'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->Magang_model->update_magang($id_magang, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data magang berhasil diubah </div>');
                redirect('magang/index');
            } else {
                $this->load->model('Mhs_magang_model');
                $this->load->model('Karyawan_model');
                $this->load->model('Bagian_model');
                $data['mhs'] = $this->Mhs_magang_model->get_all_free_edit_mhs_magang($data['magang']['id_mhs']);
                $data['karyawan'] = $this->Karyawan_model->get_all_tbl_karyawan();
                $data['bagian'] = $this->Bagian_model->get_all_tbl_bagian();
                $data['tittle'] = 'Edit Data Magang';
                $data['_view'] = 'magang/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The magang you are trying to edit does not exist.');
    }

    /*
     * Deleting magang
     */
    function remove($id_magang)
    {
        admincek();
        $magang = $this->Magang_model->get_magang($id_magang);

        // check if the magang exists before trying to delete it
        if (isset($magang['id_magang'])) {
            $this->Magang_model->delete_magang($id_magang);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data magang berhasil dihapus </div>');
            redirect('magang/index');
        } else
            show_error('The magang you are trying to delete does not exist.');
    }
    function info($id_magang)
    {
        $data['mhs'] = $this->Magang_model->get_info_mhs($id_magang);
        $data['karyawan'] = $this->Magang_model->get_info_karyawan($id_magang);
        $data['tittle'] = 'Info Magang';
        $data['_view'] = 'magang/info';
        $this->load->view('layouts/main', $data);
    }
    function nilai($id_magang)
    {
        $data['magang'] = $this->Magang_model->get_magang($id_magang);
        if (isset($data['magang']['id_magang'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nilai', 'Nilai', 'max_length[3]|numeric');
            if ($this->form_validation->run()) {
                $params = array(
                    'nilai' => $this->input->post('nilai'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->Magang_model->update_magang($id_magang, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai magang berhasil di update </div>');
                redirect('magang/index');
            } else {
                $data['mhs'] = $this->Magang_model->get_info_mhs($id_magang);
                $data['tittle'] = 'Input Nilai Magang';
                $data['_view'] = 'magang/nilai';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The magang you are trying to edit does not exist.');
    }
    function kegiatan($id_magang)
    {
        $data['kegiatan'] = $this->Magang_model->get_kegiatan_mhs($id_magang);
        $data['mhs'] = $this->Magang_model->get_info_mhs($id_magang);
        $data['tittle'] = 'Kegiatan Magang';
        $data['_view'] = 'magang/kegiatan';
        $this->load->view('layouts/main', $data);
    }
}
