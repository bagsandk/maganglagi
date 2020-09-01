<?php

class Mhs_magang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mhs_magang_model');
        admincek();
    }

    /*
     * Listing of tbl_mhs_magang
     */
    function index()
    {
        $data['tbl_mhs_magang'] = $this->Mhs_magang_model->get_all_tbl_mhs_magang();
        $data['tittle'] = 'Data Mahasiswa Magang';
        $data['_view'] = 'mhs_magang/index';
        $this->load->view('layouts/main', $data);
    }
    function pending()
    {
        $data['tbl_mhs_magang'] = $this->Mhs_magang_model->get_all_mhs_magang_pending();
        $data['tittle'] = 'Permintaan Mahasiswa Magang';
        $data['_view'] = 'mhs_magang/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new mhs_magang
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_user', 'Id_user', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('birth_pl', 'Birth_pl', 'required');
        $this->form_validation->set_rules('birth_dt', 'Birth_dt', 'required');
        $this->form_validation->set_rules('religion', 'Religion', 'required');
        $this->form_validation->set_rules('name1', 'Name1', 'required');
        $this->form_validation->set_rules('name2', 'Name2', 'required');
        $this->form_validation->set_rules('mhs_from', 'Mhs_from', 'required|max_length[50]');
        $this->form_validation->set_rules('address', 'Address', 'required|max_length[100]');

        if ($this->form_validation->run()) {
            //pdf
            $configpdf['upload_path'] = './file/cv/';
            $configpdf['allowed_types'] = 'pdf';
            $configpdf['max_size']     = '10000';
            $this->load->library('upload', $configpdf);
            $this->upload->initialize($configpdf);
            if ($this->upload->do_upload('cv')) {
                $cv = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
            $params = array(
                'id_user' =>  $this->input->post('id_user'),
                'mhs_name' => $this->input->post('name1') . ' ' . $this->input->post('name2'),
                'birth_pl' => $this->input->post('birth_pl'),
                'birth_dt' => $this->input->post('birth_dt'),
                'religion' => $this->input->post('religion'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'mhs_from' => $this->input->post('mhs_from'),
                'cv' => $cv,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->Mhs_magang_model->add_mhs_magang($params);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data mahasiswa berhasil ditambahkan </div>');
            redirect('mhs_magang');
        } else {
            $this->load->model('User_model');
            $data['users'] = $this->User_model->get_free_users();
            $data['tittle'] = 'Tambah Data Mahasiswa Magang';
            $data['_view'] = 'mhs_magang/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a mhs_magang
     */
    function edit($id_mhs)
    {
        // check if the mhs_magang exists before trying to edit it
        $data['mhs_magang'] = $this->Mhs_magang_model->get_mhs_magang($id_mhs);

        if (isset($data['mhs_magang']['id_mhs'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('birth_pl', 'Birth_pl', 'required');
            $this->form_validation->set_rules('birth_dt', 'Birth_dt', 'required');
            $this->form_validation->set_rules('religion', 'Religion', 'required');
            $this->form_validation->set_rules('name1', 'Name1', 'required');
            $this->form_validation->set_rules('mhs_from', 'Mhs_from', 'required|max_length[50]');
            $this->form_validation->set_rules('address', 'Address', 'required|max_length[100]');

            if ($this->form_validation->run()) {
                $cv = $data['mhs_magang']['cv'];
                if (isset($_FILES["cv"])) {
                    $up_foto = $_FILES["cv"];
                    $config['upload_path'] = './file/cv/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size']     = '10000';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('cv')) {
                        $new = $this->upload->data('file_name');
                        $cv_lama = $data['mhs_magang']['cv'];
                        if ($cv_lama != 'default.png') {
                            unlink(FCPATH . 'assets/img/profile/' . $cv_lama);
                        }
                        $cv = $new;
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
                $params = array(
                    'mhs_name' => $this->input->post('name1'),
                    'birth_pl' => $this->input->post('birth_pl'),
                    'birth_dt' => $this->input->post('birth_dt'),
                    'religion' => $this->input->post('religion'),
                    'gender' => $this->input->post('gender'),
                    'address' => $this->input->post('address'),
                    'mhs_from' => $this->input->post('mhs_from'),
                    'cv' => $cv,
                    'status' => $this->input->post('status'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->Mhs_magang_model->update_mhs_magang($id_mhs, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data mahasiswa berhasil diubah </div>');
                redirect('mhs_magang');
            } else {
                $data['mhs_magang'] = $this->Mhs_magang_model->get_mhs_magang($id_mhs);
                $data['tittle'] = 'Edit Data Mahasiswa Magang';
                $data['id_mhs'] = $id_mhs;
                $data['_view'] = 'mhs_magang/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The mhs_magang you are trying to edit does not exist.');
    }
    /*
     * Deleting mhs_magang
     */
    function remove($id_mhs)
    {
        $mhs_magang = $this->Mhs_magang_model->get_mhs_magang($id_mhs);

        // check if the mhs_magang exists before trying to delete it
        if (isset($mhs_magang['id_mhs'])) {
            $this->Mhs_magang_model->delete_mhs_magang($id_mhs);
            if ($mhs_magang['status'] == 't') {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data mahasiswa berhasil dihapus </div>');
                redirect('mhs_magang/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data mahasiswa berhasil dihapus </div>');
                redirect('mhs_magang/pending');
            }
        } else
            show_error('The mhs_magang you are trying to delete does not exist.');
    }
    function info($id_mhs)
    {
        $this->load->model('User_model');
        $data['mhs'] = $this->Mhs_magang_model->get_mhs_user_by_id($id_mhs);
        $data['user'] = $this->User_model->get_user($data['mhs']['id_user']);
        $data['tittle'] = 'Info Mahasiswa Magang';
        $data['_view'] = 'mhs_magang/info';
        $this->load->view('layouts/main', $data);
    }
    function verif($id_mhs)
    {
        admincek();
        $this->load->model('Karyawan_model');
        $this->load->model('Bagian_model');
        $this->load->model('Magang_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_bagian', 'Id Bagian', 'required|integer');
        $this->form_validation->set_rules('id_karyawan', 'ID karyawan', 'required|max_length[10]');
        if ($this->form_validation->run()) {
            $params = array(
                'id_mhs' => $id_mhs,
                'id_bagian' => $this->input->post('id_bagian'),
                'id_karyawan' => $this->input->post('id_karyawan'),
                'status_magang' => 'f',
                'nilai' => '',
                'created_at' => date('Y-m-d H:i:s')
            );
            //waaa
            $mhs = $this->Mhs_magang_model->get_mhs_user_by_id($id_mhs);
            $message = 'Selamat ' . $mhs['mhs_name'] . ' kamu diterima magang di run system';
            if ($this->wa->kirim($mhs['phone'], $message)) {
                $this->Magang_model->add_magang($params);
                $this->Mhs_magang_model->update_mhs_magang($id_mhs, ['status' => 't']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menerima mahasiswa magang </div>');
                redirect('mhs_magang/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menerima mahasiswa magang </div>');
                redirect('mhs_magang/');
            }
        } else {
            $data['karyawan'] = $this->Karyawan_model->get_all_tbl_karyawan();
            $data['bagian'] = $this->Bagian_model->get_all_tbl_bagian();
            $data["id_mhs"] = $id_mhs;
            $data['tittle'] = 'Menerima mahasiswa magang';
            $data['_view'] = 'mhs_magang/terima_magang';
            $this->load->view('layouts/main', $data);
        }
    }
}
