<?php 
    include 'layout/header.php';
    error_reporting(0);
    if(isset($_GET["submit"])){
        $kategori_kitchen = $_GET['kategori_kitchen'];
    }
?>

<div class="container mt-80px">
    <div class="row">
        <div class="col-3 border">
            <div class="row">
                <form method="GET" action="">
                    <h4 class="mt-3">Kategori</h4>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori_kitchen" id="kategori_kitchen1" value="Minimalis" <?php if(isset($_POST["submit"])){ if($kategori_kitchen == 'Minimalis'){ echo 'checked'; }} ?>>
                            <label class="form-check-label" for="kategori_kitchen1">
                                Kitchen Set Minimalis
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori_kitchen" id="kategori_kitchen2" value="Bentuk L" <?php if(isset($_POST["submit"])){ if($kategori_kitchen == 'Bentuk L'){ echo 'checked'; }} ?>>
                            <label class="form-check-label" for="kategori_kitchen2">
                                Kitchen Set Bentuk L
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3" name="submit" value="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="row">

                <?php
                if(!isset($_GET["submit"])){

                }else {

                    // ================================= METODE ======================================================
                    // looping tb_rating distance

                        // $alternatif = array();
                        
                        // $result = mysqli_query($conn, "SELECT DISTINCT id_pelanggan FROM tb_rating");
                        // // $data = mysqli_fetch_array($result);
                        // // $jum = count($data);
                        // // for($i=0; $i < 3; $i++) {
                        // //     $id_pelanggan = $data['id_pelanggan'];
                        // //     array_push($alternatif, $id_pelanggan);
                        // //     print_r($alternatif);
                        // // }
                        // while($data = mysqli_fetch_array($result))
                        // {
                        //     $id_pelanggan = $data['id_pelanggan'];
                        //     $alternatif = array($id_pelanggan);
                        //     // print_r($alternatif);
                            
                        //     // looping tb_rating where id_pelanggan order by id_kitchen
                        //     $result2 = mysqli_query($conn, "SELECT * FROM tb_rating WHERE id_pelanggan = $id_pelanggan ORDER BY id_kitchen");
                        //     while($data2 = mysqli_fetch_array($result2))
                        //     {
                        //         $rating = $data2['rating'];
                        //         array_push($alternatif, $rating);
                        //         // print_r($alternatif);
                        //     }
                            
                        //     // array_push($alternatif, $rating);
                        //     print_r($alternatif);
                        //         // array = push['rating']
                        //     while($alternatif as $a) {
                                
                        //     }
                        // }



                        // ------------------------------------------- NILAI AWAL RATING

                        $alternatif = array();

                        $i = 0;
                        
                        // looping kitchen set order by id_kitchen
                            // idk=1
                            // masukan array nama_kitche array = 1,

                            // looping tb_rating where = id_kitchen
                                // if()

                            // print_r($data);

                            $result2 = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE kategori_kitchen = '".$kategori_kitchen."'");
                            while($data2 = mysqli_fetch_array($result2))
                            {
                                // print_r($data2);
                                $nama_kitchen = $data2['nama_kitchen'];
                                $id_kitchen = $data2['id_kitchen'];
                                $alternatif[] = array($nama_kitchen);
                                // print_r($alternatif);
                                $result3 = mysqli_query($conn, "SELECT DISTINCT id_pelanggan FROM tb_rating");
                                while($data3 = mysqli_fetch_array($result3))
                                {
                                    // print_r($data3);
                                    $id_pelanggan = $data3['id_pelanggan'];
                                    $result4 = mysqli_query($conn, "SELECT * FROM tb_rating WHERE id_pelanggan = $id_pelanggan AND id_kitchen = '$id_kitchen' ORDER BY id_pelanggan");
                                    while($data4 = mysqli_fetch_array($result4))
                                    {
                                        $id_pelanggan2 = $data4['id_pelanggan'];
                                        $rating2 = $data4['rating'];
                                        array_push($alternatif[$i], $rating2);
                                    }

                                }

                                $tambah = array_sum($alternatif[$i]);
                                // echo $tambah;
                                array_push($alternatif[$i], $tambah);
                                // $average = $tambah / (count($alternatif) - 2);
                                $count = count($alternatif[$i]);
                                $count = $count-2;
                                // echo $count;
                                $average = $tambah / $count;
                                // echo $average;
                                // $averagee = $tambah / 5;
                                // echo round($average,3);
                                array_push($alternatif[$i], $average);
                                // print_r($alternatif);
                                // echo $alternatif[0][2];
                                $i = $i+1;
                            }


                            // --------------------------------- NILAI DIKURANG RATA2 -------------------------------

                            $index_kitchen = 0;
                            $index_user = 1;
                            $nilai_dikurang_rata = array();
                            $co = count($alternatif[0]);
                            foreach($alternatif as $a){
                                $nilai_dikurang_rata[] = array($alternatif[$index_kitchen][0]);
                                // $nilai_dikurang_rata[] = array();
                                // //loop
                                for($i = 0; $i < $co-3; $i++) {
                                    // echo $alternatif[$index_kitchen][$index_user] . "<br>";
                                    array_push($nilai_dikurang_rata[$index_kitchen], $alternatif[$index_kitchen][$index_user] - end($alternatif[$index_kitchen]));
                                    $index_user = $index_user + 1;
                                }
                                // foreach($alternatif[$index_kitchen] as $b) {
                                //     // echo $alternatif[$index_kitchen][$index_user] . "<br>";
                                //     echo $alternatif[$index_kitchen][$index_user] - end($alternatif[$index_kitchen]) . "<br>";
                                //     $index_user = $index_user + 1;
                                // }
                                $index_user = 1;
                                $index_kitchen = $index_kitchen + 1;
                            }



                            // ----------------------------------- DIPANGKATKAN KEMUDIAN DIAKARKAN -----------------------

                            $index_kitchen = 0;
                            $index_user = 1;
                            $dipangkatkan_kemudian_diakarkan = array();
                            $co = count($nilai_dikurang_rata[0]);
                            foreach($nilai_dikurang_rata as $n) {
                                $dipangkatkan_kemudian_diakarkan[] = array($nilai_dikurang_rata[$index_kitchen][0]);
                                for($i = 0; $i < $co-1; $i++) {
                                    array_push($dipangkatkan_kemudian_diakarkan[$index_kitchen], pow($nilai_dikurang_rata[$index_kitchen][$index_user], 2));
                                    $index_user = $index_user + 1;
                                }
                                $total = array_sum($dipangkatkan_kemudian_diakarkan[$index_kitchen]);
                                
                                
                                
                                // echo $total . "<br>";
                                array_push($dipangkatkan_kemudian_diakarkan[$index_kitchen], $total);
                                $sqrt = sqrt(end($dipangkatkan_kemudian_diakarkan[$index_kitchen]));
                                // echo round($sqrt,3) . "<br>";
                                array_push($dipangkatkan_kemudian_diakarkan[$index_kitchen], round($sqrt,3));
                                // echo end($dipangkatkan_kemudian_diakarkan[$index_kitchen]) . "<br>";
                                $index_user = 1;
                                $index_kitchen = $index_kitchen + 1;
                            }



                            // ----------------------------- PERKALIAN MATRIX BERPASANGAN --------------------------------
                            
                            $perkalian_matrix_berpasangan = array();
                            $co_kitchen = count($nilai_dikurang_rata); // 5
                            $co_pelanggan = count($nilai_dikurang_rata[0]); //6
                            $co_kitchen_kurang = 1;
                            // $co_pelanggan_kurang = 1;
                            $index_kitchen = 0;
                            $index_user = 0;

                            $index_kitchen_nilai = 1;
                            $index_user_nilai = 1;
                            $index_kitchen_nilai2 = 0;
                        
                            for($i = 0; $i < $co_kitchen-1; $i++)
                            {
                                $perkalian_matrix_berpasangan[] = array();

                                for($j = 0; $j < $co_kitchen - $co_kitchen_kurang; $j++)
                                {
                                    $perkalian_matrix_berpasangan[$index_kitchen][$j] = array($nilai_dikurang_rata[$index_kitchen_nilai][0]);

                                    for($k = 1; $k < $co_pelanggan; $k++)
                                    {
                                        array_push($perkalian_matrix_berpasangan[$index_kitchen][$index_user], $nilai_dikurang_rata[$index_kitchen_nilai2][$index_user_nilai] * $nilai_dikurang_rata[$index_kitchen_nilai][$index_user_nilai]);
                                        $index_user_nilai = $index_user_nilai + 1;
                                    }
                                    $total = array_sum($perkalian_matrix_berpasangan[$index_kitchen][$index_user]);
                                    array_push($perkalian_matrix_berpasangan[$index_kitchen][$index_user], round($total, 3));
                                    $index_user = $index_user + 1;
                                    $index_kitchen_nilai = $index_kitchen_nilai + 1;
                                    
                                    $index_user_nilai = 1;

                                }

                                $index_kitchen = $index_kitchen + 1;
                                $co_kitchen_kurang = $co_kitchen_kurang + 1;

                                $index_kitchen_nilai = $i + 2;
                                $index_kitchen_nilai2 = $index_kitchen_nilai2 + 1;
                                $index_user = 0;
                            }




                            // ------------------------------------------ MENCARI SIMILARITY HASIL PERKALIAN -------------------------

                            $index_kitchen = 0;
                            $index_user = 0;

                            $index_kitchen_cek = 0;
                            $index_user_cek = 1;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 0;

                            $co = count($alternatif);
                            $co2 = count($alternatif[0]);
                            $co3 = count($perkalian_matrix_berpasangan[0]);

                            $isi = array(1,2,3,4,5);

                            $loop = 1;
                            $loop2 = 0;

                            for($i = 0; $i < $co; $i++) 
                            {
                                $mencari_similarity_hasil_perkalian[$index_kitchen][$index_user] = 1;

                                for($l = 0; $l < $loop; $l++)
                                {
                                    if(isset($mencari_similarity_hasil_perkalian[$index_kitchen_cek][$index_user_cek]))
                                    {
                                        for($q = 0; $q < $loop2; $q++)
                                        {
                                            $mencari_similarity_hasil_perkalian[$index_user_cek][$index_kitchen_cek] = $mencari_similarity_hasil_perkalian[$index_kitchen_cek][$index_user_cek];
                                            $index_kitchen_cek = $index_kitchen_cek + 1;
                                            // echo "kedua <br>";
                                        }
                                        
                                        $index_user_cek = $index_user_cek + 1;
                                    }else 
                                    {
                                        
                                        for($j = 0; $j < $co3; $j++)
                                        {
                                            array_push($mencari_similarity_hasil_perkalian[$index_kitchen], end($perkalian_matrix_berpasangan[$index_kitchen_isi][$index_user_isi]));
                                            $index_user_isi = $index_user_isi + 1;
                                            
                                        }
                                        // echo "ketiga <br>";

                                        $loop2 = $loop2 + 1;
                                        

                                        $co3 = $co3 - 1;
                                        $index_user_isi = 0;
                                        $index_kitchen_isi = $index_kitchen_isi + 1;
                                        // echo $index_user_isi;
                                        // $index_user = $index_user + 1;
                                        $index_kitchen_cek = 0;
                                        
                                    }
                                }

                                $index_kitchen = $index_kitchen + 1;
                                $index_user = $index_user + 1;

                                $loop = $loop + 1;
                            }
                                
                                
                            


                            // ------------------------------- MENCARI PERKALIAN AKAR DALAM BENTUK MATRIX ------------------------

                            $index_kitchen_sama = 0;
                            $index_user_sama = 0;

                            $index_kitchen_cek = 0;
                            $index_user_cek = 1;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 1;

                            $index_kitchen_value = 0;
                            $index_user_value = 0;

                            $co = count($alternatif);
                            $co2 = count($dipangkatkan_kemudian_diakarkan);

                            $loop = 1;
                            $loop2 = 0;

                            for($i = 0; $i < $co; $i++)
                            {
                                $mencari_perkalian_akar_dalam_bentuk_matrix[$index_kitchen_sama][$index_user_sama] = 1;

                                for($j = 0; $j < $loop; $j++)
                                {
                                    if(isset($mencari_perkalian_akar_dalam_bentuk_matrix[$index_kitchen_cek][$index_user_cek]))
                                    {
                                        for($q = 0; $q < $loop2; $q++)
                                        {
                                            $mencari_perkalian_akar_dalam_bentuk_matrix[$index_user_cek][$index_kitchen_cek] = $mencari_perkalian_akar_dalam_bentuk_matrix[$index_kitchen_cek][$index_user_cek];
                                            $index_kitchen_cek = $index_kitchen_cek + 1;
                                            // echo "kedua <br>";
                                        }
                                        
                                        $index_user_cek = $index_user_cek + 1;
                                    }else {
                                        for($w = 0; $w < $co2-1; $w++)
                                        {
                                            array_push($mencari_perkalian_akar_dalam_bentuk_matrix[$index_kitchen_value], end($dipangkatkan_kemudian_diakarkan[$index_kitchen_isi]) * end($dipangkatkan_kemudian_diakarkan[$index_user_isi]));
                                            $index_user_isi = $index_user_isi + 1;
                                        }
                                        // echo "ketiga <br>";

                                        $loop2 = $loop2 + 1;

                                        $index_kitchen_value = $index_kitchen_value + 1;

                                        $index_user_isi = 0 + $index_user_sama + 2;

                                        $co2 = $co2 - 1;
                                        $index_kitchen_isi = $index_kitchen_isi + 1;
                                        $index_kitchen_cek = 0;
                                        

                                    }
                                }

                                $index_kitchen_sama = $index_kitchen_sama + 1;
                                $index_user_sama = $index_user_sama + 1;

                                $loop = $loop + 1;
                            }



                            
                            // --------------------------- MENCARI SIMILARITY DALAM BENTUK MATRIX -------------------------------

                            $index_kitchen = 0;
                            $index_user = 0;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 0;

                            $co = count($mencari_perkalian_akar_dalam_bentuk_matrix);
                            
                            for($i = 0; $i < $co; $i++)
                            {
                                $mencari_similarity_dalam_bentuk_matrix[] = array();
                                for($j = 0; $j < $co; $j++)
                                {
                                    array_push($mencari_similarity_dalam_bentuk_matrix[$index_kitchen], round($mencari_similarity_hasil_perkalian[$index_kitchen_isi][$index_user_isi] / $mencari_perkalian_akar_dalam_bentuk_matrix[$index_kitchen_isi][$index_user_isi], 3));
                                    $index_user_isi = $index_user_isi + 1;
                                }
                                $index_kitchen = $index_kitchen + 1;
                                $index_kitchen_isi = $index_kitchen_isi + 1;
                                $index_user_isi = 0;
                            }


                            // --------------------------- MENCARI SIMILARITY DALAM BENTUK MATRIX (NILAINYA DIMUTLAKKAN) -------------------------------

                            $index_kitchen = 0;
                            $index_user = 0;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 0;

                            $co = count($mencari_perkalian_akar_dalam_bentuk_matrix);
                            
                            for($i = 0; $i < $co; $i++)
                            {
                                $mencari_similarity_dalam_bentuk_matrix_nilainya_dimutlakan[] = array();
                                for($j = 0; $j < $co; $j++)
                                {
                                    array_push($mencari_similarity_dalam_bentuk_matrix_nilainya_dimutlakan[$index_kitchen], abs(round($mencari_similarity_hasil_perkalian[$index_kitchen_isi][$index_user_isi] / $mencari_perkalian_akar_dalam_bentuk_matrix[$index_kitchen_isi][$index_user_isi], 3)));
                                    $index_user_isi = $index_user_isi + 1;
                                }
                                array_push($mencari_similarity_dalam_bentuk_matrix_nilainya_dimutlakan[$index_kitchen], round(array_sum($mencari_similarity_dalam_bentuk_matrix_nilainya_dimutlakan[$index_kitchen]), 2));
                                $index_kitchen = $index_kitchen + 1;
                                $index_kitchen_isi = $index_kitchen_isi + 1;
                                $index_user_isi = 0;
                            }


                            // ---------------------- MENCARI PREDIKSI DIKALIKAN DULU -----------------------

                            $co = count($nilai_dikurang_rata);
                            $co2 = count($nilai_dikurang_rata[0]) - 1;

                            $index_kitchen = 0;
                            $index_user = 0;

                            $index_kitchen_value = 0;
                            $index_user_value = 0;

                            $index_kitchen_value2 = 0;
                            $index_user_value2 = 0;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 1;

                            $index_kitchen_isi2 = 0;
                            $index_user_isi2 = 0;

                            for($i = 0; $i < $co; $i++)
                            {
                                $mencari_prediksi_dikalikan_dulu[] = array();

                                for($q = 0; $q < $co; $q++)
                                {
                                    $mencari_prediksi_dikalikan_dulu[$index_kitchen][] = array();
                                    for($j = 0; $j <$co2; $j++)
                                    {
                                        array_push($mencari_prediksi_dikalikan_dulu[$index_kitchen_value2][$index_kitchen_value], round($nilai_dikurang_rata[$index_kitchen_isi][$index_user_isi] * $mencari_similarity_dalam_bentuk_matrix[$index_kitchen_isi2][$index_user_isi2], 3));

                                        $index_user_isi = $index_user_isi + 1;

                                    
                                    }

                                    $index_kitchen_isi = $index_kitchen_isi + 1;
                                    $index_user_isi = 1;

                                    $index_user_isi2 = $index_user_isi2 + 1;

                                    $index_kitchen_value = $index_kitchen_value + 1;

                                    
                                }

                                $index_kitchen_isi = 0;

                                $index_kitchen_isi2 = $index_kitchen_isi2 + 1;
                                $index_user_isi2 = 0;

                                $index_kitchen_value = 0;
                                $index_kitchen_value2 = $index_kitchen_value2 + 1;
                                $index_kitchen = $index_kitchen + 1;
                                
                            }
                            // MENAMBAHKAN TOTAL SUM
                            $index_kitchen = 0;
                            $index_user = 0;

                            $index_kitchen_total = 0;
                            for($j = 0; $j < $co; $j++)
                            {
                                $mencari_prediksi_dikalikan_dulu[$index_kitchen_total]['total'] = array();
                                for($i = 0; $i < $co2; $i++)
                                {
                                    $column = array_column($mencari_prediksi_dikalikan_dulu[$index_kitchen], $index_user);
                                    array_push($mencari_prediksi_dikalikan_dulu[$index_kitchen]['total'], round(array_sum($column), 3));
                                    $index_user = $index_user + 1;
                                    // print_r($column);
                                }
                                $index_kitchen_total = $index_kitchen_total + 1;
                                $index_kitchen = $index_kitchen + 1;
                                $index_user = 0;
                            }

                            // print_r($mencari_prediksi_dikalikan_dulu);




                            // --------------------------------- MATRIX PREDIKSI -------------------------------
                            $co = count($nilai_dikurang_rata);
                            $co2 = count($nilai_dikurang_rata[0]) - 1;

                            $index_kitchen_value = 0;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 0;
                            
                            for($i = 0; $i < $co; $i++)
                            {
                                $matrix_prediksi[] = array();
                                for($j = 0; $j < $co2; $j++)
                                {
                                    array_push($matrix_prediksi[$index_kitchen_value], $mencari_prediksi_dikalikan_dulu[$index_kitchen_isi]['total'][$index_user_isi]);
                                    $index_user_isi = $index_user_isi + 1;
                                }
                                $index_kitchen_value = $index_kitchen_value + 1;
                                $index_kitchen_isi = $index_kitchen_isi + 1;
                                $index_user_isi = 0;
                            }




                            // ---------------------------------- PEMBAGIAN MATRIX PREDIKSI ---------------------------------
                            $co = count($nilai_dikurang_rata);
                            $co2 = count($nilai_dikurang_rata[0]) - 1;

                            $index_kitchen = 0;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 0;
                            
                            $index_kitchen_isi2 = 0;
                            $index_user_isi2 = 0;

                            for($i = 0; $i < $co; $i++)
                            {
                                $pembagian_matrix_prediksi[] = array();
                                for($j = 0; $j < $co2; $j++)
                                {
                                    array_push($pembagian_matrix_prediksi[$index_kitchen], round($matrix_prediksi[$index_kitchen_isi][$index_user_isi] / end($mencari_similarity_dalam_bentuk_matrix_nilainya_dimutlakan[$index_kitchen_isi2]), 3));
                                    $index_user_isi = $index_user_isi + 1;
                                }
                                $index_kitchen_isi = $index_kitchen_isi + 1;
                                $index_user_isi = 0;

                                $index_kitchen_isi2 = $index_kitchen_isi2 + 1;

                                $index_kitchen = $index_kitchen + 1;
                            }




                            // ------------------------------ HASIL PERHITUNGAN PREDIKSI -----------------------------------
                            $co = count($nilai_dikurang_rata);
                            $co2 = count($nilai_dikurang_rata[0]) - 1;

                            $index_kitchen = 0;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 0;

                            $index_kitchen_isi2 = 0;
                            $index_user_isi2 = 0;

                            for($i = 0; $i < $co; $i++)
                            {
                                $hasil_perhitungan_prediksi[] = array();
                                for($j = 0; $j < $co2; $j++)
                                {
                                    array_push($hasil_perhitungan_prediksi[$index_kitchen], round(end($alternatif[$index_kitchen_isi]) + $pembagian_matrix_prediksi[$index_kitchen_isi2][$index_user_isi2], 3));
                                    $index_user_isi2 = $index_user_isi2 + 1;
                                }
                                $index_kitchen = $index_kitchen + 1;

                                $index_kitchen_isi = $index_kitchen_isi + 1;
                                
                                $index_kitchen_isi2 = $index_kitchen_isi2 + 1;
                                $index_user_isi2 = 0;
                            }




                            // ------------------------------ HASIL PERHITUNGAN PREDIKSI DIMUTLAKAN (NILAI DITAMPILKAN) ----------------------
                            $co = count($hasil_perhitungan_prediksi);
                            $co2 = count($hasil_perhitungan_prediksi[0]);

                            $index_kitchen = 0;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 0;

                            for($i = 0; $i < $co; $i++)
                            {
                                $hasil_perhitungan_prediksi_di_mutlakkan[] = array();
                                for($j = 0; $j < $co2; $j++)
                                {
                                    array_push($hasil_perhitungan_prediksi_di_mutlakkan[$index_kitchen], abs($hasil_perhitungan_prediksi[$index_kitchen_isi][$index_user_isi]));
                                    $index_user_isi = $index_user_isi + 1;
                                }
                                $index_kitchen = $index_kitchen + 1;
                                
                                $index_kitchen_isi = $index_kitchen_isi + 1;
                                $index_user_isi = 0;
                            }








                            // =============================================== MAE ==========================================
                            // ----------------------------------------------- MENCARI NILAI MAE ----------------------------------
                            $co = count($nilai_dikurang_rata);
                            $co2 = count($nilai_dikurang_rata[0]) - 1;

                            $index_kitchen = 0;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 0;

                            $index_kitchen_isi2 = 0;
                            $index_user_isi2 = 1;

                            for($i = 0; $i < $co; $i++)
                            {
                                $mencari_nilai_mae[] = array();
                                for($j = 0; $j < $co2; $j++)
                                {
                                    array_push($mencari_nilai_mae[$index_kitchen], $hasil_perhitungan_prediksi_di_mutlakkan[$index_kitchen_isi][$index_user_isi] - $alternatif[$index_kitchen_isi2][$index_user_isi2]);
                                    $index_user_isi = $index_user_isi + 1;

                                    $index_user_isi2 = $index_user_isi2 + 1;
                                }
                                $index_kitchen = $index_kitchen + 1;

                                $index_kitchen_isi = $index_kitchen_isi + 1;
                                $index_user_isi = 0;

                                $index_kitchen_isi2 = $index_kitchen_isi2 + 1;
                                $index_user_isi2 = 1;
                            }




                            // ----------------------------------------- MENCARI NILAI MAE DI MUTLAKAN DAN DI TOTAL ---------------------------
                            $co = count($mencari_nilai_mae);
                            $co2 = count($mencari_nilai_mae[0]);

                            $index_kitchen = 0;

                            $index_kitchen_isi = 0;
                            $index_user_isi = 0;

                            for($i = 0; $i < $co; $i++)
                            {
                                $mencari_nilai_mae_di_mutlakan_dan_di_total[] = array();
                                for($j = 0; $j < $co2; $j++)
                                {
                                    array_push($mencari_nilai_mae_di_mutlakan_dan_di_total[$index_kitchen], abs($mencari_nilai_mae[$index_kitchen_isi][$index_user_isi]));
                                    $index_user_isi = $index_user_isi + 1;
                                }
                                $total = array_sum($mencari_nilai_mae_di_mutlakan_dan_di_total[$index_kitchen_isi]);
                                array_push($mencari_nilai_mae_di_mutlakan_dan_di_total[$index_kitchen], round($total, 3));

                                $index_kitchen = $index_kitchen + 1;

                                $index_kitchen_isi = $index_kitchen_isi + 1;
                                $index_user_isi = 0;
                            }




                            // ------------------------------------- NILAI MAE SEBELUM DI URUTKAN -------------------------------------
                            $co = count($nilai_dikurang_rata);
                            $co2 = count($nilai_dikurang_rata[0]) - 1;

                            $index_kitchen = 0;

                            $index_kitchen_isi = 0;

                            $nilai_mae_sebelum_di_urutkan = array();

                            for($i = 0; $i < $co; $i++)
                            {
                                // $nilai_mae_sebelum_di_urutkan = array($alternatif[$i][0]);
                                // array_push($nilai_mae_sebelum_di_urutkan, $alternatif[$i][0]);
                                $nilai_mae_sebelum_di_urutkan[$alternatif[$i][0]] = round(end($mencari_nilai_mae_di_mutlakan_dan_di_total[$index_kitchen_isi]) / $co2 , 3);
                                
                                // array_push($nilai_mae_sebelum_di_urutkan, );
                                
                                $index_kitchen = $index_kitchen + 1;

                                $index_kitchen_isi = $index_kitchen_isi + 1;
                            }

                            
                        // print_r($alternatif);
                        // print_r($nilai_dikurang_rata);
                        // print_r($dipangkatkan_kemudian_diakarkan);
                        // unset($perkalian_matrix_berpasangan);
                        // $perkalian_matrix_berpasangan = array();
                        // array_push($perkalian_matrix_berpasangan, 1);
                        // print_r($perkalian_matrix_berpasangan);
                        // echo $perkalian_matrix_berpasangan[0][0][1];

                        // $ksor = count($mencari_similarity_hasil_perkalian);
                        // for($i = 0; $i < $ksor; $i++) {
                        //     ksort($mencari_similarity_hasil_perkalian[$i]);
                        // }
                        // print_r($mencari_similarity_hasil_perkalian);

                        // $ksor2 = count($mencari_perkalian_akar_dalam_bentuk_matrix);
                        // for($i = 0; $i < $ksor2; $i++) {
                        //     ksort($mencari_perkalian_akar_dalam_bentuk_matrix[$i]);
                        // }
                        // print_r($mencari_perkalian_akar_dalam_bentuk_matrix);

                        // print_r($mencari_similarity_dalam_bentuk_matrix);

                        // print_r($mencari_similarity_dalam_bentuk_matrix_nilainya_dimutlakan);

                        // print_r($mencari_prediksi_dikalikan_dulu);

                        // print_r($matrix_prediksi);

                        // print_r($pembagian_matrix_prediksi);

                        // print_r($hasil_perhitungan_prediksi);

                        // print_r($hasil_perhitungan_prediksi_di_mutlakkan);

                        // print_r($mencari_nilai_mae);

                        // print_r($mencari_nilai_mae_di_mutlakan_dan_di_total);

                        // print_r($nilai_mae_sebelum_di_urutkan);
                        
                        arsort($nilai_mae_sebelum_di_urutkan);
                        // print_r($nilai_mae_sebelum_di_urutkan);

                $rek1 = "";
                $rek2 = "";
                $i = 0;

                foreach($nilai_mae_sebelum_di_urutkan as $key => $value)
                {
                    if($i == 0)
                    {
                        $rek1 = $key;
                        break;
                    }else{
                        $rek2 = $key;
                        break;
                    }
                    $i = $i + 1;
                }
                
                $ress = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE kategori_kitchen = '".$kategori_kitchen."'");
                while($data = mysqli_fetch_array($ress))
                {
                    $id_kitchen = $data['id_kitchen'];
                    $nama_kitchen = $data['nama_kitchen'];
                    $kategori_kitchen = $data['kategori_kitchen'];
                    $foto_kitchen = $data['foto_kitchen'];
                ?>
                <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img src="dashboard/images/kitchen/<?php echo $data['foto_kitchen']; ?>" width="200" height="200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $nama_kitchen ?></h5>
                            
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <?php 
                            if(isset($_SESSION['username'])){
                                if($_SESSION['hak_akses'] == "pelanggan" && $result_cek->num_rows == 0){
                        ?>
                                   <label class="text-secondary">Silahkan lengkapi Profil terlebih dahulu untuk memesan</label> 
                        <?php 
                                }else if($_SESSION['hak_akses'] == "pelanggan"){ 
                        ?>
                                    <a href="pesan.php?id=<?= $id_kitchen; ?>" class="btn btn-primary">Pesan</a>
                                <?php }?>
                        <?php 
                            }else{
                        ?>
                                <label class="text-secondary">Silahkan login terlebih dahulu untuk memesan</label>
                        <?php } ?>
                        <!-- <?php //if($rek1 == $nama_kitchen || $rek2 == $nama_kitchen){ ?> <label class="p-1 bg-danger text-white">Rekomendasi</label> <?php // } ?> -->
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
            
        </div>
        
    </div>
    
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>