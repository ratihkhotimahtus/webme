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


   function register($data)
   {
        global $koneksi;

        $username = stripslashes($data["username"]);
        $password1 = $data["password1"];
        $password2 = $data["password2"];

        $query = "SELECT * FROM user WHERE username='$username'";

        $username_check = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($username_check) > 0 )
        {
            return "Username Sudah Terdaftar!";
        }

        if(!preg_match('/^[a-zA-Z0-9.-_]+$/', $username))
        {
            return "Username Tidak Valid";
        }

        if($password1 !== $password2)
        {
            return "Konfirmasi Password Salah!";
        }

        $encrypt_pass = password_hash($password1, PASSWORD_DEFAULT );

        // return $encrypt_pass;

        $query_insert = "INSERT INTO user (username, password) VALUE ('$username', '$encrypt_pass')";

        if(mysqli_query($koneksi, $query_insert))
        {
            return "Register Berhasil";
        }
        else
        {
            return "Gagal" . mysqli_error($koneksi);
        }


   }


   ?>