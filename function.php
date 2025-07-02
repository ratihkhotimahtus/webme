<?php

   /// cek koneksi apakah sudah terhubung atau blm
   $koneksi = mysqli_connect("localhost:3307","root", "", "webif");

   if(!$koneksi)
   {
    die("Koneksi Gagal!".mysqli_connect_error());
   }
   else
   {
    echo "Koneksi Berhasil";
   }

   function query($query)
   {
    global $koneksi;
    $result = mysqli_query($koneksi, $query); //// object

    $rows = [];

    while ($row = mysqli_fetch_assoc($result) )
    {
        $rows[] = $row;
    }

    return $rows;

   }

   function tambahmahasiswa($data)
   {
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $nohp = $data["nohp"];

    // Handle upload foto
    $file = $_FILES['foto']['name'];
    $namafile = date ('day_hm'). '_' . $file;
    $temp = $_FILES['foto']['tmp_name'];
    $folder = 'images/';
    $path = $folder . $namafile;

    // Pindahkan file ke folder images/
    if(move_uploaded_file($temp, $path)) {
        // Simpan nama file ke DB
        $query = "INSERT INTO mahasiswa VALUES ('', '$namafile', '$nama', '$nim', '$jurusan', '$nohp')";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    } else {
        return 0; // gagal upload
    }
   }
   
   function hapusdata($id)
   {
    global $koneksi;

    $query = "DELETE FROM mahasiswa where id=$id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
   }

   function ubahdata($data, $id)
   {
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $nohp = $data["nohp"];

    // Handle upload foto
    $file = $_FILES['foto']['name'];
    $namafile = date ('day_hm'). '_' . $file;
    $temp = $_FILES['foto']['tmp_name'];
    $folder = 'images/';
    $path = $folder . $namafile;

    // Pindahkan file ke folder images/
    if(move_uploaded_file($temp, $path)) {
        // Simpan nama file ke DB
        $query = "UPDATE mahasiswa SET foto = '$namafile', nama='$nama', nim = '$nim', jurusan = '$jurusan', nohp = '$nohp' WHERE id=$id; "; 
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    } else {
        return 0; // gagal upload
    }
   }

   ?>