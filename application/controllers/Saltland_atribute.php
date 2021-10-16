<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saltland_atribute extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Saltland_atribute_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','saltland_atribute/saltland_atribute_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Saltland_atribute_model->json();
    }

    public function read($id) 
    {
        $row = $this->Saltland_atribute_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id1' => $row->id1,
              'id_saltland' => $row->id_saltland,
              'id_atribut' => $row->id_atribut,
              'value1' => $row->value1,
              'createdate' => $row->createdate,
          );
            $this->template->load('template','saltland_atribute/saltland_atribute_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saltland_atribute'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('saltland_atribute/create_action'),
            'id1' => set_value('id1'),
            'id_saltland' => set_value('id_saltland'),
            'id_atribut' => set_value('id_atribut'),
            'value1' => set_value('value1'),
            'createdate' => set_value('createdate'),
        );
        $this->template->load('template','saltland_atribute/saltland_atribute_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'id_saltland' => $this->input->post('id_saltland',TRUE),
              'id_atribut' => $this->input->post('id_atribut',TRUE),
              'value1' => $this->input->post('value1',TRUE),
              'createdate' => $this->input->post('createdate',TRUE),
          );

            $this->Saltland_atribute_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('saltland_atribute'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Saltland_atribute_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('saltland_atribute/update_action'),
                'id1' => set_value('id1', $row->id1),
                'id_saltland' => set_value('id_saltland', $row->id_saltland),
                'id_atribut_edit' => set_value('id_atribut', $row->id_atribut),
                'value1' => set_value('value1', $row->value1),
                'createdate' => set_value('createdate', $row->createdate),
            );
            $this->template->load('template','saltland_atribute/saltland_atribute_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saltland_atribute'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id1', TRUE));
        } else {
            $data = array(
              'id_saltland' => $this->input->post('id_saltland',TRUE),
              'id_atribut' => $this->input->post('id_atribut',TRUE),
              'value1' => $this->input->post('value1',TRUE),
              'createdate' => $this->input->post('createdate',TRUE),
          );

            $this->Saltland_atribute_model->update($this->input->post('id1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('saltland_atribute'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Saltland_atribute_model->get_by_id($id);

        if ($row) {
            $this->Saltland_atribute_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('saltland_atribute'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saltland_atribute'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('id_saltland', 'id saltland', 'trim|required');
       $this->form_validation->set_rules('id_atribut', 'id atribut', 'trim|required');
       $this->form_validation->set_rules('value1', 'value1', 'trim|required');
       $this->form_validation->set_rules('createdate', 'createdate', 'trim|required');

       $this->form_validation->set_rules('id1', 'id1', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function excel()
   {
    $this->load->helper('exportexcel');
    $namaFile = "saltland_atribute.xls";
    $judul = "saltland_atribute";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Id Saltland");
    xlsWriteLabel($tablehead, $kolomhead++, "Id Atribut");
    xlsWriteLabel($tablehead, $kolomhead++, "Value1");
    xlsWriteLabel($tablehead, $kolomhead++, "Createdate");

    foreach ($this->Saltland_atribute_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->id_saltland);
        xlsWriteNumber($tablebody, $kolombody++, $data->id_atribut);
        xlsWriteLabel($tablebody, $kolombody++, $data->value1);
        xlsWriteLabel($tablebody, $kolombody++, $data->createdate);

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}

}

/* End of file Saltland_atribute.php */
/* Location: ./application/controllers/Saltland_atribute.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:48:48 */
/* http://harviacode.com */