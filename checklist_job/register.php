<?php

require "function.php";

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        $success = true;
    } else {
        $error = true;
        echo mysqli_error($con);
    }
}

if (isset($_POST["register"])) {
    $table = trim(substr($_POST["username"], 0, 6));
    $query  = "CREATE TABLE $table (id_task INT(10) AUTO_INCREMENT, ";
    $query .= "name_task VARCHAR(50),";
    $query .= "status_task VARCHAR(50), ";
    $query .= "tahun VARCHAR(4), ";
    $query .= "bulan VARCHAR(2), ";
    $query .= "date_task DATE, PRIMARY KEY (id_task))";
    $hasil_query = mysqli_query($con, $query);
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
                <div class="col-sm bg-dark text-light rounded ">
                    <!-- alert untuk success -->
                    <?php if (isset($success)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Registrasi Berhasil</strong> Silakan <a href="login.php">Login</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- alert untuk error -->
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                            <strong>Email sudah terdaftar</strong> Silakan <a href="login.php"><button class="badge btn-primary">Login</button></a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="text-center">
                            <h1>REGISTER</h1>
                        </div>
                        <div class="mb-1 form-group row">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-1 form-group row">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        </div>
                        <div class="mb-1 form-group row">
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
                        <div class="mb-1 form-group row">
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
                        <div class="mb-1 form-group row">
                            <!-- <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required> -->
                            <select class="form-select" name="jabatan" id="jabatan" required>
                                <option value="">Jabatan</option>
                                <option value="Kabag">Kabag</option>
                                <option value="Kasubag">Kasubag</option>
                                <option value="Staf">Staf</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="register">Submit</button>
                    </form>
                    <div align="center">
                        <p>sudah punya akun ? </p>
                        <a href="login.php"><button class="btn btn-danger">Login</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>

</body>

</html>