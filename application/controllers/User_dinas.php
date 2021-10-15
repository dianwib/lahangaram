<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_dinas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_dinas_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'user_dinas/user_dinas_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->User_dinas_model->json();
    }

    public function read($id)
    {
        $row = $this->User_dinas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id1' => $row->id1,
                'NIK' => $row->NIK,
                'name' => $row->name,
                'adress' => $row->adress,
                'phone' => $row->phone,
                'email' => $row->email,
                'create_date' => $row->create_date,
                'aprove' => $row->aprove,
                'id_regencies' => $row->id_regencies,
            );
            $this->template->load('template', 'user_dinas/user_dinas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_dinas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user_dinas/create_action'),
            'id1' => set_value('id1'),
            'NIK' => set_value('NIK'),
            'name' => set_value('name'),
            'adress' => set_value('adress'),
            'phone' => set_value('phone'),
            'email' => set_value('email'),
            'create_date' => set_value('create_date'),
            'aprove' => set_value('aprove'),
            'id_regencies' => set_value('id_regencies'),
        );
        //print_r($this->session->userdata);
        $this->template->load('template', 'user_dinas/user_dinas_form', $data);
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
                'adress' => $this->input->post('adress', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'email' => $this->input->post('email', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
                'aprove' => $this->input->post('aprove', TRUE),
                'id_regencies' => $this->input->post('id_regencies', TRUE),
            );

            $this->User_dinas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('user_dinas'));
        }
    }

    public function update($id)
    {
        $row = $this->User_dinas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user_dinas/update_action'),
                'id1' => set_value('id1', $row->id1),
                'NIK' => set_value('NIK', $row->NIK),
                'name' => set_value('name', $row->name),
                'adress' => set_value('adress', $row->adress),
                'phone' => set_value('phone', $row->phone),
                'email' => set_value('email', $row->email),
                'create_date' => set_value('create_date', $row->create_date),
                'aprove' => set_value('aprove', $row->aprove),
                'id_regencies' => set_value('id_regencies', $row->id_regencies),
            );
            $this->template->load('template', 'user_dinas/user_dinas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_dinas'));
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
                'adress' => $this->input->post('adress', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'email' => $this->input->post('email', TRUE),
                'create_date' => $this->input->post('create_date', TRUE),
                'aprove' => $this->input->post('aprove', TRUE),
                'id_regencies' => $this->input->post('id_regencies', TRUE),
            );

            $this->User_dinas_model->update($this->input->post('id1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user_dinas'));
        }
    }

    public function delete($id)
    {
        $row = $this->User_dinas_model->get_by_id($id);

        if ($row) {
            $this->User_dinas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user_dinas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_dinas'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('NIK', 'nik', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('adress', 'adress', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('create_date', 'create date', 'trim|required');
        $this->form_validation->set_rules('aprove', 'aprove', 'trim|required');
        $this->form_validation->set_rules('id_regencies', 'id regencies', 'trim|required');

        $this->form_validation->set_rules('id1', 'id1', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user_dinas.xls";
        $judul = "user_dinas";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Adress");
        xlsWriteLabel($tablehead, $kolomhead++, "Phone");
        xlsWriteLabel($tablehead, $kolomhead++, "Email");
        xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Aprove");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Regencies");

        foreach ($this->User_dinas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->NIK);
            xlsWriteLabel($tablebody, $kolombody++, $data->name);
            xlsWriteLabel($tablebody, $kolombody++, $data->adress);
            xlsWriteLabel($tablebody, $kolombody++, $data->phone);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteLabel($tablebody, $kolombody++, $data->create_date);
            xlsWriteLabel($tablebody, $kolombody++, $data->aprove);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_regencies);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file User_dinas.php */
/* Location: ./application/controllers/User_dinas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:48:56 */
/* http://harviacode.com */