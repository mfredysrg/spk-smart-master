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
                    <h1>Update Nilai</h1>
                </div>
                <div class="card-body">
                    <form role="form" action="aksi/updateNilai.php" method="POST">
                        <?php
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM nilai WHERE id_nilai = '$id'";
                        $querry = mysqli_query($conn, $sql);
                        $tampilNilai = mysqli_fetch_array($querry);
                        ?>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $tampilNilai['id_nilai']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input readonly type="text" class="form-control" name="nama" value="<?php echo $tampilNilai['nama_anggota']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Kerapian dan Penampilan</label>
                            <input required type="text" class="form-control" name="kp" value="<?php echo $tampilNilai['n_kerapian']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Kerjasana Tim</label>
                            <input required type="text" class="form-control" name="kt" value="<?php echo $tampilNilai['n_kerjasama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Etika dan Perilaku</label>
                            <input required type="text" class="form-control" name="ep" value="<?php echo $tampilNilai['n_etika']; ?>">              
                        </div>
                        <div class="form-group">
                            <label for="">Kedisiplinan</label>
                            <input required type="text" class="form-control" name="kd" value="<?php echo $tampilNilai['n_kerjasama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggung Jawab Terhadap Pekerjaan</label>
                            <input required type="text" class="form-control" name="tj" value="<?php echo $tampilNilai['n_kerjasama']; ?>"></div>
                        <div class="form-group">
                            <label for="">Inisiatif dan Kreatifitas</label>
                            <input required type="text" class="form-control" name="ik" value="<?php echo $tampilNilai['n_etika']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary float-right" value="Update Nilai">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->

<?php
include 'templates/footer.php';
?>

</div>
<!-- End of Content Wrapper -->

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