<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Public_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Public_user_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'public_user/public_user_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Public_user_model->json();
    }

    public function read($id)
    {
        $row = $this->Public_user_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id1' => $row->id1,
                'NIK' => $row->NIK,
                'name' => $row->name,
                'address' => $row->address,
                'phone' => $row->phone,
                'email' => $row->email,
                'createdate' => $row->createdate,
                'aprove' => $row->aprove,
                'id_villages' => $row->id_villages,
            );
            $this->template->load('template', 'public_user/public_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('public_user'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('public_user/create_action'),
            'id1' => set_value('id1'),
            'NIK' => set_value('NIK'),
            'name' => set_value('name'),
            'address' => set_value('address'),
            'phone' => set_value('phone'),
            'email' => set_value('email'),
            'createdate' => set_value('createdate'),
            'aprove' => set_value('aprove'),
            'id_villages' => set_value('id_villages'),
        );
        $this->template->load('template', 'public_user/public_user_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            
            $this->create();
        } else {
            $data = array(
                'NIK' => $this->input->post('NIK', TRUE),
                'name' => $this->input->post('name', TRUE),
                'address' => $this->input->post('address', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'email' => $this->input->post('email', TRUE),
                'createdate' => $this->input->post('createdate', TRUE),
                'aprove' => $this->input->post('aprove', TRUE),
                'id_villages' => $this->input->post('id_villages', TRUE),
            );

            print_r($data);
            $this->Public_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('public_user'));
        }
    }

    public function update($id)
    {
        $row = $this->Public_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('public_user/update_action'),
                'id1' => set_value('id1', $row->id1),
                'NIK' => set_value('NIK', $row->NIK),
                'name' => set_value('name', $row->name),
                'address' => set_value('address', $row->address),
                'phone' => set_value('phone', $row->phone),
                'email' => set_value('email', $row->email),
                'createdate' => set_value('createdate', $row->createdate),
                'aprove' => set_value('aprove', $row->aprove),
                'id_villages' => set_value('id_villages', $row->id_villages),
            );
            $this->template->load('template', 'public_user/public_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('public_user'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id1', TRUE));
        } else {
            $data = array(
                'NIK' => $this->input->post('NIK', TRUE),
                'name' => $this->input->post('name', TRUE),
                'address' => $this->input->post('address', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'email' => $this->input->post('email', TRUE),
                'createdate' => $this->input->post('createdate', TRUE),
                'aprove' => $this->input->post('aprove', TRUE),
                'id_villages' => $this->input->post('id_villages', TRUE),
            );

            $this->Public_user_model->update($this->input->post('id1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('public_user'));
        }
    }

    public function delete($id)
    {
        $row = $this->Public_user_model->get_by_id($id);

        if ($row) {
            $this->Public_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('public_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('public_user'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('NIK', 'nik', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('createdate', 'createdate', 'trim|required');
        $this->form_validation->set_rules('aprove', 'aprove', 'trim|required');
        $this->form_validation->set_rules('id_villages', 'id villages', 'trim|required');

        $this->form_validation->set_rules('id1', 'id1', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "public_user.xls";
        $judul = "public_user";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "NIK");
        xlsWriteLabel($tablehead, $kolomhead++, "Name");
        xlsWriteLabel($tablehead, $kolomhead++, "Address");
        xlsWriteLabel($tablehead, $kolomhead++, "Phone");
        xlsWriteLabel($tablehead, $kolomhead++, "Email");
        xlsWriteLabel($tablehead, $kolomhead++, "Createdate");
        xlsWriteLabel($tablehead, $kolomhead++, "Aprove");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Villages");

        foreach ($this->Public_user_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->NIK);
            xlsWriteLabel($tablebody, $kolombody++, $data->name);
            xlsWriteLabel($tablebody, $kolombody++, $data->address);
            xlsWriteLabel($tablebody, $kolombody++, $data->phone);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteLabel($tablebody, $kolombody++, $data->createdate);
            xlsWriteLabel($tablebody, $kolombody++, $data->aprove);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_villages);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Public_user.php */
/* Location: ./application/controllers/Public_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:48:33 */
/* http://harviacode.com */