<?php
class Complete extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mhs_magang_model');
        $this->load->library('form_validation');
        nc();
    }

    function index()
    {
        $this->load->library('form_validation');

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
                'id_user' => $this->session->userdata('ids'),
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Permohonan magang kamu sedang diverifikasi!</b><br> Pemberitahuan akan di kirim melalui whatsapp  </div>');
            $this->session->unset_userdata('bl');
            redirect('auth');
        } else {
            $this->load->model('Mhs_magang_model');
            $data['tittle'] = 'Lengkapi data magang';
            $data['_view'] = 'auth/complete';
            $this->load->view('layouts/main', $data);
        }
    }
}
