<?php
include 'cek.php';
include 'templates/head.php';
include 'templates/nav.php';
include 'koneksi.php';
?>

<div class="container-fluid fixed">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1>Hasil Penerimaan Anggota</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama Anggota</th>
                                    <th colspan="6">Nilai</th>
                                    <th rowspan="2">Aksi</th>
                                    <th rowspan="2">Keterangan</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Kerapian dan Penampilan</th>
                                    <th>Kerjasama Tim</th>
                                    <th>Etika dan Perilaku</th>
                                    <th>Kedisiplinan</th>
                                    <th>Tanggung Jawab</th>
                                    <th>Inisiatif dan Kreatifitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;

                                $sqljumlah = "SELECT SUM(bobot) FROM kriteria";
                                $queryjumlah = mysqli_query($conn, $sqljumlah);
                                $jumlah0 = mysqli_fetch_array($queryjumlah);
                                $jumlah = $jumlah0[0];

                                // bobot
                                $sqlkriteria = "SELECT bobot FROM kriteria";
                                $querykriteria = mysqli_query($conn, $sqlkriteria);
                                $bobot = [];
                                while ($bariskriteria = mysqli_fetch_array($querykriteria)) {
                                    $bobot[] = $bariskriteria['bobot'];
                                }
                                // var_dump($bobot);die();
                                //end bobot

                                //nilai 
                                $sqlnilai = "SELECT * FROM nilai";
                                $querynilai = mysqli_query($conn, $sqlnilai);
                                while ($barisnilai = mysqli_fetch_array($querynilai)) {
                                    //nilai
                                    $nilaiP = $barisnilai['n_kerapian'] * ($bobot[1] / $jumlah);
                                    $nilaiK = $barisnilai['n_kerjasama'] * ($bobot[2] / $jumlah);
                                    $nilaiF = $barisnilai['n_etika'] * ($bobot[0] / $jumlah);
                                    $nilaievaluasi = $nilaiP + $nilaiK + $nilaiF;
                                    if ($nilaievaluasi >= 80) {
                                        $keterangan = "DITERIMA";
                                    } else {
                                        $keterangan = "TIDAK DITERIMA";
                                    }
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $n ?></td>
                                        <td><?= $barisnilai['nama_anggota'] ?></td>
                                        <td class="text-center"><?= $barisnilai['n_kerapian'] ?></td>
                                        <td class="text-center"><?= $barisnilai['n_kerjasama'] ?></td>
                                        <td class="text-center"><?= $barisnilai['n_etika'] ?></td>
                                        <td class="text-center"><?= round($nilaievaluasi, 3) ?></td>
                                        <td class="text-center"><?= $keterangan ?></td>
                                    </tr>
                                <?php
                                    $n++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
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