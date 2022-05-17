<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saltland_model extends CI_Model
{

    public $table = 'saltland';
    public $id = 'id1';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id1, id_village ,villages.name as village,lat,lng,idmap');
        $this->datatables->from('saltland');
        //add this line for join
        $this->datatables->join('villages', 'villages.id = saltland.id_village');

        if ($this->session->userdata('id_user_level') == 4) {
            $this->datatables->like('saltland.id_village', $this->session->userdata('id_regency'), 'after');
        }

        $this->datatables->add_column('action', anchor(site_url('saltland/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-xs', 'target' => '_blank')) . " 
            " . anchor(site_url('saltland/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-xs')) . " 
                " . anchor(site_url('saltland/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id1');
        //var_dump($this->datatables->generate());
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all JPOIN VILLAGe
    function get_all2()
    {
        // $this->db->order_by($this->id, $this->order);
        $this->db->select('saltland.*, villages.name as village')
            ->from('saltland')
            ->join('villages', 'villages.id = saltland.id_village');

        if ($this->session->userdata('id_user_level') == 4) {
            $this->datatables->like('saltland.id_village', $this->session->userdata('id_regency'), 'after');
        }
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id1', $q);
        $this->db->or_like('id_village', $q);
        $this->db->or_like('lat', $q);
        $this->db->or_like('lng', $q);
        $this->db->or_like('idmap', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id1', $q);
        $this->db->or_like('id_village', $q);
        $this->db->or_like('lat', $q);
        $this->db->or_like('lng', $q);
        $this->db->or_like('idmap', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        print_r($data);
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

    function get_saltland_from_map($kode)
    {
        return $this->db->query("
        select s.lat,s.lng,s.idmap, so.contact,so.name pemilik_so, so.address alamat_pemilik,v.name desa, d.name kec, r.name kab, 
        (select sa.value1 from saltland_atribute sa join matribut m on m.id1 = sa.id_atribut AND m.atribut = 'lokasi lahan' WHERE sa.id_saltland = s.id1 GROUP BY sa.id_saltland) as lokasi,
        (select sa.value1 from saltland_atribute sa join matribut m on m.id1 = sa.id_atribut AND m.atribut = 'luas lahan' WHERE sa.id_saltland = s.id1 GROUP BY sa.id_saltland) as luas,
        (select sa.value1 from saltland_atribute sa join matribut m on m.id1 = sa.id_atribut AND m.atribut = 'hasil produksi' WHERE sa.id_saltland = s.id1 GROUP BY sa.id_saltland) as hasil,
        (select sa.value1 from saltland_atribute sa join matribut m on m.id1 = sa.id_atribut AND m.atribut = 'tenaga kerja' WHERE sa.id_saltland = s.id1 GROUP BY sa.id_saltland) as tenaga,
        (select sa.value1 from saltland_atribute sa join matribut m on m.id1 = sa.id_atribut AND m.atribut = 'modal' WHERE sa.id_saltland = s.id1 GROUP BY sa.id_saltland) as modal,
        (select sa.value1 from saltland_atribute sa join matribut m on m.id1 = sa.id_atribut AND m.atribut = 'pemilik lahan' WHERE sa.id_saltland = s.id1 GROUP BY sa.id_saltland) as pemilik_sa
        from saltland s
        left join satland_owner so on so.id_saltland = s.id1
        join villages v on v.id = s.id_village
        join districts d on d.id= v.district_id
        join regencies r on r.id = d.regency_id
    
        WHERE s.id_village = '{$kode}'
        group by s.id1")->result();
    }

    function get_all_desa_saltland_from_map($kab = 'SUMENEP')
    {
        return $this->db->query("
        select * from saltland")->result();
    }
}

/* End of file Saltland_model.php */
/* Location: ./application/models/Saltland_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 08:49:58 */
/* http://harviacode.com */