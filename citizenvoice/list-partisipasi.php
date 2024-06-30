<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CitizenVoice | List Partisipasi</title>
    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/list-partisipasi-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <?php include './common-element/navbar.php' ?>
    <div class="parent-container">
        <div class="profil-container">
            <h1 class="profil colored-text">Profil</h1>
            <img src="./assets/image/users/01hdbnyczmy37stmet6sbw3f1k.jpg" alt="profil" class="profile-image">
            <h1 class="username colored-text">USERNAME</h1>
            <h1 class="job colored-text">Mahasiswa</h1>
        </div>
        <div class="list-container">
            <h1 class="list-header colored-text">List yang Diikuti</h1>
            <div class="list-content list-diikuti"> 
                <div class="panel">
                    <h1>contoh title ceritanya panjang</h1>
                    <p>
                        Lokasi: GBK

                        Jam: 10:00 WIB
                    </p>
                    <p>
                        Diselenggarakan Oleh:
                            Ceritanya tim keren
                    </p>
                    <a class="button left-content" href="">Buat Pengingat</a>
                </div>

                <div class="panel">
                    <h1>contoh title ceritanya panjang</h1>
                    <p>
                        Lokasi: GBK

                        Jam: 10:00 WIB
                    </p>
                    <p>
                        Diselenggarakan Oleh:
                            Ceritanya tim keren
                    </p>
                    <a class="button left-content" href="">Buat Pengingat</a>
                </div>
            </div>
            
            <h1 class="list-header colored-text">List yang Dibuat</h1>
            <div class="list-content list-dibuat">
                <div class="panel">
                    <h1>contoh title ceritanya panjang</h1>
                    <p>
                        Lokasi: GBK

                        Jam: 10:00 WIB
                    </p>
                    <p>
                        Diselenggarakan Oleh:
                            Ceritanya tim keren
                    </p>
                    <a class="button left-content" href="">Buat Pengingat</a>
                </div>
                <div class="panel">
                    <h1>contoh title ceritanya panjang</h1>
                    <p>
                        Lokasi: GBK

                        Jam: 10:00 WIB
                    </p>
                    <p>
                        Diselenggarakan Oleh:
                            Ceritanya tim keren
                    </p>
                    <a class="button left-content" href="">Buat Pengingat</a>
                </div>
            </div>

            <h1 class="list-header colored-text">List yang Sudah Usai</h1>
            <div class="list-content list-sudah-usai">
                <div class="panel">
                    <h1>contoh title ceritanya panjang</h1>
                    <p>
                        Lokasi: GBK

                        Jam: 10:00 WIB
                    </p>
                    <p>
                        Diselenggarakan Oleh:
                            Ceritanya tim keren
                    </p>
                    <img src="./assets/image/gambar/icon-selesai.svg" alt="Finished" class="complete left-content">
                </div>
            </div>
        </div>
    </div>
</body>
</html>