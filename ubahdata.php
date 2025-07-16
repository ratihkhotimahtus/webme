<?php

    session_start();

   if(!isset($_SESSION["login"]))
   {
    header("Location: login1.php");
    exit;
   }
   
    require 'function.php';

    $id = $_GET["id"];

    $mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];





    if(isset($_POST["submit"]))
    {

        if(ubahdata($_POST, $id)>0)
        {
            echo "
            <script>
                alert('Berhasil!');
                document.location.href = '../datamahasiswa.php';
            </script>
            ";
        }
        else
        {
            echo "
            <script>
                alert(Gagal!');
                document.location.href = '../datamahasiswa.php';
            </script>
            ";
            mysqli_error($koneksi);
        }


    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for ="name"> Nama:</label>
        <input type="text" name="nama" id="nama" placeholder = "Nama Lengkap*" required value="<?= $mhs["nama"]?>"/> <br>
        <label for ="nim"> NIM:</label>
        <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]?>"/> <br>
        <label for ="jurusan"> Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]?>"/> <br>
        <label for ="nohp"> No. HP:</label>
        <input type="text" name="nohp" id="nohp" required value="<?= $mhs["nohp"]?>"/> <br>
        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" required><br><br>
        <button type = "submit" name="submit"> Ubah </button>
        
    </form>
</body>
</html>