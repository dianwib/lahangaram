    <?php
    class Auth extends CI_Controller
    {

     function __construct()
     {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Public_user_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->library('email');
    }


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
            'action'        => site_url('auth/create_action_from_register'),
            'id_users'      => set_value('id_users'),
            'full_name'     => set_value('full_name'),
            'email'         => set_value('email'),
            'password'      => set_value('password'),
            'images'        => set_value('images'),
                // 'id_user_level' => set_value('id_user_level'),
                // 'is_aktif'      => set_value('is_aktif')
        );

        return $this->load->view('auth/register', $data);
    }

    public function verification_email($key)
    {
        $this->load->helper('url');
        $id_user = bin2hex($key);
        $this->User_model->update($id_user, ['is_aktif' => 'y']);
        $row = $this->User_model->get_by_id($id_user);

        $data = [];
        if ($row) {
            $data = array(
              'id_users'      => $row->id_users,
              'full_name'     => $row->full_name,
              'link'          => site_url('/auth'),
          );
        }


        return $this->load->view('auth/verifikasi', $data);
    }

    public function sent_email_register($data){

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'turunanketujuh@gmail.com',
            'smtp_pass' => 'mbooooot',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        //memanggil library email dan set konfigurasi untuk pengiriman email
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
            //konfigurasi pengiriman
        $nama = $data['full_name'];
        $email = $data['email'];
        $encrypted_id = hex2bin($data['last_id_login']);
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject("Verifikasi Akun Saltland");
        $this->email->message(
            "Hai $nama, silahkan verifikasi akun anda ".
            site_url("/auth/verification_email/$encrypted_id")
        );
        return $this->email->send();
        
    }

    public function create_action_from_register() 
    {
        $this->_rules_regis();
        $foto = $this->upload_foto();
        try{
            $this->db->trans_begin();
            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $password       = $this->input->post('password',TRUE);
                $options        = array("cost"=>4);
                $hashPassword   = $this->ocal_lib->EncryptString($password,'dvak2017');            

                $data = array(
                  'full_name'     => $this->input->post('full_name',TRUE),
                  'email'         => $this->input->post('email',TRUE),
                  'password'      => $hashPassword,
                  'images'        => $foto['file_name'],
                  'id_user_level' => 3,
                  'is_aktif'      => 'n',
              );

                $create_user = $this->User_model->insert($data);
                
                $data['last_id_login'] = $this->db->insert_id();
                if (!$this->sent_email_register($data)){
                 throw new Exception('Gagal kirim email'.$this->email->print_debugger());

             }

                    // $create_public_user = $this->Public_user_model->insert($data_public);
                    // if (!$create_public_user) {
                    //     $this->session->set_flashdata('error', 'Gagal bikin akun public');
                    // }

             $this->db->trans_commit();
             $this->session->set_flashdata('message',  "Berhasil mendaftar,  silahkan buka dan verifikasi segera email anda ".$data['email']);
             redirect(site_url('/auth/register'));

         }
     } catch (Exception $e) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('message', $e->getMessage());
        redirect(site_url('/auth/register'));
    }
}

public function create() 
{
    $data = array(
        'button'        => 'Create',
        'action'        => site_url('auth/create_action'),
        'id_users'      => set_value('id_users'),
        'full_name'     => set_value('full_name'),
        'email'         => set_value('email'),
        'password'      => set_value('password'),
        'images'        => set_value('images'),
    );
    $this->template->load('view','auth/register', $data);
}

function logout()
{
    $this->session->sess_destroy();
    $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
    redirect('auth');
}
function upload_foto(){
    $config['upload_path']          = './assets/foto_profil';
    $config['allowed_types']        = 'gif|jpg|png';
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
    $this->load->library('upload', $config);
    $this->upload->do_upload('images');
    return $this->upload->data();
}
public function _rules_regis() 
{
 $this->form_validation->set_rules('full_name', 'full name', 'trim|required');
 $this->form_validation->set_rules('email', 'email', 'trim|required');
 $this->form_validation->set_rules('password', 'password', 'trim|required');
}
}
