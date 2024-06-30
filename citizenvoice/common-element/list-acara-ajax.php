<?php
    require '../controller/function.php';

    $keyword = $_GET["keyword"];
    
    $query = "SELECT a.acara_id as id, u.nama as nama, DATE_FORMAT(fa.tanggal_acara, '%d-%m-%Y') as tanggal, fa.judul_acara as judul, fa.deskripsi_acara as isi, fa.image as gambar
    FROM Acara a JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id
    JOIN Users u ON fa.user_id = u.user_id
    WHERE fa.judul_acara LIKE '%$keyword%' OR
    fa.deskripsi_acara LIKE '%$keyword%' OR
    fa.lokasi_acara LIKE '%$keyword%' ORDER BY fa.tanggal_acara ASC;";

    if($keyword == ""){
        $query = "SELECT a.acara_id as id, u.nama as nama, DATE_FORMAT(fa.tanggal_acara, '%d-%m-%Y') as tanggal, fa.judul_acara as judul, fa.deskripsi_acara as isi, fa.image as gambar
        FROM Acara a JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id
        JOIN Users u ON fa.user_id = u.user_id ORDER BY fa.tanggal_acara ASC;";
    }

    $listAcara = query($query);

    foreach($listAcara as $acara){
        echo'
    <div class="list-acara" onclick="window.location.href=\'./partisipasi-acara.php?id='.$acara["id"].'\'">
        <div class="title">
            <h2>'.$acara["nama"].'</h2>
            <h3>'.$acara["tanggal"].'</h3>
        </div>
        <img src="./assets/image/formAcara/'.$acara["gambar"].'" alt="gambar">
        <p class="judul">'.$acara["judul"].'</p>
        <p class="isi">'.$acara["isi"].'</p>
    </div>
        ';
    }
?>