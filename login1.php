<?php
    session_start();

    if (isset($_SESSION["login"]))
    {
        header("Location: datamahasiswa.php");
        exit;
    }


    require 'function.php';
    $error = false;

    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user where username= '$username'";

        $result = mysqli_query($koneksi, $query);

        $user = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0)
        {
            if(password_verify($password, $user["password"]))
            {
                $_SESSION["login"] = $user["id"];
                header("Location: datamahasiswa.php");
                exit;
            }
        }

        $error = true;

        
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
    <h1> Login </h1>
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
                    id="password"
                    name="password">
                </div>

                <?php if($error) { ?>
                     <p style="color: black;">Username/Password Salah!</p>
                <?php } ?>


                <button type="submit" name="login" class="btn btn-primary">Submit</button>
            </form>
        </div>   
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>