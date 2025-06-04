<?php
   // $nama = "Ratih Khotimahtus S";
   // echo "Hello World" . $nama;

   $koneksi = mysqli_connect("localhost:3307","root", "", "webif");

   if(!$koneksi)
   {
    die("Koneksi Gagal!".mysqli_connect_error());
   }
   else
   {
    echo "Koneksi Berhasil";
   }

   $query = "SELECT * FROM mahasiswa";

   $result = mysqli_query($koneksi, $query); //// object

   /// ambil data (fetch) dari lemari result

    $mhs = mysqli_fetch_array($result);
   ///mysqli_fetch_row() untuk array tipe numerik
   /// mysqli_fetch_assoc() untuk assosiatif
   /// mysqli_fetch_array()
   /// mysqli_fetch_object() pakai var_dump($mhs->nama);

   var_dump($mhs["nama"]);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>


    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>No Hp</th>
        </tr>


    </table>
</body>
</html>