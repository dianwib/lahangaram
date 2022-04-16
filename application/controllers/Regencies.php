<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regencies extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Regencies_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'regencies/regencies_list');
    }
    public function add_ajax_reg($id)
    {
        // $prov_id = $this->Provinces_model->GET;
        $query = $this->Regencies_model->get_by_province($id);
        $data = "<option disabled selected>-Select Regencies- </option>";
        print_r($query);
        foreach ($query as $regencies) {
            $data .= "<option value='$regencies->id'>$regencies->name</option>";
        }
        echo $data;
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Regencies_model->json();
    }

    public function read($id)
    {
        $row = $this->Regencies_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'province_id' => $row->province_id,
                'name' => $row->name,
            );
            $this->template->load('template', 'regencies/regencies_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regencies'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('regencies/create_action'),
            'id' => set_value('id'),
            'province_id' => set_value('province_id'),
            'name' => set_value('name'),
        );
        $this->template->load('template', 'regencies/regencies_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'province_id' => $this->input->post('province_id', TRUE),
                'name' => $this->input->post('name', TRUE),
            );

            $this->Regencies_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('regencies'));
        }
    }

    public function update($id)
    {
        $row = $this->Regencies_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('regencies/update_action'),
                'id' => set_value('id', $row->id),
                'province_id' => set_value('province_id', $row->province_id),
                'name' => set_value('name', $row->name),
            );
            $this->template->load('template', 'regencies/regencies_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regencies'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'province_id' => $this->input->post('province_id', TRUE),
                'name' => $this->input->post('name', TRUE),
            );

            $this->Regencies_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('regencies'));
        }
    }

    public function delete($id)
    {
        $row = $this->Regencies_model->get_by_id($id);

        if ($row) {
            $this->Regencies_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('regencies'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regencies'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('province_id', 'province id', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "regencies.xls";
        $judul = "regencies";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Province Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Name");

        foreach ($this->Regencies_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->province_id);
            xlsWriteLabel($tablebody, $kolombody++, $data->name);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Regencies.php */
/* Location: ./application/controllers/Regencies.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:49:12 */
/* http://harviacode.com */