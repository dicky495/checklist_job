<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "function.php";

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
    <div class="row justify-content-center">
        <div class="col-sm-4 text-center">
            <a href="index.php"><button class="btn btn-outline-success"><img src="img/backspace.svg" alt=""></button></a>
        </div>
        <div class="col-sm-4 text-center">
            <h3><button class="btn btn-outline-success" id="belum"><img src="img/calendar3.svg" alt=""></button></h3>
        </div>
        <div class="col-sm-4 text-center">
            <a href="#"><button class="btn btn-outline-success"><img src="img/printer.svg" alt=""></button></a>
        </div>
    </div>
    <div class="container-fluid" id="tanya" style="display: none;">
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
                                <button type="submit" name="add_post" id="tombol_pilih" class="btn btn-dark">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <br>
    <div class="container" id="tabel">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-center" width=5%>No</th>
                    <th scope="col" class="text-center" width=60%>Nama Pekerjaan</th>
                    <th scope="col" class="text-center" width=10%>Status</th>
                    <th scope="col" class="text-center" width=25%>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $table = trim(substr($_SESSION['username'], 0, 6));
                $query = mysqli_query($con, "SELECT * FROM $table WHERE status_task = 'Selesai'");
                if (isset($_POST["add_post"])) {
                    $tahun = $_POST['tahun'];
                    $bulan = $_POST['bulan'];
                    $query = mysqli_query($con, "SELECT * FROM $table WHERE status_task = 'Selesai' AND bulan = '$bulan' AND tahun = '$tahun'");


                ?>
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <?php
                        $tgls = strtotime($row['date_task']);
                        $tanggal = date('d M Y', $tgls);
                        ?>
                        <tr>
                            <th scope="row" class="text-center"><?php echo $no++ ?></th>
                            <td><?php echo $row['name_task']; ?></td>
                            <td class="text-center"><?php echo $row['status_task']; ?></td>
                            <td class="text-center"><?php echo $tanggal; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <script>
        const tanya = document.getElementById('tanya');
        const tombol_belum = document.getElementById('belum');
        const tombol_pilih = document.getElementById('tombol_pilih');
        const tabel = document.getElementById('tabel');

        tombol_belum.addEventListener('click', function() {
            if (tanya.style.display == "none") {
                tanya.style.display = "block";
            }
        });
        tombol_pilih.addEventListener('click', function() {
            if (tanya.style.display == "block") {
                tanya.style.display = "none";
            }
        });
    </script>
    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>
</body>

</html>