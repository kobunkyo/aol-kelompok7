<link rel="stylesheet" href="./css/navbar-style.css">
<div class="navbar">
    <div class="navbar-left">
        <p class="navbar-logo" onclick="window.location.href = '../index.php'">CitizenVoice</p>
    </div>
    <?php
        if(isset($_SESSION["login"])){
            echo'
    <div class="navbar-mid">
        <div class="mid-button" id="btn-mid-1">
            <a href="../beranda.php">Beranda</a>
        </div>
        <div class="mid-button" id="btn-mid-2">
            <a href="../list-laporan.php">Laporan</a>
        </div>
        <div class="mid-button" id="btn-mid-3">
            <a href="../list-acara.php">Acara</a>
        </div>
    </div>
            ';
        }else{
            echo'
    <div class="navbar-mid">
        <div class="mid-button" id="btn-mid-1">
            <a href="../login.php">Beranda</a>
        </div>
        <div class="mid-button" id="btn-mid-2">
            <a href="../login.php">Laporan</a>
        </div>
        <div class="mid-button" id="btn-mid-3">
            <a href="../login.php">Acara</a>
        </div>
    </div>
            ';
        }
    ?>
    
    <div class="navbar-right">
    <?php
        if(isset($_SESSION["login"])){
            echo '
            <div class="navbar-profile" id="user">
                <p>'.$_SESSION["nama"].'</p>
                <img src="./assets/image/users/'.$_SESSION["pp"].'" alt="">
            </div>
                ';
        }else{
            echo'
        <div class="navbar-button" id="non-user">
            <div class="masuk-btn">
                <a href="../login.php">Masuk</a>
            </div>
            <div class="button-daftar">
                <a href="../register.php">Daftar</a>
            </div>
        </div>
            ';
        }
    ?>
        
    </div>
</div>
