<link rel="stylesheet" href="<?= base_url('assets/mdi/css/materialdesignicons.css')?>">
<link rel="stylesheet" href="<?= base_url('assets/datatables/DataTables-1.11.3/css/dataTables.bootstrap4.min.css')?>">
<div class="card border-0 m-4 p-4">
    <h5 class="mb-4">Report Presensi from <?= $detailLaporan[0]['tanggalMulai']." - ".$detailLaporan[0]['tanggalAkhir'];?></h5>
    <div class="table">
        <table class="table w-100" id="tableDetailReportPresensi">
            <thead>
                <tr>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Total Hadir</th>
                    <th scope="col">Total Ijin</th>
                    <th scope="col">Total Sakit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($totalbyname as $e) { ?>
                    <tr>
                        <td><?= $e->nama?></td>
                        <td><?= $e->totalhadir?></td>
                        <td><?= $e->totalijin?></td>
                        <td><?= $e->totalsakit?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= base_url('assets/jquery/jquery.js')?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?= base_url('assets/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/datatables/DataTables-1.11.3/js/dataTables.bootstrap4.min.js')?>"></script>
<script>
    $('.sidebar-nav li a.active').removeClass('active')
    $('#presensi').addClass('active');
    
    $('#tableDetailReportPresensi').DataTable({
        "responsive": true,
        columnDefs: [
            {
                targets: 0,
                width: "50%"
            },
        ]
    })
</script>