<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Matribut extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Matribut_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/matribut/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/matribut/index/';
            $config['first_url'] = base_url() . 'index.php/matribut/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Matribut_model->total_rows($q);
        $matribut = $this->Matribut_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'matribut_data' => $matribut,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','matribut/matribut_list', $data);
    }

    public function add_ajax()
    {
        $query = $this->Matribut_model->get_all();
        $data = "<option disabled selected>-Select Attribut- </option>";
        // print_r($query);
        foreach ($query as $att) {
            $data .= "<option value='$att->id1'>$att->atribut</option>";
        }
        echo $data;
    }


    public function read($id) 
    {
        $row = $this->Matribut_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id1' => $row->id1,
		'atribut' => $row->atribut,
		'unit' => $row->unit,
		'note' => $row->note,
	    );
            $this->template->load('template','matribut/matribut_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matribut'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('matribut/create_action'),
	    'id1' => set_value('id1'),
	    'atribut' => set_value('atribut'),
	    'unit' => set_value('unit'),
	    'note' => set_value('note'),
	);
        $this->template->load('template','matribut/matribut_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'atribut' => $this->input->post('atribut',TRUE),
		'unit' => $this->input->post('unit',TRUE),
		'note' => $this->input->post('note',TRUE),
	    );

            $this->Matribut_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('matribut'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Matribut_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('matribut/update_action'),
		'id1' => set_value('id1', $row->id1),
		'atribut' => set_value('atribut', $row->atribut),
		'unit' => set_value('unit', $row->unit),
		'note' => set_value('note', $row->note),
	    );
            $this->template->load('template','matribut/matribut_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matribut'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id1', TRUE));
        } else {
            $data = array(
		'atribut' => $this->input->post('atribut',TRUE),
		'unit' => $this->input->post('unit',TRUE),
		'note' => $this->input->post('note',TRUE),
	    );

            $this->Matribut_model->update($this->input->post('id1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('matribut'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Matribut_model->get_by_id($id);

        if ($row) {
            $this->Matribut_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('matribut'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matribut'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('atribut', 'atribut', 'trim|required');
	$this->form_validation->set_rules('unit', 'unit', 'trim|required');
	$this->form_validation->set_rules('note', 'note', 'trim|required');

	$this->form_validation->set_rules('id1', 'id1', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "matribut.xls";
        $judul = "matribut";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Atribut");
	xlsWriteLabel($tablehead, $kolomhead++, "Unit");
	xlsWriteLabel($tablehead, $kolomhead++, "Note");

	foreach ($this->Matribut_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->atribut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->note);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Matribut.php */
/* Location: ./application/controllers/Matribut.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:49:25 */
/* http://harviacode.com */