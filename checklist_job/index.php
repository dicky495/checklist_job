<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "function.php";

$table = trim(substr($_SESSION['username'], 0, 6));
// if (isset($_POST["add_post"])) {
//     $tahun = $_POST['tahun'];
//     $bulan = $_POST['bulan'];
//     $name_task = mysqli_real_escape_string($con, $_POST['name_task']);

//     $query = mysqli_query($con, "INSERT INTO $table (name_task, status_task, tahun, bulan , date_task)  VALUES ('$name_task', 'Pending', YEAR(now()), month(now()) , now())");
//     header("Location: index.php");
// }
if (isset($_GET['edit'])) {

    $id_task = $_GET['edit'];
    $query = mysqli_query($con, "UPDATE $table SET status_task = 'Selesai',date_task = now() Where id_task = '$id_task'");
    header("Location: index.php");
}

if (isset($_GET['delete'])) {
    $id_task = $_GET['delete'];
    $query = mysqli_query($con, "DELETE FROM $table WHERE id_task = '$id_task'");
    header("Location: index.php");
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
    <title>Halaman Utama</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-sm-4">
                <a class="navbar-brand text-dark" href="#"><b><?php echo $_SESSION['username']; ?></b></a>
            </div>
            <div class="col-sm-2 mt-1">
                <p><b>BAGIAN : <?php echo $_SESSION['bagian']; ?></b></p>
            </div>
            <div class="col-sm-3 mt-1">
                <p><b>JABATAN : <?php echo $_SESSION['jabatan']; ?> <?php echo $_SESSION['sub_bagian']; ?></b></p>
            </div>
            <div class="col-sm-2 text-end">
                <a href="form_tanya.php">
                    <button class="btn btn-outline-danger" type="submit">Tambah Pekerjaan</button>
                </a>
            </div>
            <div class="col-sm-1 text-end">
                <a href="#">
                    <button class="btn btn-outline-danger" type="submit" id="tombol">Logout</button>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card bg-dark shadow-lg border-0 text-center text-light">
                    <div class="card-body">
                        <h3>FORM TAMBAH PEKERJAAN</h3>
                        <form action="" method="POST">
                            <div class="form-group mb-1">
                                <input type="text" class="form-control" name="name_task" placeholder="Input Pekerjaan" required>
                            </div>
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
                                <button type="submit" name="add_post" class="btn btn-dark">Tambah Pekerjaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br> -->
        <div class="row g-1">
            <div class="col-md-6">
                <!-- pending todolist -->
                <div class="card bg-danger shadow-lg border-0 text-center">
                    <div class="card-body">
                        <h3 class="text-light">List Pending Pekerjaan</h3>
                        <ul class="list-group text-start">
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM $table WHERE status_task = 'Pending'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id_task = $row['id_task'];
                                $name_task = $row['name_task'];
                            ?>
                                <li class="list-group-item">
                                    <?php echo $name_task; ?>
                                    <div style="float: right;">
                                        <a href="index.php?edit=<?php echo $id_task ?>">
                                            <span class="badge bg-danger" id="proses">Proses</span>
                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                            </svg> -->
                                        </a>
                                        <!-- <a href="index.php?delete=<?php echo $id_task ?>" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg>
                                        </a> -->
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- todolist selesai -->
            <div class="col-md-6">
                <div class="card bg-primary shadow-lg border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="text-light text-center">Pekerjaan Selesai</h3>
                            </div>
                            <div class="col-sm-2 text-end">
                                <a href=""><button class="btn btn-outline-light">
                                        <img src="img/printer.svg" alt="">
                                    </button></a>
                            </div>
                        </div>
                        <ul class="list-group">
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM $table WHERE status_task = 'Selesai'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id_task = $row['id_task'];
                                $date_task = strtotime($row['date_task']);
                            ?>
                                <li class="list-group-item">
                                    <?php echo $row['name_task'] ?>
                                    <div style="float: right;">
                                        <span class="badge bg-primary">Selesai</span>
                                        <span class="badge bg-primary"><?php echo date("d M Y", $date_task); ?></span>
                                        <!-- <a href="index.php?delete=<?php echo $id_task ?>" class="btn btn-danger badge bg-danger">Hapus</a> -->
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>
    <script src="asset/sweetalert2.all.min.js"></script>
    <script src="asset/jquery-3.6.0.min.js"></script>
    <script>
        const tombol = document.querySelector('#tombol');
        tombol.addEventListener('click', function() {
            Swal.fire({
                title: 'Yakin Mau Logout..?',
                text: "Anda akan keluar dari halaman ini..!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout..!'
            }).then((keluar) => {
                if (keluar.isConfirmed) {
                    document.location.href = 'logout.php';
                    Swal.fire(
                        'SELAMAT..!',
                        'Anda Berhasil Logout...',
                        'success'
                    )
                }

            })
        });

        // const proses = document.getElementsByClassName('list-group-item');
        // console.info(proses);
        // proses.addEventListener('mouseover', function() {
        //     proses.innerHTML = "Pekerjaan telah Selesai";
        // });
    </script>


</body>

</html>