<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Villages extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Villages_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'villages/villages_list');
    }
    public function add_ajax_vil($id)
    {
        // $prov_id = $this->Provinces_model->GET;
        $query = $this->Villages_model->get_by_districts($id);
        $data = "<option disabled selected>-Select Villages- </option>";
        print_r($query);
        foreach ($query as $villages) {
            $data .= "<option value='$villages->id'>$villages->name</option>";
        }
        echo $data;
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Villages_model->json();
    }

    public function read($id)
    {
        $row = $this->Villages_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'district_id' => $row->district_id,
                'name' => $row->name,
            );
            $this->template->load('template', 'villages/villages_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('villages'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('villages/create_action'),
            'id' => set_value('id'),
            'district_id' => set_value('district_id'),
            'name' => set_value('name'),
        );
        $this->template->load('template', 'villages/villages_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'district_id' => $this->input->post('district_id', TRUE),
                'name' => $this->input->post('name', TRUE),
            );

            $this->Villages_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('villages'));
        }
    }

    public function update($id)
    {
        $row = $this->Villages_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('villages/update_action'),
                'id' => set_value('id', $row->id),
                'district_id' => set_value('district_id', $row->district_id),
                'name' => set_value('name', $row->name),
            );
            $this->template->load('template', 'villages/villages_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('villages'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'district_id' => $this->input->post('district_id', TRUE),
                'name' => $this->input->post('name', TRUE),
            );

            $this->Villages_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('villages'));
        }
    }

    public function delete($id)
    {
        $row = $this->Villages_model->get_by_id($id);

        if ($row) {
            $this->Villages_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('villages'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('villages'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('district_id', 'district id', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "villages.xls";
        $judul = "villages";
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
        xlsWriteLabel($tablehead, $kolomhead++, "District Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Name");

        foreach ($this->Villages_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->district_id);
            xlsWriteLabel($tablebody, $kolombody++, $data->name);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Villages.php */
/* Location: ./application/controllers/Villages.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:49:33 */
/* http://harviacode.com */