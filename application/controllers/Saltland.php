<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saltland extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Saltland_model');
        $this->load->model('Provinces_model');
        $this->load->model('Regencies_model');
        $this->load->model('Districts_model');
        $this->load->model('Villages_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'saltland/saltland_list');
    }

    public function add_ajax()
    {
        $query = $this->Saltland_model->get_all2();
        $data = "<option disabled selected>-Select Saltland- </option>";
        // print_r($query);
        foreach ($query as $att) {
            $data .= "<option value='$att->id1'>idmap : $att->idmap ~ $att->village</option>";
        }
        echo $data;
    }

    public function add_ajax_prov()
    {
        $query = $this->Provinces_model->get_all();
        $data = "<option disabled selected>-Select Provinces- </option>";
        foreach ($query as $province) {
            $data .= "<option value='$province->id'>$province->name</option>";
        }
        echo $data;
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
    public function add_ajax_dis($id)
    {
        // $prov_id = $this->Provinces_model->GET;
        $query = $this->Districts_model->get_by_regencies($id);
        $data = "<option disabled selected>-Select Districts- </option>";
        print_r($query);
        foreach ($query as $districs) {
            $data .= "<option value='$districs->id'>$districs->name</option>";
        }
        echo $data;
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
        //var_dump($this->Saltland_model->json());
        header('Content-Type: application/json');
        echo $this->Saltland_model->json();
    }

    public function read($id)
    {
        $row = $this->Saltland_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id1' => $row->id1,
                'id_village' => $row->id_village,
                'lat' => $row->lat,
                'lng' => $row->lng,
                'idmap' => $row->idmap,
            );
            $this->template->load('template', 'saltland/saltland_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saltland'));
        }
    }

    public function create()
    {

        $data = array(
            'button' => 'Create',
            'action' => site_url('saltland/create_action'),
            'id1' => set_value('id1'),
            'id_villages' => set_value('id_villages'),
            'lat' => set_value('lat'),
            'lng' => set_value('lng'),
            'idmap' => set_value('idmap'),
        );


        //print_r($this->session->userdata);
        $this->template->load('template', 'saltland/saltland_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id1' => $this->input->post('id1', TRUE),
                'id_village' => $this->input->post('id_villages', TRUE),
                'lat' => $this->input->post('lat', TRUE),
                'lng' => $this->input->post('lng', TRUE),
                'idmap' => $this->input->post('idmap', TRUE),
            );
            $this->Saltland_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('saltland'));
        }
    }

    public function update($id)
    {
        $row = $this->Saltland_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('saltland/update_action'),
                'id1' => set_value('id1', $row->id1),
                'id_village' => set_value('id_village', $row->id_village),
                'lat' => set_value('lat', $row->lat),
                'lng' => set_value('lng', $row->lng),
                'idmap' => set_value('idmap', $row->idmap),
            );
            $this->template->load('template', 'saltland/saltland_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saltland'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id1', TRUE));
        } else {
            $data = array(
                'id_village' => $this->input->post('id_village', TRUE),
                'lat' => $this->input->post('lat', TRUE),
                'lng' => $this->input->post('lng', TRUE),
                'idmap' => $this->input->post('idmap', TRUE),
            );

            $this->Saltland_model->update($this->input->post('id1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('saltland'));
        }
    }

    public function delete($id)
    {
        $row = $this->Saltland_model->get_by_id($id);

        if ($row) {
            $this->Saltland_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('saltland'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saltland'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_villages', 'id villages', 'trim|required');
        $this->form_validation->set_rules('lat', 'lat', 'trim|required');
        $this->form_validation->set_rules('lng', 'lng', 'trim|required');
        $this->form_validation->set_rules('idmap', 'idmap', 'trim|required');

        //$this->form_validation->set_rules('id1', 'id1', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "saltland.xls";
        $judul = "saltland";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Id Village");
        xlsWriteLabel($tablehead, $kolomhead++, "Lat");
        xlsWriteLabel($tablehead, $kolomhead++, "Lng");
        xlsWriteLabel($tablehead, $kolomhead++, "Idmap");

        foreach ($this->Saltland_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_village);
            xlsWriteLabel($tablebody, $kolombody++, $data->lat);
            xlsWriteLabel($tablebody, $kolombody++, $data->lng);
            xlsWriteLabel($tablebody, $kolombody++, $data->idmap);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function map(){
       $this->template->load('template', 'auth/maps - Copy');
       // $this->load->view('auth/maps');

   }
}

/* End of file Saltland.php */
/* Location: ./application/controllers/Saltland.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:49:58 */
/* http://harviacode.com */