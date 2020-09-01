<?php
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        // var_dump($this->session->userdata('bl'));
        // die;
        if (isset($_POST['login'])) {
            $this->login();
        } else if (isset($_POST['register'])) {
            $this->register();
        } else {
            $data['tittle'] = 'Selamat datang di aplikasi magang PTPN7';
            $data['_view'] = 'auth/index';
            $this->load->view('layouts/main', $data);
        }
    }
    function register()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[13]|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run()) {
            if ($this->db->get_where('tbl_users', ['phone' => $this->input->post('phone')])->row_array()) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomor handphone sudah digunakan! </div>');
                redirect('auth');
            }
            if ($this->db->get_where('tbl_users', ['email' => $this->input->post('email')])->row_array()) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email sudah digunakan! </div>');
                redirect('auth');
            }
            $email = $this->input->post('email', true);
            $digits = 4;
            $token = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
            $user_token = [
                'phone' => $this->input->post('phone'),
                'token' => $token,
                'created_at' => time()
            ];
            $params1 = array(
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => '3',
                'active' => 'f',
                'display_name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'photo' => 'default.png',
                'created_at' => date('Y-m-d H:i:s')
            );
            //pesan wa
            $message = 'Hayy ' . $this->input->post('name') . ' Kode OTP Kamu : ' . $token;
            if ($this->wa->kirim($this->input->post('phone'), $message)) {
                $this->User_model->add_user($params1);
                $this->db->insert('user_token', $user_token);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun anda berhasil dibuat </div>');
                $this->session->set_userdata('verif', $this->input->post('phone'));
                redirect('auth/verif');
                var_dump($params1);
                die;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pendaftaran gagal terjadi kesalahan pada server </div>');
                redirect('auth');
            }
        }
        redirect('auth');
    }
    function verif()
    {
        otp();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('otp', 'otp', 'required|max_length[4]');
        $phone = $this->session->userdata('verif');
        if ($this->form_validation->run()) {
            $user_token = $this->db->get_where('user_token', array('phone' => $phone, 'token' => $this->input->post('otp')))->row_array();
            if ($user_token) {
                if (time() - $user_token['created_at'] < (60 * 60 * 30)) {
                    $this->db->set('active', 't');
                    $this->db->where('phone', $phone);
                    $this->db->update('tbl_users');
                    $this->db->delete('user_token', ['phone' => $phone]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aktifasi berhasil, Silahkan login! </div>');
                    $this->session->unset_userdata('verif');
                    redirect('auth');
                } else {
                    $this->db->delete('user_token', ['phone' => $phone]);
                    $this->db->delete('tbl_users', ['phone' => $phone]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktifasi gagal! melebihi batas waktu aktivasi </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Token Salah!! </div>');
                redirect('auth/verif');
            }
        } else {
            $this->load->view('auth/reset');
        }
    }
    private function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email|trim|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[8]trim|');

        $email =  $this->input->post('email');
        $password =  $this->input->post('password');
        $user = $this->db->get_where('tbl_users', ['email' => $email])->row_array();
        if ($user) {
            if ($user['active'] == 't') {
                if (password_verify($password, $user['password'])) {
                    $this->User_model->update_user($user['id_user'], ['last_login' => date('Y-m-d H:i:s')]);
                    $data = [
                        'role' => $user['role'],
                        'ids' => $user['id_user'],
                        'email' => $user['email'],
                        'nama' => $user['display_name'],
                        'foto' => $user['photo'],
                        'phone' => $user['phone']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role'] == 1) {
                        redirect('dashboard');
                    } else {
                        $this->load->model('Mhs_magang_model');
                        $mhs = $this->Mhs_magang_model->get_mhs_user($user['email']);
                        if ($mhs == null) {
                            $this->session->set_userdata('bl', 'belum lengkap');
                            redirect('complete');
                        } else {
                            if ($mhs['status'] != 't') {
                                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"><b>Permohonan magang kamu belum diverifikasi!</b><br> Pemberitahuan akan di kirim melalui whatsapp </div>');
                                redirect('user/profile');
                            }
                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat datang ' . $mhs['mhs_name'] . '</div>');
                            redirect('user/profile');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf password yang anda masukan salah! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf akun anda belum terverifikasi! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf akun anda belum terdaftar! </div>');
            redirect('auth');
        }
        // $this->User_model->add_user($params1);
        // redirect('dashboard');
    }
    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('ids');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('phone');
        $this->session->unset_userdata('bl');
        $this->session->unset_userdata('verif');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout! </div>');
        redirect('auth');
    }
}
