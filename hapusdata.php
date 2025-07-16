<?php

    session_start();

   if(!isset($_SESSION["login"]))
   {
    header("Location: login1.php");
    exit;
   }
   
    require 'function.php';

    $id = $_GET['id'];

    if(hapusdata($id)> 0)
    {
          echo "
            <script>
                alert('Berhasil Dihapus!');
                document.location.href = '../datamahasiswa.php';
            </script>
            ";
    }
    else
    {
         echo "
            <script>
                alert(Gagal Dihapus!');
                document.location.href = '../datamahasiswa.php';
            </script>
            ";
            mysqli_error($koneksi);
    }



?>