<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_dinas_model extends CI_Model
{

    public $table = 'user_dinas';
    public $id = 'id1';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id1,NIK,name,adress,phone,email,create_date,aprove,id_regencies');
        $this->datatables->from('user_dinas');
        //add this line for join
        //$this->datatables->join('table2', 'user_dinas.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('user_dinas/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-xs', 'target' => '_blank'))." 
            ".anchor(site_url('user_dinas/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-xs'))." 
                ".anchor(site_url('user_dinas/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id1');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id1', $q);
	$this->db->or_like('NIK', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('adress', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('create_date', $q);
	$this->db->or_like('aprove', $q);
	$this->db->or_like('id_regencies', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id1', $q);
	$this->db->or_like('NIK', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('adress', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('create_date', $q);
	$this->db->or_like('aprove', $q);
	$this->db->or_like('id_regencies', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file User_dinas_model.php */
/* Location: ./application/models/User_dinas_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:48:56 */
/* http://harviacode.com */