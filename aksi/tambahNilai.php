<?php
include '../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama   = $_POST['nama'];
    $kp   = $_POST['kp'];
    $kt = $_POST['kt'];
    $ep = $_POST['ep'];
    $kd = $_POST['kd'];
    $tj = $_POST['tj'];
    $ik = $_POST['ik'];
    //sql insert to anggota
    $sql = "INSERT INTO nilai (nama_anggota, n_kerapian, n_kerjasama, n_etika, n_kedisiplinan, n_tanggungjawab, n_inisiatif)
            VALUES ('$nama','$kp','$kt','$ep',$kd',$tj',$ik')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script type='text/Javascript'>alert('berhasil memasukkan data Alternatif')</script>";
        header('location:../dataNilai.php');
    } else {
        echo "<script type='text/Javascript'>alert('Gagal Memasukkan data')</script>";
        header('location:../dataNilai.php');
    }
} else {
}
