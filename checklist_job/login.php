<?php

session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
}

require "function.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $bagian = $_POST["bagian"];
    $sub_bagian = $_POST["sub_bagian"];
    $jabatan = $_POST["jabatan"];
    $_SESSION['username'] = strtoupper($username);
    $_SESSION['bagian'] = strtoupper($bagian);
    $_SESSION['sub_bagian'] = strtoupper($sub_bagian);
    $_SESSION['jabatan'] = strtoupper($jabatan);


    $result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");

    // cek email
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;

            header("Location: form_tanya.php");
            exit;
        }
    }
    $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm bg-light text-dark rounded shadow-lg border">
                    <!-- alert untuk error -->
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                            <strong>Login Gagal</strong> Nama atau Password salah
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="text-center">
                            <h1>Login</h1>
                        </div>
                        <div class="mb-1  row">
                            <input type="username" class="form-control" id="username" name="username" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-1  row">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="mb-1  row">
                            <select class="form-select" name="bagian" id="bagian" required>
                                <option value="">Bagian</option>
                                <option value="Langganan">Langganan</option>
                                <option value="Umum">Umum</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Pemeliharaan">Pemeliharaan</option>
                                <option value="Perencanaan">Perencanaan</option>
                                <option value="SPI">SPI</option>
                                <option value="IT">IT</option>
                                <option value="AMDK">AMDK</option>
                            </select>
                        </div>
                        <div class="mb-1  row">
                            <select class="form-select" name="sub_bagian" id="sub_bagian" required>
                                <option value="">Sub Bagian</option>
                                <option value="Langganan">Langganan</option>
                                <option value="Penagihan">Penagihan</option>
                                <option value="Umum">Umum</option>
                                <option value="Administrasi">Administrasi</option>
                                <option value="Personalia">Personalia</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Kas">Kas</option>
                                <option value="Pembukuan">Pembukuan</option>
                                <option value="Rekening">Rekening</option>
                                <option value="Pemeliharaan">Pemeliharaan</option>
                                <option value="Peralatan">Peralatan</option>
                                <option value="Perencanaan">Perencanaan</option>
                                <option value="Pengawasan">Pengawasan</option>
                                <option value="SPI">SPI</option>
                                <option value="IT">IT</option>
                                <option value="AMDK">AMDK</option>
                            </select>
                        </div>
                        <div class="mb-1  row">
                            <!-- <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required> -->
                            <select class="form-select" name="jabatan" id="jabatan" required>
                                <option value="">Jabatan</option>
                                <option value="Kabag">Kabag</option>
                                <option value="Kasubag">Kasubag</option>
                                <option value="Staf">Staf</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </form>
                    <div align="center">
                        <p>belum punya akun ? </p>
                        <a href="register.php"><button class="btn btn-danger">Daftar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>

</body>

</html>