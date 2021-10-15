<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pph_sap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pph_sap_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }
    
    public function importxls_post()
    {
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('upload');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect(base_url().'index.php/pph_sap/importxls');

        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('upload/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();
			$error = array();
            $numrow = 1;
            $numinsert = 0;
            $numupdate = 0;
            foreach($sheet as $row){
				if($numrow > 1){
					array_push($data, array(
						'document_number' => $row['A'],
						'year_month' => $row['B'],	
						'posting_key' => isset($row['C'])?$row['C']:'',	
						'document_header_text' =>isset($row['D'])?$row['D']:'',		
						'account' => isset($row['E'])?$row['E']:'',	
						'acct_name' => $row['F'],	
						'profit_center' => $row['G'],	
						'document_date' => $row['H'],	
						'posting_date' => $row['I'],	
						'text' => $row['J'],	
						'reference' => $row['K'],	
						'amount_in_lc' => $row['L'],	
						'vendor' => $row['M'],	
						'name_cust_ven' => $row['N'],	
						'reversed_with' => $row['O'],	
						'cost_center' => isset($row['P'])?$row['P']:'',	
						'user_name' => isset($row['Q'])?$row['Q']:'',
						'entry_date' => isset($row['R'])?$row['R']:'',

					));
				}
				if(($row['A'] == '')or($row['C'] == '')or($row['E'] == ''))
				{
					array_push($error, array(
							'numrow' => $numrow,
							'document_number' => $row['A'],
							'posting_key' => $row['C'],	
							'account' => $row['E'],	
						));
				}else
				{				
					//insert row by row
					$sql = "select F_insert_pph_sap(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) as a";
					$result = $this->db->query($sql, array(
								isset($row['A'])?$row['A']:'',
								isset($row['B'])?$row['B']:'',
								isset($row['C'])?$row['C']:'',
								isset($row['D'])?$row['D']:'',
								isset($row['E'])?$row['E']:'',
								isset($row['F'])?$row['F']:'',
								isset($row['G'])?$row['G']:'',
								isset($row['H'])?$row['H']:'',
								isset($row['I'])?$row['I']:'',
								isset($row['J'])?$row['J']:'',
								isset($row['K'])?$row['K']:'',
								isset($row['L'])?str_replace(',','',$row['L']):'',
								isset($row['M'])?$row['M']:'',
								isset($row['N'])?$row['N']:'',
								isset($row['O'])?$row['O']:'',
								isset($row['P'])?$row['P']:'',
								isset($row['Q'])?$row['Q']:'',
								isset($row['R'])?$row['R']:'',
									));
					echo $this->db->last_query().'<br>';
					$row = $result->row();
					$res1 = $row->a.'/';
					
					if(trim($res1)=='')
						$numinsert++;            
					elseif (trim($res1)=='update/')
						$numupdate++;
					else
						echo 'Line no:'.$numrow.'/'.$res1.'<br>';
				}
                $numrow++;
            }
            
            //$this->db->insert_batch('tbl_dosen', $data);
            
            
            //delete file from server
            unlink(realpath('upload/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', 
            '<div class="alert alert-success"><b>IMPORT Success! Number of imports:'.$numinsert.'
					Number of Update:'.$numupdate.'</b> 
            --!</div>');
            echo '<a href="'.base_url().'index.php/pph_sap/importxls">Back</a>';
            echo '<h4> error list</h4>';
            echo "<pre>".print_r($error,true)."</pre>";
            echo "<pre>".print_r($data,true)."</pre>";
            //redirect halaman
            //redirect('importxls/');
            echo '<a href="'.base_url().'index.php/pph_sap/importxls">Back</a>';
		}
	}
    
    public function importxls()
    {
        $this->template->load('template','pph_sap/pph_sap_import');
        //echo 'import';
    } 

    public function index()
    {
        $this->template->load('template','pph_sap/pph_sap_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pph_sap_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pph_sap_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id1' => $row->id1,
		'document_number' => $row->document_number,
		'year_month1' => $row->year_month1,
		'posting_key' => $row->posting_key,
		'document_header_text' => $row->document_header_text,
		'account' => $row->account,
		'acct_name' => $row->acct_name,
		'profit_center' => $row->profit_center,
		'document_date' => $row->document_date,
		'posting_date' => $row->posting_date,
		'text' => $row->text,
		'reference' => $row->reference,
		'amount_in_lc' => $row->amount_in_lc,
		'vendor' => $row->vendor,
		'name_cust_ven' => $row->name_cust_ven,
		'reversed_with' => $row->reversed_with,
		'cost_center' => $row->cost_center,
		'user_name' => $row->user_name,
		'entry_date' => $row->entry_date,
	    );
            $this->template->load('template','pph_sap/pph_sap_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pph_sap'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pph_sap/create_action'),
	    'id1' => set_value('id1'),
	    'document_number' => set_value('document_number'),
	    'year_month1' => set_value('year_month1'),
	    'posting_key' => set_value('posting_key'),
	    'document_header_text' => set_value('document_header_text'),
	    'account' => set_value('account'),
	    'acct_name' => set_value('acct_name'),
	    'profit_center' => set_value('profit_center'),
	    'document_date' => set_value('document_date'),
	    'posting_date' => set_value('posting_date'),
	    'text' => set_value('text'),
	    'reference' => set_value('reference'),
	    'amount_in_lc' => set_value('amount_in_lc'),
	    'vendor' => set_value('vendor'),
	    'name_cust_ven' => set_value('name_cust_ven'),
	    'reversed_with' => set_value('reversed_with'),
	    'cost_center' => set_value('cost_center'),
	    'user_name' => set_value('user_name'),
	    'entry_date' => set_value('entry_date'),
	);
        $this->template->load('template','pph_sap/pph_sap_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'document_number' => $this->input->post('document_number',TRUE),
		'year_month1' => $this->input->post('year_month1',TRUE),
		'posting_key' => $this->input->post('posting_key',TRUE),
		'document_header_text' => $this->input->post('document_header_text',TRUE),
		'account' => $this->input->post('account',TRUE),
		'acct_name' => $this->input->post('acct_name',TRUE),
		'profit_center' => $this->input->post('profit_center',TRUE),
		'document_date' => $this->input->post('document_date',TRUE),
		'posting_date' => $this->input->post('posting_date',TRUE),
		'text' => $this->input->post('text',TRUE),
		'reference' => $this->input->post('reference',TRUE),
		'amount_in_lc' => $this->input->post('amount_in_lc',TRUE),
		'vendor' => $this->input->post('vendor',TRUE),
		'name_cust_ven' => $this->input->post('name_cust_ven',TRUE),
		'reversed_with' => $this->input->post('reversed_with',TRUE),
		'cost_center' => $this->input->post('cost_center',TRUE),
		'user_name' => $this->input->post('user_name',TRUE),
		'entry_date' => $this->input->post('entry_date',TRUE),
	    );

            $this->Pph_sap_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pph_sap'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pph_sap_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pph_sap/update_action'),
		'id1' => set_value('id1', $row->id1),
		'document_number' => set_value('document_number', $row->document_number),
		'year_month1' => set_value('year_month1', $row->year_month1),
		'posting_key' => set_value('posting_key', $row->posting_key),
		'document_header_text' => set_value('document_header_text', $row->document_header_text),
		'account' => set_value('account', $row->account),
		'acct_name' => set_value('acct_name', $row->acct_name),
		'profit_center' => set_value('profit_center', $row->profit_center),
		'document_date' => set_value('document_date', $row->document_date),
		'posting_date' => set_value('posting_date', $row->posting_date),
		'text' => set_value('text', $row->text),
		'reference' => set_value('reference', $row->reference),
		'amount_in_lc' => set_value('amount_in_lc', $row->amount_in_lc),
		'vendor' => set_value('vendor', $row->vendor),
		'name_cust_ven' => set_value('name_cust_ven', $row->name_cust_ven),
		'reversed_with' => set_value('reversed_with', $row->reversed_with),
		'cost_center' => set_value('cost_center', $row->cost_center),
		'user_name' => set_value('user_name', $row->user_name),
		'entry_date' => set_value('entry_date', $row->entry_date),
	    );
            $this->template->load('template','pph_sap/pph_sap_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pph_sap'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id1', TRUE));
        } else {
            $data = array(
		'document_number' => $this->input->post('document_number',TRUE),
		'year_month1' => $this->input->post('year_month1',TRUE),
		'posting_key' => $this->input->post('posting_key',TRUE),
		'document_header_text' => $this->input->post('document_header_text',TRUE),
		'account' => $this->input->post('account',TRUE),
		'acct_name' => $this->input->post('acct_name',TRUE),
		'profit_center' => $this->input->post('profit_center',TRUE),
		'document_date' => $this->input->post('document_date',TRUE),
		'posting_date' => $this->input->post('posting_date',TRUE),
		'text' => $this->input->post('text',TRUE),
		'reference' => $this->input->post('reference',TRUE),
		'amount_in_lc' => $this->input->post('amount_in_lc',TRUE),
		'vendor' => $this->input->post('vendor',TRUE),
		'name_cust_ven' => $this->input->post('name_cust_ven',TRUE),
		'reversed_with' => $this->input->post('reversed_with',TRUE),
		'cost_center' => $this->input->post('cost_center',TRUE),
		'user_name' => $this->input->post('user_name',TRUE),
		'entry_date' => $this->input->post('entry_date',TRUE),
	    );

            $this->Pph_sap_model->update($this->input->post('id1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pph_sap'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pph_sap_model->get_by_id($id);

        if ($row) {
            $this->Pph_sap_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pph_sap'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pph_sap'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('document_number', 'document number', 'trim|required');
	$this->form_validation->set_rules('year_month1', 'year month1', 'trim|required');
	$this->form_validation->set_rules('posting_key', 'posting key', 'trim|required');
	$this->form_validation->set_rules('document_header_text', 'document header text', 'trim|required');
	$this->form_validation->set_rules('account', 'account', 'trim|required');
	$this->form_validation->set_rules('acct_name', 'acct name', 'trim|required');
	$this->form_validation->set_rules('profit_center', 'profit center', 'trim|required');
	$this->form_validation->set_rules('document_date', 'document date', 'trim|required');
	$this->form_validation->set_rules('posting_date', 'posting date', 'trim|required');
	$this->form_validation->set_rules('text', 'text', 'trim|required');
	$this->form_validation->set_rules('reference', 'reference', 'trim|required');
	$this->form_validation->set_rules('amount_in_lc', 'amount in lc', 'trim|required|numeric');
	$this->form_validation->set_rules('vendor', 'vendor', 'trim|required');
	$this->form_validation->set_rules('name_cust_ven', 'name cust ven', 'trim|required');
	$this->form_validation->set_rules('reversed_with', 'reversed with', 'trim|required');
	$this->form_validation->set_rules('cost_center', 'cost center', 'trim|required');
	$this->form_validation->set_rules('user_name', 'user name', 'trim|required');
	$this->form_validation->set_rules('entry_date', 'entry date', 'trim|required');

	$this->form_validation->set_rules('id1', 'id1', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    public function report()
    {
		$t = '<div style="width: 500px;height: 500px">
				<canvas id="myChart">ss</canvas>
			</div>';
		$t .= "aa";
		echo $t;
	}

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pph_sap.xls";
        $judul = "pph_sap";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Document Number");
	xlsWriteLabel($tablehead, $kolomhead++, "Year Month1");
	xlsWriteLabel($tablehead, $kolomhead++, "Posting Key");
	xlsWriteLabel($tablehead, $kolomhead++, "Document Header Text");
	xlsWriteLabel($tablehead, $kolomhead++, "Account");
	xlsWriteLabel($tablehead, $kolomhead++, "Acct Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Profit Center");
	xlsWriteLabel($tablehead, $kolomhead++, "Document Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Posting Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Text");
	xlsWriteLabel($tablehead, $kolomhead++, "Reference");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount In Lc");
	xlsWriteLabel($tablehead, $kolomhead++, "Vendor");
	xlsWriteLabel($tablehead, $kolomhead++, "Name Cust Ven");
	xlsWriteLabel($tablehead, $kolomhead++, "Reversed With");
	xlsWriteLabel($tablehead, $kolomhead++, "Cost Center");
	xlsWriteLabel($tablehead, $kolomhead++, "User Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Entry Date");

	foreach ($this->Pph_sap_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->document_number);
	    xlsWriteLabel($tablebody, $kolombody++, $data->year_month1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->posting_key);
	    xlsWriteLabel($tablebody, $kolombody++, $data->document_header_text);
	    xlsWriteLabel($tablebody, $kolombody++, $data->account);
	    xlsWriteLabel($tablebody, $kolombody++, $data->acct_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->profit_center);
	    xlsWriteLabel($tablebody, $kolombody++, $data->document_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->posting_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->text);
	    xlsWriteLabel($tablebody, $kolombody++, $data->reference);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount_in_lc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->vendor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name_cust_ven);
	    xlsWriteLabel($tablebody, $kolombody++, $data->reversed_with);
	    xlsWriteLabel($tablebody, $kolombody++, $data->cost_center);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->entry_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pph_sap.php */
/* Location: ./application/controllers/Pph_sap.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-16 17:10:20 */
/* http://harviacode.com */
