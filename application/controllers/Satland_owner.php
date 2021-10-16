<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Satland_owner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Satland_owner_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','satland_owner/satland_owner_list');
    } 
    
    public function json() {
        //var_dump($this->Saltland_owner_model->json());
        header('Content-Type: application/json');
        echo $this->Satland_owner_model->json();
    }

    public function read($id) 
    {
        $row = $this->Satland_owner_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id1' => $row->id1,
              'id_saltland' => $row->id_saltland,
              'date1' => $row->date1,
              'name' => $row->name,
              'address' => $row->address,
              'id_villages' => $row->idvillage,
              'contact' => $row->contact,
          );
            $this->template->load('template','satland_owner/satland_owner_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satland_owner'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('satland_owner/create_action'),
            'id1' => set_value('id1'),
            'id_saltland' => set_value('id_saltland'),
            'date1' => set_value('date1'),
            'name' => set_value('name'),
            'address' => set_value('address'),
            'idvillage' => set_value('id_villages'),
            'contact' => set_value('contact'),
        );
        $this->template->load('template','satland_owner/satland_owner_form', $data);
    }
    
    public function create_action() 
    {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'id_saltland' => $this->input->post('id_saltland',TRUE),
              'date1' => $this->input->post('date1',TRUE),
              'name' => $this->input->post('name',TRUE),
              'address' => $this->input->post('address',TRUE),
              'idvillage' => $this->input->post('id_villages',TRUE),
              'contact' => $this->input->post('contact',TRUE),
          );

            $this->Satland_owner_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('satland_owner'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Satland_owner_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('satland_owner/update_action'),
                'id1' => set_value('id1', $row->id1),
                'id_saltland' => set_value('id_saltland', $row->id_saltland),
                'date1' => set_value('date1', $row->date1),
                'name' => set_value('name', $row->name),
                'address' => set_value('address', $row->address),
                'id_districts' => set_value('id_districts', $row->idvillage ? substr($row->idvillage,0,7) : ''),
                'id_villages' => set_value('id_villages', $row->idvillage),
                'contact' => set_value('contact', $row->contact),
            );
            $this->template->load('template','satland_owner/satland_owner_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satland_owner'));
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
              'date1' => $this->input->post('date1',TRUE),
              'name' => $this->input->post('name',TRUE),
              'address' => $this->input->post('address',TRUE),
              'idvillage' => $this->input->post('idvillage',TRUE),
              'contact' => $this->input->post('contact',TRUE),
          );

            $this->Satland_owner_model->update($this->input->post('id1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('satland_owner'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Satland_owner_model->get_by_id($id);

        if ($row) {
            $this->Satland_owner_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('satland_owner'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satland_owner'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('id_saltland', 'id saltland', 'trim|required');
       $this->form_validation->set_rules('date1', 'date1', 'trim|required');
       $this->form_validation->set_rules('name', 'name', 'trim|required');
       $this->form_validation->set_rules('address', 'address', 'trim|required');
       $this->form_validation->set_rules('id_villages', 'id_villages', 'required');
       $this->form_validation->set_rules('contact', 'contact', 'trim|required');

       $this->form_validation->set_rules('id1', 'id1', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function excel()
   {
    $this->load->helper('exportexcel');
    $namaFile = "satland_owner.xls";
    $judul = "satland_owner";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Date1");
    xlsWriteLabel($tablehead, $kolomhead++, "Name");
    xlsWriteLabel($tablehead, $kolomhead++, "Address");
    xlsWriteLabel($tablehead, $kolomhead++, "Idvillage");
    xlsWriteLabel($tablehead, $kolomhead++, "Contact");

    foreach ($this->Satland_owner_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->id_saltland);
        xlsWriteLabel($tablebody, $kolombody++, $data->date1);
        xlsWriteLabel($tablebody, $kolombody++, $data->name);
        xlsWriteNumber($tablebody, $kolombody++, $data->address);
        xlsWriteLabel($tablebody, $kolombody++, $data->idvillage);
        xlsWriteLabel($tablebody, $kolombody++, $data->contact);

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}

}

/* End of file Satland_owner.php */
/* Location: ./application/controllers/Satland_owner.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:49:43 */
/* http://harviacode.com */