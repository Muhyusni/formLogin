<?php
include 'config.php';
session_start();
 
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$nd = "";
$nb = "";
$email = "";
$password = "";
$cpassword = "";


if (isset($_POST['submit'])) {
    $nd = $_POST['namaDepan'];
    $nb = $_POST['namaBelakang'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $cpassword = $_POST['cpassword']; 
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (nama_depan, nama_belakang, email, password)
                    VALUES ('$nd','$nb', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $nd = "";
                $nb = "";
                $email = "";
                $password = "";
                $cpassword = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Nama depan" name="namaDepan" value="<?php echo $nd; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Nama Belakang" name="namaBelakang" value="<?php echo $nb; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $cpassword; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login</a></p>
        </form>
    </div>
</body>
</html>