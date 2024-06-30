<?php
    require 'sqlConnection.php';
    // constraint partisipasi_kegiatan_id -> KI, users -> U, admins -> AD, formacara-> FA, acara -> AC, formlaporan -> FL

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function register($data){
        global $conn;

        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $email = htmlspecialchars($data["email"]);
        
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $confirmPassword = mysqli_real_escape_string($conn, $data["conf-password"]);
        
        if($nama == null){
            echo "
            <script>
                alert('Masukan nama Anda');
            </script>
            ";
            return false;
        }

        if($email == null){
            echo "
            <script>
                alert('Masukan email Anda')
            ";
            return false;
        }

        if($password !== $confirmPassword){
            echo "
            <script>
                alert('Password tidak sesuai');
            </script>
            ";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $userId = sprintf("U%04d", count(query("SELECT * FROM Users")) + 1);

        mysqli_query($conn, "INSERT INTO Users VALUES('$userId', '$nama', '$alamat', '$email', '$password', 'default.png', '', '', '')");
        
        return mysqli_affected_rows($conn);
    }

    function login($data){
        $email = $data["email"];
        $password = $data["password"];
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM Users WHERE email = '$email'");
        if( mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])){
                $_SESSION["login"] = true;
                $_SESSION["user"] = $row["user_id"];
                $_SESSION["nama"] = $row["nama"];
                $_SESSION["pp"] = $row["profile_picture"];
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function upload(){
        $namaFile = $_FILES["attachment"]["name"];
        $ukuranFile = $_FILES["attachment"]["size"];
        $error = $_FILES["attachment"]["error"];
        $tmpName = $_FILES["attachment"]["tmp_name"];

        if($error === 4){
            echo "
            <script>
                alert('Unggahfile');
            </script>";
            return false;
        }
        $ekstensiFileValid = ['jpg', 'jpeg', 'png', '.pdf'];
        $ekstensiFile = explode('.', $namaFile);
        $ekstensiFile = strtolower(end($ekstensiFile));

        if(!in_array($ekstensiFile, $ekstensiFileValid)){
            echo "
            <script>
                alert('Yang anda upload bukan gambar atau pdf');
            </script>";
            return false;
        }

        if($ukuranFile > 4000000){
            echo "
            <script>
                alert('Ukuran file terlalu besar';
            </script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiFile;

        move_uploaded_file($tmpName, 'assets/tempUpload' . $namaFileBaru);

        return $namaFileBaru;

    }

    function formPartisipasi($data, $id, $biaya, $idAcara){
        global $conn;
        $id = strval($id);
        $idAcara = strval($idAcara);
        $nama =  strval(htmlspecialchars($data["nama"]));
        $daerah = strval(htmlspecialchars($data["daerah"]));
        $file = '';

        if($nama == null){
            echo "
            <script>
                alert('Masukan nama Anda');
            </script>
            ";
            return false;
        }

        if($daerah == null){
            echo "
            <script>
                alert('Masukan asal kota Anda');
            </script>
            ";
            return false;
        }

        if( $_FILES["attachment"]["error"] === 4) {
            echo "
            <script>
                alert('Tolong upload bukti pembayaran');
            </script>
            ";
            return false;
        }else{
            $file = upload();
        }

        $kegiatanId = sprintf("KI%03d", count(query("SELECT * FROM PartisipasiAcara")) + 1);
        // error
        $query = "INSERT INTO partisipasiacara 
        VALUES('$kegiatanId', '$idAcara', '$id', '$daerah', $biaya,
        '$file','$nama');";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    // function formLaporan($data, $id){
    //     global $conn;
    //     $nama = htmlspecialchars($data["nama"]);
    //     $daerah = htmlspecialchars($data["daerah"]);
    //     $file = $data["attachment"];

    //     if($nama == null){
    //         echo "
    //         <script>
    //             alert('Masukan nama Anda');
    //         </script>
    //         ";
    //         return false;
    //     }

    //     if($daerah == null){
    //         echo "
    //         <script>
    //             alert('Masukan asal kota Anda');
    //         </script>
    //         ";
    //         return false;
    //     }

    //     if( $_FILES["gambar"]["error"] === 4) {
    //         echo "
    //         <script>
    //             alert('Tolong upload bukti pembayaran');
    //         </script>
    //         ";
    //         return false;
    //     }else{
    //         $file = upload();
    //     }

    //     $kegiatanId = sprintf("KI%03d", count(query("SELECT * FROM PartisipasiAcara")) + 1);

    //     $query = "INSERT INTO PartisipasiAcara 
    //     VALUES('$kegiatanId', '$idAcara', '$id', '$daerah', $biaya,
    //     '$file','$nama');";
    //     mysqli_query($conn, $query);
    //     return mysqli_affected_rows($conn);
    // }
?>