<?php
include '../koneksi.php';
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama   = $_POST['nama'];
    $kp   = $_POST['kp'];
    $kt   = $_POST['kt'];
    $ep   = $_POST['ep'];
    $kd   = $_POST['kd'];
    $tj   = $_POST['tj'];
    $ik   = $_POST['ik'];
    //sql update to nilai
    $sql = "UPDATE nilai set
            nama_anggota='$nama',
            n_kerapian='$kp',
            n_kerjasama='$kt',
            n_etika='$ep'
            n_kedisiplinan='$kd',
            n_tanggungjawab='$tj',
            n_inisiatif='$ik'
            where id_nilai = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:../dataNilai.php?message=success");
    } else {
        header("location:../dataNilai.php?message=failed");
    }
}
