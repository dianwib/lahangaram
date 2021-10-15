<?php
class Auth extends CI_Controller
{



    function index()
    {
        //echo 'aa';
        $this->load->view('auth/login');
    }

    function cheklogin()
    {
        $email      = $this->input->post('email');
        //$password   = $this->input->post('password');
        $password = $this->input->post('password', TRUE);
        //$hashPass = password_hash($password,PASSWORD_DEFAULT);
        $hashPass   = $this->ocal_lib->EncryptString($password, 'dvak2017');
        //$test     = password_verify($password, $hashPass);
        // query chek users
        //echo $hashPass;exit;
        $this->db->select('id_users, full_name, email, password, nama_level,  
           tbl_user.id_user_level, images, is_aktif');
        $this->db->from('tbl_user');
        $this->db->join('tbl_user_level', 'tbl_user_level.id_user_level = tbl_user.id_user_level', 'left');
        // $this->db->join('regencies', 'tbl_user_level.id_user_level = tbl_user.id_user_level', 'left');
        $this->db->where('email', $email);
        $users = $this->db->get();


        


        //echo $this->db->last_query();
        //exit;
        if ($users->num_rows() > 0) {
            $user = $users->row_array();
            //if(password_verify($password,$user['password'])){
            if (substr($hashPass, 7) ==  substr($user['password'], 7)) {
                // retrive user data to session
                if ($user['id_user_level'] == 4){
                    $user = $this->checkUserDinas($user);
                }
                $this->session->set_userdata($user);
                redirect('welcome');
            } else {
                $this->session->set_flashdata('status_login', 'email di temukan namun password salah');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('status_login', 'email tidak ditemukan');
            redirect('auth');
        }
    }

    function checkUserDinas($userLogin)
    {
        $this->db->select('id_users, id_user_dinas, id_regencies, province_id')->from('tbl_user');
        $this->db->where('id_users', $userLogin['id_users']);
        $this->db->join('user_dinas', 'user_dinas.id1 = tbl_user.id_user_dinas', 'left');
        $this->db->join('regencies', 'regencies.id = user_dinas.id_regencies', 'left');
        $tempUserDinas = $this->db->get();
        if ($tempUserDinas->num_rows() > 0) {
            $userDinas = $tempUserDinas->row();

            $userLogin['id_user_dinas'] = $userDinas->id_user_dinas;
            $userLogin['id_regency'] = $userDinas->id_regencies;
            $userLogin['id_province'] = $userDinas->province_id;
        }
        return $userLogin;
    }
    

    function register()
    {
        $data = array(
            'button'        => 'Create',
            'action'        => site_url('user/create_action'),
            'id_users'      => set_value('id_users'),
            'full_name'     => set_value('full_name'),
            'email'         => set_value('email'),
            'password'      => set_value('password'),
            'images'        => set_value('images'),
            'id_user_level' => set_value('id_user_level'),
            'is_aktif'      => set_value('is_aktif')
        );

        return $this->load->view('auth/register', $data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
