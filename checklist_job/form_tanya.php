<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "function.php";

$table = trim(substr($_SESSION['username'], 0, 6));
if (isset($_POST["add_post"])) {

    $name_task = mysqli_real_escape_string($con, $_POST['name_task']);

    $query = mysqli_query($con, "INSERT INTO $table (name_task, status_task, tahun, bulan , date_task)  VALUES ('$name_task', 'Pending', YEAR(now()), month(now()) , now())");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tanya</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
    <header>
        <?php include "header.php" ?>
    </header>
    <br>
    <div class="container-fluid" style="display: none;">
        <div class="row justify-content-center">
            <div class="col-sm-3">
                <div class="card bg-dark shadow-lg border-0 text-center text-light">
                    <div class="card-body">
                        <h3>Pilih Bulan</h3>
                        <form action="" method="POST">
                            <div class="form-group">
                                <select name="bulan" class="form-select mb-1">
                                    <option value="">Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <select name="tahun" class="form-select">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 100; $i++) {
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="add_post" class="btn btn-dark">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="container-fluid mt-1">
        <div class="row justify-content-center">
            <div class="col-sm-4 text-center">
                <h3 class="text-dark"><?php echo $_SESSION['username']; ?></h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 text-center">
                <h3>Sudah Memiliki Daftar Pekerjaan...?</h3>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-sm-3">
                <h3></h3>
            </div>
            <div class="col-sm-3 text-center">
                <h3><a href="index.php"><button class="btn btn-primary">Sudah</button></a></h3>
            </div>
            <div class="col-sm-3 text-center">
                <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Belum
                </button> -->
                <h3><button class="btn btn-danger" id="belum">Belum</button></h3>
            </div>
            <div class="col-sm-3">
                <h3></h3>
            </div>
        </div>
    </div>
    <br>

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pekerjaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="form_tanya.php" method="POST">
                        <div class="form-group mb-1">
                            <input type="text" class="form-control" name="name_task" placeholder="Input Pekerjaan" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="add_post" class="btn btn-dark">Tambah Pekerjaan</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end modal -->
    <div class="container" id="tanya" style="display: none;">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card bg-dark shadow-lg border-0 text-center text-light">
                    <div class="card-body">
                        <h3>FORM TAMBAH PEKERJAAN</h3>
                        <form action="" method="POST">
                            <div class="form-group mb-1">
                                <input type="text" class="form-control" name="name_task" placeholder="Input Pekerjaan" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="add_post" class="btn btn-dark">Tambah Pekerjaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const tanya = document.getElementById('tanya');
        const tombol_belum = document.getElementById('belum');

        tombol_belum.addEventListener('click', function() {
            if (tanya.style.display == "none") {
                tanya.style.display = "block";
            }
        });
    </script>
    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>
</body>

</html>