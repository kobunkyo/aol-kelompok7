<?php
    require '../controller/function.php';

    $keyword = $_GET["keyword"];
    
    $query = "SELECT a.acara_id as id, fa.judul_acara as judul, fa.deskripsi_acara as isi, fa.image as gambar
    FROM Acara a 
    JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id 
    WHERE fa.judul_acara LIKE '%$keyword%' OR
    fa.deskripsi_acara LIKE '%$keyword%' OR
    fa.lokasi_acara LIKE '%$keyword%' LIMIT 3;";

    if($keyword == ""){
        $query = "SELECT a.acara_id as id, fa.judul_acara as judul, fa.deskripsi_acara as isi, fa.image as gambar
        FROM Acara a 
        JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id ORDER BY id DESC 
        LIMIT 3;";
    }

    $listAcara = query($query);

    foreach($listAcara as $acara){
        echo'
    <div class="detail-acara" onclick="window.location.href = \'./partisipasi-acara.php?id='.$acara["id"].'\'">
        <img src="./assets/image/formAcara/'.$acara["gambar"].'" alt="">
        <h2>'.$acara["judul"].'</h2>
        <p>'.$acara["isi"].'</p>
    </div>            
        ';
    }
?>