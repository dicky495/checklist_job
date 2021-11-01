<?php
$con = mysqli_connect("localhost", "root", "", "db_checklist");
if (!$con) {
    die("koneksi gagal : " . mysqli_connect_errno() . "-" . mysqli_connect_error());
}

// function registrasi
function registrasi($data)
{
    global $con;

    $username = strtoupper(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($con, $data['password']);
    $bagian = strtoupper(stripcslashes($data['bagian']));
    $sub_bagian = strtoupper(stripcslashes($data['sub_bagian']));
    $jabatan = strtoupper(stripcslashes($data['jabatan']));

    // cek duplikasi email
    $result = mysqli_query($con, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        return false;
    }

    // password enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);

    //add user to database
    mysqli_query($con, "INSERT INTO user VALUES('','$username','$password','$bagian','$sub_bagian','$jabatan')");

    return mysqli_affected_rows($con);
}
