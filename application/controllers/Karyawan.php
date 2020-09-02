<?php

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        admincek();
    }

    /*
     * Listing of tbl_karyawan
     */
    function index()
    {
        $data['tbl_karyawan'] = $this->Karyawan_model->get_all_tbl_karyawan();
        $data['tittle'] = 'Data karyawan';
        $data['_view'] = 'karyawan/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new karyawan
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('id_user', 'Id_User', 'required');
        $this->form_validation->set_rules('birth_pl', 'Birth_pl', 'required');
        $this->form_validation->set_rules('birth_dt', 'Birth_dt', 'required');
        $this->form_validation->set_rules('religion', 'Religion', 'required');
        $this->form_validation->set_rules('name1', 'Name1', 'required');
        $this->form_validation->set_rules('name2', 'Name2', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required|max_length[100]');

        if ($this->form_validation->run()) {
            $params = array(
                'karyawan_name' => $this->input->post('name1') . ' ' . $this->input->post('name2'),
                'birth_pl' => $this->input->post('birth_pl'),
                'id_user' => $this->input->post('id_user'),
                'birth_dt' => $this->input->post('birth_dt'),
                'religion' => $this->input->post('religion'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->Karyawan_model->add_karyawan($params);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan berhasil ditambahkan </div>');
            redirect('karyawan');
        } else {
            $this->load->model('User_model');
            $data['users'] = $this->User_model->get_free_users_karyawan();
            $data['tittle'] = 'Tambah Data karyawan';
            $data['_view'] = 'karyawan/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a karyawan
     */
    function edit($id_karyawan)
    {
        // check if the karyawan exists before trying to edit it
        $data['karyawan'] = $this->Karyawan_model->get_karyawan($id_karyawan);

        if (isset($data['karyawan']['id_karyawan'])) {
            $this->load->library('form_validation');


            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('birth_pl', 'Birth_pl', 'required');
            $this->form_validation->set_rules('birth_dt', 'Birth_dt', 'required');
            $this->form_validation->set_rules('religion', 'Religion', 'required');
            $this->form_validation->set_rules('name1', 'Name1', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required|max_length[100]');

            if ($this->form_validation->run()) {
                $params = array(
                    'karyawan_name' => $this->input->post('name1'),
                    'birth_pl' => $this->input->post('birth_pl'),
                    'birth_dt' => $this->input->post('birth_dt'),
                    'religion' => $this->input->post('religion'),
                    'gender' => $this->input->post('gender'),
                    'address' => $this->input->post('address'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->Karyawan_model->update_karyawan($id_karyawan, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan berhasil diubah </div>');
                redirect('karyawan');
            } else {
                $data['tittle'] = 'Edit Data karyawan';
                $data['_view'] = 'karyawan/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The karyawan you are trying to edit does not exist.');
    }

    /*
     * Deleting karyawan
     */
    function remove($id_karyawan)
    {
        $karyawan = $this->Karyawan_model->get_karyawan($id_karyawan);
        // check if the karyawan exists before trying to delete it
        if (isset($karyawan['id_karyawan'])) {
            $this->Karyawan_model->delete_karyawan($id_karyawan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan berhasil dihapus </div>');
            redirect('karyawan/');
        } else
            show_error('The karyawan you are trying to delete does not exist.');
    }
}
