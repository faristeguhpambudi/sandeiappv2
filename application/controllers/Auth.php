<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data1['title'] = 'Login | sandei';
            $this->load->view('template/auth_header', $data1);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // ada usernya ada
        if ($user) {
            // ada usernya tidak aktif
            if ($user['is_active'] == 1) {

                // cek password 
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password !!
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Email has been not activated !!
           </div>');
                redirect('auth');
            }
        } else {
            // data tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Email is not register !!
           </div>');
            redirect('auth');
        }
    }
    public function registration()

    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules(
            'password1',
            'password',
            'required|trim|min_length[8]|matches[password2]',
            [
                'matches' => 'dont matches!!',
                'min_length' => 'password too short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registration | sandei';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } else {
            $email = $this->input->post('email', 'true');
            $data = [
                'name' => htmlspecialchars($this->input->post('name', 'true')),
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => '2',
                'is_active' => '0',
                'date_created' => time()
            ];

            //siapkan token
            $token = base64_encode(random_bytes('32'));
            $user_token = [
                "email" => $email,
                "token" => $token,
                "date_created" => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            // mengaktifkan fitur kirim email 
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           congratulation! your acount hasben create, please activated your acount
          </div>');
            redirect('auth');
        }
    }


    //private sendEmail ( konfigurasi protokol )
    private function _sendEmail($token, $type)
    {

        $config = [
            'protokol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'itsandei1@gmail.com',
            'smtp_pass' => 'Nasipadang12',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->load->initialize($config);
        $this->email->from('itsandei1@gmail.com', 'IT Divition');
        $this->email->to($this->input->post('email'));


        if ($type == 'verify') {

            $this->email->subject('Acount Verification');
            $this->email->message('Clink this link to verify your acount:
                 <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Activated</a>');
        } else if ($type == 'forget') {

            $this->email->subject('Acount Reset');
            $this->email->message('Clink this link to Reset your acount:
                 <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //pengecekan user dan token ada atau tidak di database
        if ($user) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {

                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">
                ' . $email . ' hasbeen activated !! please Login
               </div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Token expired !!
                   </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Token not Valid !!
           </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Acticated Acount Failled ! Wrong Email
           </div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        you has been logged out !
       </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }


    public function forgetPassword()
    {
        if ($this->form_validation->run() == false) {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

            if ($this->form_validation->run() == false) {
                $data1['title'] = 'Forget Password | sandei';
                $this->load->view('template/auth_header', $data1);
                $this->load->view('auth/forgetpassword');
                $this->load->view('template/auth_footer');
            } else {


                $email = $this->input->post('email');
                $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();


                if ($user) {

                    //siapkan token
                    $token = base64_encode(random_bytes(32));

                    $user_token = [
                        "email" => $email,
                        "token" => $token,
                        "date_created" => time()
                    ];

                    $this->db->insert('user_token', $user_token);
                    $this->_sendEmail($token, 'forget');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Please Check your Email to Reset your password !!
                   </div>');
                    redirect('auth/forgetPassword');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email is not registered or Activated !!
                   </div>');
                    redirect('auth/forgetPassword');
                }
            }
        }
    }
    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //pengecekan user dan token ada atau tidak di database
        if ($user) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Token invalid !!
               </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
       Wrong Email!!
       </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {

        $this->form_validation->set_rules(
            'password1',
            'password',
            'required|trim|min_length[8]|matches[password2]',
            [
                'matches' => 'dont matches!!',
                'min_length' => 'password too short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data1['title'] = 'Change Password | sandei';
            $this->load->view('template/auth_header', $data1);
            $this->load->view('auth/changepassword');
            $this->load->view('template/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password hasbeen Changed , Please Login !!
           </div>');
            redirect('auth');
        }
    }
}
