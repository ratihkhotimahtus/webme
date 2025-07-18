<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER | TANAMAN</title>
</head>
<body>
    <h1>REGISTER</h1>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <!-- Nama lengkap -->
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" name="nama" id="nama" required><br><br>

        <!-- Email -->
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <!-- Password -->
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <!-- Umur -->
        <label for="umur">Umur:</label><br>
        <input type="number" name="umur" id="umur" min="1" required><br><br>

        <!-- Tanggal Lahir -->
        <label for="tanggal_lahir">Tanggal Lahir:</label><br>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required><br><br>

        <!-- Warna Favorit -->
        <label for="warna_favorit">Warna Favorit:</label><br>
        <input type="color" name="warna_favorit" id="warna_favorit"><br><br>

        <!-- Foto Profil -->
        <label for="foto">Upload Foto Profil:</label><br>
        <input type="file" name="foto" id="foto" accept="image/*"><br><br>

        <!-- Jenis Kelamin -->
        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" id="laki" required>
        <label for="laki">Laki-laki</label><br>
        <input type="radio" name="jenis_kelamin" value="Perempuan" id="perempuan">
        <label for="perempuan">Perempuan</label><br><br>

        <!-- Hobi -->
        <label>Hobi:</label><br>
        <input type="checkbox" name="hobi[]" value="Membaca" id="membaca">
        <label for="membaca">Membaca</label><br>
        <input type="checkbox" name="hobi[]" value="Traveling" id="traveling">
        <label for="traveling">Traveling</label><br>
        <input type="checkbox" name="hobi[]" value="Olahraga" id="olahraga">
        <label for="olahraga">Olahraga</label><br><br>

        <!-- Negara -->
        <label for="negara">Negara:</label><br>
        <select name="negara" id="negara" required>
            <option value=""> Pilih Negara </option>
            <option value="USA">USA</option>
            <option value="UK">UK</option>
            <option value="Indonesia">Indonesia</option>
        </select><br><br>

        <!-- Biografi -->
        <label for="bio">Biografi Singkat:</label><br>
        <textarea name="bio" id="bio" rows="4" cols="40" placeholder="Ceritakan sedikit tentang dirimu..."></textarea><br><br>

        <!-- Tombol -->
        <input type="submit" value="Daftar">
    </form>

    <p>Sudah punya akun? <a href="login.php">Login</a></p>
</body>
</html>
