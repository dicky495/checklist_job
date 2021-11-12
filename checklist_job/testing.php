<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "function.php";
$table = trim(substr($_SESSION['username'], 0, 6));

$query_task = mysqli_query($con, "SELECT name_task FROM dicky");
while ($row = mysqli_fetch_assoc($query_task)) {
    $name_task = $row['name_task'];
}

if (isset($_POST["add_post"])) {
    $name_task = mysqli_real_escape_string($con, $_POST['name_task']);

    if ($nametask == $name_task) {
        $error = true;
    }
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
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container" id="tanya" style="display: none;">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card bg-dark shadow-lg border-0 text-center text-light">
                    <div class="card-body">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                                <strong>Daftar Pekerjaan Sudah Ada</strong><br>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
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

    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>
</body>

</html>