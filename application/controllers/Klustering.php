<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Klustering extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Saltland_atribute_model');
    }

    public function index() {
        $all_data = $this->Saltland_atribute_model->get_klustering_data();
        $centroid = [
            $all_data[0],
            $all_data[6],
            $all_data[5]
        ];
        $hasil = $this->hitung_kluster($all_data, $centroid);
        
        $data = array('data' => $all_data, 'centroid' => $centroid, 'hasil' => $hasil);
        
        $this->template->load('template', 'klustering/index', $data);
    }

    public function ajax_hitung_kluster(){
        $jumlah_perulangan = $_GET['jumlah_perulangan'];
        $jumlah_centroid = $_GET['jumlah_centroid'];
        $all_data = $this->Saltland_atribute_model->get_klustering_data();
        $hasil = [];
        // $centroid = $this->tentukan_centroid($jumlah_centroid); //random centroid
        $centroid = [
            $all_data[0],
            $all_data[6],
            $all_data[5]
        ];
        for ($i=0; $i < $jumlah_perulangan; $i++) {
            $hasil_kluster = $this->hitung_kluster($all_data, $centroid);
            $perulanga_ke = 'perulangan_ke_' . $i+1;
            if($i > 0){
                $centroid = $this->update_centroid($hasil_kluster, count($centroid));
                $hasil_kluster = $this->hitung_kluster($all_data, $centroid);
                array_push($hasil, array($perulanga_ke => $hasil_kluster, 'centroid' => $centroid));
            }else {
                array_push($hasil, array($perulanga_ke => $hasil_kluster, 'centroid' => $centroid));
            };
            
            $is_stop = $this->cek_kondisi_stop($hasil);
            if($is_stop){
                $tambah_keterangan = array_map(function($item) use ($i){
                    $item['keterangan'] = 'Tidak berubah pada perulangan ke '.$i+1;
                    return $item;
                }, $hasil[count($hasil)-1][$perulanga_ke]);
                $hasil[count($hasil)-1][$perulanga_ke] = $tambah_keterangan;
                break;
            }
        };

        header('Content-Type: application/json');
        echo json_encode(array(
            'jumlah_centroid' => $jumlah_centroid, 
            'centroid' => $centroid, 
            'hasil' => $hasil
        ));
    }

    public function cek_kondisi_stop($hasil)
    {
        $is_stop = false;
        $clusters = []; 
        for ($i=0; $i < count($hasil); $i++) { 
            $perulanga_ke = 'perulangan_ke_' . $i+1;
            $data = $hasil[$i][$perulanga_ke];
            $cluster = array_map(function($item){
                return $item['cluster'];
            }, $data);
            array_push($clusters, $cluster);
        }
        $first_clusters = $clusters[0];
        for ($j=1; $j < count($clusters); $j++) {
            try {
                $diff = array_diff($first_clusters, $clusters[$j]);
                if(count($diff)){
                    $first_clusters = $clusters[$j];
                }else {
                    $is_stop = true;
                    break;
                }
            } catch (\Throwable $th) {
                throw $th;
            } 
        }

        return $is_stop;
    }

    public function update_centroid($hasil_kluster, $panjang_centroid)
    {
        $new_centroid = [];
        for ($i=0; $i < $panjang_centroid; $i++) { 
            $cluster = 'C'.$i+1;
            $jumlah_per_cluster = 0;
            $total_luas_lahan = 0;
            $total_kapasitas_gudang = 0;
            for ($j=0; $j < count($hasil_kluster); $j++) {
                $item = $hasil_kluster[$j]; 
                if($item['cluster'] === $cluster){
                    $total_luas_lahan += $item['luas_lahan'];
                    $total_kapasitas_gudang += $item['kapasitas_gudang'];
                    $jumlah_per_cluster += 1;
                }
            }
            $luas_lahan_baru = $total_luas_lahan / $jumlah_per_cluster;
            $kapasitas_gudang_baru = $total_kapasitas_gudang / $jumlah_per_cluster;
            $filtered = array(
                'luas_lahan' => $luas_lahan_baru, 
                'kapasitas_gudang' => $kapasitas_gudang_baru
            );
            array_push($new_centroid, $filtered);
        }

        return $new_centroid;
    }

    public function tentukan_centroid($jumlah_centroid)
    {
        $all_data = $this->Saltland_atribute_model->get_klustering_data();
        $random_indexs = array_rand($all_data, $jumlah_centroid);        
        $centroid = [];
        
        foreach ($random_indexs as $key => $value) {
            array_push($centroid, $all_data[$value]);
        };

        return $centroid;
    }

    public function rumus($luas_lahan_asli, $luas_lahan_cen, $kapasitas_gudang_asli, $kapasitas_gudang_cen)
    {
        return sqrt(
            pow($luas_lahan_asli - $luas_lahan_cen, 2) + 
            pow($kapasitas_gudang_asli - $kapasitas_gudang_cen, 2)
        );
    }

    public function hitung_kluster($data, $centroid){
        $hasil = [];
        foreach ($centroid as $key => $cen_val) {
            $luas_lahan_cen = $cen_val['luas_lahan'];
            $kapasitas_gudang_cen = $cen_val['kapasitas_gudang'];
            $hasil["C".($key+1).""] = [];
            foreach ($data as $key_data => $data_val) {
                $luas_lahan_asli = $data_val['luas_lahan'];
                $kapasitas_gudang_asli = $data_val['kapasitas_gudang'];
                $calculate = $this->rumus($luas_lahan_asli, $luas_lahan_cen, $kapasitas_gudang_asli, $kapasitas_gudang_cen);
                array_push($hasil["C".($key+1).""], $calculate);
            };
        };
        $format_per_desa = array_map(function($item) use ($hasil){
            $current = $item;
            $current['kluster'] = [];
            static $index = 0;
            foreach ($hasil as $key => $has_val) {
                $current['kluster'][$key] = 0;
            };
            foreach ($hasil as $key => $has_val) {
               $current['kluster'][$key] = number_format($has_val[$index], 2, '.', '');
            };
            $min_kluster = min($current['kluster']);
            $find_cluster =  array_search($min_kluster, $current['kluster']);
            $current['minimum'] = $min_kluster;
            $current['cluster'] = $find_cluster;
            $index++;
            return $current;
        }, $data);
        
        return $format_per_desa;
    }
}
