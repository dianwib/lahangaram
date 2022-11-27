<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">KLUSTERING</h3>
                    </div>
                    <div style="float: right; padding: 2rem;">
                        <form id="centroid-form" style="display: flex;">
                            <div>
                                <div>
                                    <label for="jumlah_perulangan">Jumlah Perulangan</label>
                                </div>
                                <input type="number" value="3" name="jumlah_perulangan" class="input" aria-label="Jumlah Perulangan" aria-describedby="jumlah-perulangan" style="padding: 0.5rem; margin-right: 1rem;">
                            </div>
                            <div>
                                <div>
                                    <label for="jumlah_centroid">Jumlah Centroid</label>
                                </div>
                                <input type="number" value="3" name="jumlah_centroid" class="input" aria-label="Jumlah Centroid" aria-describedby="jumlah-centroid" style="padding: 0.5rem; margin-right: 1rem;">
                            </div>
                            <div>
                                <div>
                                    <label for=""></label>
                                </div>
                                <input type="submit" value="Hitung" class="btn btn-primary" style="margin-top: 0.5rem">
                            </div>
                        </form>
                    </div>
                    <table class="table">
                        <caption class="text-center">
                            <h3 class="text-black">
                                Hasil Proses Clustering
                            </h3>    
                        </caption>
                        <thead >
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Luas Lahan</th>
                                <th scope="col">Kapasitas Gudang(ton)</th>
                                <?php 
                                    foreach($centroid as $key => $value) {
                                        $num = $key + 1;
                                        echo "<th scope='col'>C$num</th>";
                                    };
                                ?>
                                <th scope="col">Minimum</th>
                                <th scope="col">Cluster</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($hasil as $key => $value) {
                                    $no = $key + 1;
                                    $desa = $value['desa'];
                                    $luas_lahan = $value['luas_lahan'];
                                    $kapasitas_gudang = $value['kapasitas_gudang'];
                                    $kluster = $value['kluster'];
                                    $kluster_html = '';
                                    foreach ($kluster as $key => $klus_val) {
                                        $kluster_html .= "<td>$klus_val</td>";
                                    };
                                    $minimum = $value['minimum'];
                                    $cluster = $value['cluster'];
                                    // $c1 = $value['C1'];
                                    echo "             
                                        <tr>
                                            <td>$no</td>
                                            <td>$desa</td>
                                            <td>$luas_lahan</td>
                                            <td>$kapasitas_gudang</td>
                                            $kluster_html
                                            <td>$minimum</td>
                                            <td>$cluster</td>       
                                        </tr>     
                                    ";
                                };
                            ?>
                        </tbody>
                    </table>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const formCentroid = document.getElementById('centroid-form');
        formCentroid.addEventListener('submit', function (events) { 
            events.preventDefault();
            const data = new URLSearchParams(new FormData(formCentroid)).toString()
            if(data){
                $.ajax({
                    url:"<?php echo base_url()?>index.php/klustering/ajax_hitung_kluster",
                    data,
                    success: function(data){ 
                        console.log(data)
                    }
                });
            }
         });
    });
</script>