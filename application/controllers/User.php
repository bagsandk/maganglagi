<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        authcek();
    }

    /*
     * Listing of users
     */
    function index()
    {
        admincek();
        $data['users'] = $this->User_model->get_all_users();
        $data['tittle'] = 'Data User';
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new user
     */
    function add()
    {
        admincek();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|valid_email|trim|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[13]|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('active', 'Active', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run()) {
            $new = 'default.png';
            if (isset($_FILES["photo"])) {
                $up_photo = $_FILES["photo"];
                $config['upload_path'] = './assets/img/profil/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('photo')) {
                    $new = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $email = $this->input->post('email', true);
            $params1 = array(
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'active' => $this->input->post('active'),
                'display_name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'photo' => $new,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->User_model->add_user($params1);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun anda berhasil dibuat </div>');
            redirect('user');
        } else {
            $data['tittle'] = 'Tambah Data User';
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main', $data);
        }
    }
    function edit($id_user)
    {
        admincek();
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id_user);

        if (isset($data['user']['id_user'])) {
            $user = $this->User_model->get_user($id_user);
            $this->load->library('form_validation');
            if ($this->input->post('password') !== "") {
                $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
            } else {
                $pass = $data['user']['password'];
            }
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');
            $this->form_validation->set_rules('role', 'Role', 'required|max_length[1]');
            $this->form_validation->set_rules('active', 'Aktif', 'required|max_length[1]');
            $this->form_validation->set_rules('name', 'DN', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');

            if ($this->form_validation->run()) {
                $new = 'default.png';
                if (isset($_FILES["photo"])) {
                    $up_photo = $_FILES["photo"];
                    $config['upload_path'] = './assets/img/profil/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']     = '2000';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('photo')) {
                        $new = $this->upload->data('file_name');
                        $foto_lama = $user['photo'];
                        if ($foto_lama != 'default.png') {
                            unlink(FCPATH . 'assets/img/profile/' . $foto_lama);
                        }
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
                $params = array(
                    'password' => $pass,
                    'email' => $this->input->post('email'),
                    'display_name' => $this->input->post('name'),
                    'role' => $this->input->post('role'),
                    'phone' => $this->input->post('phone'),
                    'photo' => $new,
                    'active' => $this->input->post('active'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->User_model->update_user($id_user, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun anda berhasil diubah </div>');
                redirect('user');
            } else {
                $data['tittle'] = 'Edit Data User';
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The user you are trying to edit does not exist.');
    }
    /*
     * Deleting user
     */
    function remove($id_user)
    {
        admincek();
        $user = $this->User_model->get_user($id_user);

        // check if the user exists before trying to delete it
        if (isset($user['id_user'])) {
            $this->User_model->delete_user($id_user);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil dihapus </div>');
            redirect('user/index');
        } else
            show_error('The user you are trying to delete does not exist.');
    }

    function profile()
    {
        $this->load->model('Mhs_magang_model');
        $this->load->model('Karyawan_model');
        if ($this->session->userdata('role') == 2) {
            $data['profil'] = $this->Karyawan_model->get_karyawan_user($this->session->userdata('email'));
        } else if ($this->session->userdata('role') == 3) {
            $data['profil'] = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
        } else {
            $data['profil'] = $this->Karyawan_model->get_karyawan_user($this->session->userdata('email'));
        }
        $data['tittle'] = 'Profile';
        $data['_view'] = 'user/profile';
        $this->load->view('layouts/main', $data);
    }
    function editprofile()
    {

        $this->load->model('Mhs_magang_model');
        $this->load->model('Karyawan_model');
        if ($this->session->userdata('role') == 2) {
            $data['profil'] = $this->Karyawan_model->get_karyawan_user($this->session->userdata('email'));
            $id = $data['profil']['id_karyawan'];
        } else if ($this->session->userdata('role') == 3) {
            $data['profil'] = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
            $id = $data['profil']['id_mhs'];
        } else {
            $data['profil'] = $this->Karyawan_model->get_karyawan_user($this->session->userdata('email'));
            $id = $data['profil']['id_karyawan'];
        }
        $this->load->library('form_validation');
        if ($this->session->userdata('role') == 3) {
            $this->form_validation->set_rules('mhs_from', 'Mhs_from', 'required|max_length[50]');
        }
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('birth_pl', 'Birth_pl', 'required');
        $this->form_validation->set_rules('birth_dt', 'Birth_dt', 'required');
        $this->form_validation->set_rules('religion', 'Religion', 'required');
        $this->form_validation->set_rules('name1', 'Name1', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[13]|numeric');

        if ($this->form_validation->run()) {
            if ($this->session->userdata('role') == 3) {
                $cv = $data['profil']['cv'];
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
                    'updated_at' => date('Y-m-d H:i:s')
                );
            } else {
                $params = array(
                    'karyawan_name' => $this->input->post('name1'),
                    'birth_pl' => $this->input->post('birth_pl'),
                    'birth_dt' => $this->input->post('birth_dt'),
                    'religion' => $this->input->post('religion'),
                    'gender' => $this->input->post('gender'),
                    'address' => $this->input->post('address'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            }
            $paramuser = [
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            if ($this->session->userdata('role') == 3) {
                $this->Mhs_magang_model->update_mhs_magang($id, $params);
            } else {
                $this->Karyawan_model->update_karyawan($id, $params);
            }
            $this->User_model->update_user($data['profil']['id_user'], $paramuser);
            $this->session->set_userdata('email', $this->input->post('email'));
            $this->session->set_userdata('phone', $this->input->post('phone'));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di ubah </div>');
            redirect('user/profile');
        } else {
            $data['tittle'] = 'Edit profil';
            $data['_view'] = 'user/editprofile';
            $this->load->view('layouts/main', $data);
        }
    }
    function changepass()
    {
        $id = $this->session->userdata('ids');
        $user = $this->User_model->get_user($id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('newpass', 'Newpass', 'required|min_length[6]');
        if ($this->form_validation->run()) {
            $newpass =  password_hash($this->input->post('newpass'), PASSWORD_DEFAULT);
            $params = array(
                'password' => $newpass,
                'updated_at' => date('Y-m-d H:i:s')
            );
            if (password_verify($this->input->post('password'), $user['password'])) {
                $this->User_model->update_user($id, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di ubah </div>');
                redirect('user/profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah, password gagal di ubah</div>');
                redirect('user/changepass');
            }
        } else {
            $data['tittle'] = 'Ubah password';
            $data['_view'] = 'user/changepass';
            $this->load->view('layouts/main', $data);
        }
    }
    function changephoto()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('photo', 'Photo', 'required');
        $id = $this->session->userdata('ids');
        $user = $this->User_model->get_user($id);
        if (isset($_FILES["photo"])) {
            $up_photo = $_FILES["photo"];
            $config['upload_path'] = './assets/img/profil/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('photo')) {
                $new = $this->upload->data('file_name');
                $foto_lama = $user['photo'];
                if ($foto_lama != 'default.png') {
                    unlink(FCPATH . 'assets/img/profile/' . $foto_lama);
                }
                $this->User_model->update_user($id, ['photo' => $new]);
                $this->session->set_userdata('foto', $new);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Foto berhasil di ubah </div>');
                redirect('user/profile');
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $data['tittle'] = 'Ubah foto profil';
            $data['_view'] = 'user/changephoto';
            $this->load->view('layouts/main', $data);
        }
    }
}
