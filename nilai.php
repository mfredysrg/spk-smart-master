<?php
include 'cek.php';
include 'templates/head.php';
include 'templates/nav.php';
include 'koneksi.php';
?>

<div class="container-fluid fixed">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <h1>Input Nilai
                        <a href="dataNilai.php" class="float-right btn btn-info">Lihat Data</a>
                    </h1>
                </div>
                <div class="card-body">
                    <form role="form" action="aksi/tambahNilai.php" method="POST">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <select name="nama" class="form-control">
                                <?php
                                $sql = "SELECT * FROM anggota";
                                $querry = mysqli_query($conn, $sql);
                                while ($anggota = mysqli_fetch_array($querry)) {
                                    echo '<option value="' . $anggota['nama_anggota'] . '">
                                    ' . $anggota['nama_anggota'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kerapian dan Penampilan</label>
                            <input required type="text" class="form-control" name="kp" placeholder="Masukkan nilai Kerapian dan Penampilan...">
                        </div>
                        <div class="form-group">
                            <label for="">Kerjasama Tim</label>
                            <input required type="text" class="form-control" name="kt" placeholder="Masukkan nilai Kerjasama Tim...">
                        </div>
                        <div class="form-group">
                            <label for="">Etika dan Perilaku</label>
                            <input required type="text" class="form-control" name="ep" placeholder="Masukkan nilai Etika dan Perilaku...">
                        </div>
                        <div class="form-group">
                            <label for="">Kedisiplinan</label>
                            <input required type="text" class="form-control" name="kd" placeholder="Masukkan nilai Kedisiplinan..."></div>
                        <div class="form-group">
                            <label for="">Tanggung Jawab Terhadap Pekerjaan</label>
                            <input required type="text" class="form-control" name="tj" placeholder="Masukkan nilai Tanggung Jawab Terhadap Pekerjaan...">
                        </div>
                        <div class="form-group">
                            <label for="">Inisiatif dan Kreatifitas</label>
                            <input required type="text" class="form-control" name="ik" placeholder="Masukkan nilai Inisiatif dan Kreatifitas...">
                        <div class="form-group">
                            <input type="submit" name="tambah" class="btn btn-primary float-right" value="Input Nilai">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->
<?php
include 'templates/footer.php';
?>
</div>
<!-- End of Page Wrapper -->

<!-- Hapus Modal-->
<?php
$sql = "SELECT * FROM nilai";
$query = mysqli_query($conn, $sql);
$nilai = mysqli_fetch_assoc($query);
?>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan Hapus Data !!!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data ini ???</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="aksi/hapusNilai.php?name=<?= $nilai['nama_anggota']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>

<?php
include 'templates/foot.php';
?>