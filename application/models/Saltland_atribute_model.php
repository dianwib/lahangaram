<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saltland_atribute_model extends CI_Model
{

    public $table = 'saltland_atribute';
    public $id = 'id1';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('saltland_atribute.id1 as id1,id_saltland, matribut.atribut as atribut,value1,createdate, saltland.id_village, saltland.idmap as idmap, villages.name as village,');
        $this->datatables->from('saltland_atribute');
        $this->datatables->join('saltland', 'saltland.id1 = id_saltland');
        $this->datatables->join('villages', 'villages.id = saltland.id_village');
        $this->datatables->join('matribut', 'matribut.id1 = id_atribut');

        if ($this->session->userdata('id_user_level') == 4) {
            $this->datatables->like('saltland.id_village', $this->session->userdata('id_regency'), 'after');
        }
        //add this line for join
        $this->datatables->add_column('action', anchor(site_url('saltland_atribute/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-xs', 'target' => '_blank'))." 
            ".anchor(site_url('saltland_atribute/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-xs'))." 
                ".anchor(site_url('saltland_atribute/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id1');
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
	$this->db->or_like('id_saltland', $q);
	$this->db->or_like('id_atribut', $q);
	$this->db->or_like('value1', $q);
	$this->db->or_like('createdate', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id1', $q);
	$this->db->or_like('id_saltland', $q);
	$this->db->or_like('id_atribut', $q);
	$this->db->or_like('value1', $q);
	$this->db->or_like('createdate', $q);
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

    function get_klustering_data(){
        $data_lahan = $this->db->query("SELECT 
            value1 AS val, 
            villages.name AS desa
            FROM
            `saltland_atribute`
            JOIN matribut ON matribut.id1 = saltland_atribute.id_atribut
            JOIN saltland ON saltland_atribute.id_saltland = saltland.id1
            JOIN villages ON saltland.id_village = villages.id
            WHERE
                id_atribut = 17"
        )->result_array();
        $data_kapasitas_gudang = $this->db->query("SELECT 
            value1 AS val, 
            villages.name AS desa
            FROM
            `saltland_atribute`
            JOIN matribut ON matribut.id1 = saltland_atribute.id_atribut
            JOIN saltland ON saltland_atribute.id_saltland = saltland.id1
            JOIN villages ON saltland.id_village = villages.id
            WHERE
                id_atribut = 20"
        )->result_array();
        $desa = array_map(function($item){
            return $item['desa'];
        }, $data_lahan);
        $unique_desa = array_unique($desa);

        $categoried_data = [];
        foreach ($unique_desa as $key => $value) {
            $lahans = array_map(function($item) use ($value){
                if($item['desa'] === $value){
                    return (int)$item['val'];
                }
            }, $data_lahan);
            $gudangs = array_map(function($item) use ($value){
                if($item['desa'] === $value){
                    return (int)$item['val'];
                }
            }, $data_kapasitas_gudang);
            array_push($categoried_data, array('desa' => $value, 'lahans' => $lahans, 'gudangs' => $gudangs));
        };

        $data = array_map(function($item){
            $luas_lahan = array_reduce($item['lahans'], function($prev, $curr){
                $prev += $curr;
                return $prev;
            });
            $kapasitas_gudang = array_reduce($item['gudangs'], function($prev, $curr){
                $prev += $curr;
                return $prev;
            });
            return array('desa' => $item['desa'], 'luas_lahan' => $luas_lahan, 'kapasitas_gudang' => $kapasitas_gudang);
        }, $categoried_data);

        return $data;
    }

}

/* End of file Saltland_atribute_model.php */
/* Location: ./application/models/Saltland_atribute_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:48:48 */
/* http://harviacode.com */