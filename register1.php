<?php
    require 'function.php';

    if(isset($_POST["register"]))
    {
        $message = register($_POST);

        if($message === "Register Berhasil")
        {
            echo "
                <script>
                    alert('" . addslashes($message) . "');
                    document.location.href='login1.php';
                </script>
            ";
        }
        else
        {
            echo "
                <script>
                    alert('" . addslashes($message) . "');
                    document.location.href='register1.php';
                </script>
            ";

        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>
<body>
    <h1> Register </h1>
    <div class="card" style="width: 500px; background-color: darkmagenta; 
    color: whitesmoke">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" 
                    class="username">Username</label>
                    <input type="text" class="form-control" 
                    id="username" 
                    name="username">
                </div>

                <div class="mb-3">
                    <label for="password" 
                    class="form-label"> Password: </label>
                    <input type="password" 
                    class="form-control" 
                    id="password1"
                    name="password1">
                </div>

                <div class="mb-3">
                    <label for="password2" 
                    class="form-label">Konfirmasi Password: </label>
                    <input type="password" 
                    class="form-control" 
                    id="password2"
                    name="password2">
                </div>

                <button type="submit" name="register" class="btn btn-primary">Submit</button>
            </form>
        </div>   
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>