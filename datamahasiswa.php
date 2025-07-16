<?php
   // $nama = "Ratih Khotimahtus S";
   // echo "Hello World" . $nama;

   session_start();

   if(!isset($_SESSION["login"]))
   {
    header("Location: login1.php");
    exit;
   }

   include 'function.php';
   $query = "SELECT * FROM mahasiswa";
   $rows = query($query); /// hasilnya wadah dengan isinya

   /// ambil data (fetch) dari lemari result
    /// while ($mhs = mysqli_fetch_assoc($result))

   /// mysqli_fetch_row() untuk array tipe numerik
   /// mysqli_fetch_assoc() untuk assosiatif
   /// mysqli_fetch_array()
   /// mysqli_fetch_object() pakai var_dump($mhs->nama);
    ///{
      ///  var_dump($mhs);
        /// kalo mau ditampilkan isi table tertentu var_dump($mhs["nim"]); 
    ///}
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
</head>
<body>
    <a href="logout.php"> Logout</a>
    <h1>Data Mahasiswa</h1>
    
    <a href= "tambahdata.php"><button style="margin-bottom: 12px; background-color: lightgreen;">Tambah Data</button></a>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>No Hp</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
        foreach ($rows as $mhs) { ?>
        <tr>
            <td><?= $i ?></td>
             <td><img src="images/<?=$mhs['foto'];?> "alt="<?=$mhs['nama'];?>"width="100"></td>
            <td><?= $mhs["nama"]?></td>
            <td><?= $mhs["nim"]?></td>
            <td><?= $mhs["jurusan"]?></td>
            <td><?= $mhs["nohp"]?></td>
            <td><a href= "hapusdata.php/?id=<?= $mhs["id"]?> "onclick="return confirm('Yaqueennn?');" ><button style="margin-bottom: 12px; background-color: pink;">Hapus</button></a> | <a href="ubahdata.php/?id=<?= $mhs["id"] ?>"><button style="margin-bottom:12px; background-color: lightblue;" >Edit</button></a></td>
        </tr>
        <?php $i++; } ?>
       
    </table>
</body>
</html>
