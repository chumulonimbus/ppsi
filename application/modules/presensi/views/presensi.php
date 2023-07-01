<link rel="stylesheet" href="<?= base_url('assets/mdi/css/materialdesignicons.css')?>">
<link rel="stylesheet" href="assets/datatables/DataTables-1.11.3/css/dataTables.bootstrap4.min.css">
<style>

</style>
<div class="modal fade" id="buatPresensi" tabindex="-1" role="dialog" aria-labelledby="buatPresensiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h5 class="modal-title mb-3" id="buatPresensiLabel">Presensi</h5>
                <form action="presensi/addPresensi" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">NIP</label>
                        <input type="text" class="form-control" name="nip" value="<?php echo $this->session->userdata("nip") ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" value="<?php echo $this->session->userdata("username") ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Hari / Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="date" placeholder="dd-mm-yyyy" readonly>
                    </div>
                    <div class="d-block mb-5">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="hadir" name="statusPresensi" class="custom-control-input" value="Hadir">
                            <label class="custom-control-label" for="hadir">Hadir</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="ijin" name="statusPresensi" class="custom-control-input" value="Ijin">
                            <label class="custom-control-label" for="ijin">Ijin</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sakit" name="statusPresensi" class="custom-control-input" value="Sakit">
                            <label class="custom-control-label" for="sakit">Sakit</label>
                        </div>
                        <div class="form-group mt-3" id="suratDokter">
                            <label for="">Upload Surat Dokter</label>
                            <input type="file" name="suratdok" class="form-control" id="" placeholder="Surat Dokter">
                        </div>
                        <div class="form-group mt-3" id="KeteranganIjin">
                            <label for="">Keterangan</label>
                            <input type="text" name="ketIjin" class="form-control" id="" placeholder="Keterangan ijin">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="buatLaporanPresensi" tabindex="-1" role="dialog" aria-labelledby="buatLaporanPresensiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h5 class="modal-title mb-3" id="buatLaporanPresensiLabel">Laporan Presensi</h5>
                <form action="presensi/addLaporanPresensi" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Laporan</label>
                        <input type="text" class="form-control" name="nama_laporan" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tanggalmulai" placeholder="dd-mm-yyyy" value="">
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggalakhir" placeholder="dd-mm-yyyy">
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 m-4 p-4">
    <h5 class="mb-4">Data Presensi</h5>
    <div class="table mb-5">
        <?php if($this->session->userdata('role') == "karyawan") {?>
            <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#buatPresensi">Presensi +</button>    
        <?php } else {?>
            <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#buatLaporanPresensi">Buat Laporan +</button>    
        <?php } ?>
        <table class="table w-100" id="tablePresensi">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Surat Dokter</th>
                    <th scope="col">Alasan Ijin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($DataPresensi as $d) { ?>
                <tr>
                    <td><?= $d->nama?></td>
                    <td><?= $d->tanggal?></td>
                    <td><?= $d->status_presensi?></td>
                    <td>
                        <div style="width: 40px; height: 40px;">
                            <img class="img-fluid" src="<?php echo base_url('/assets/images/upload/'.$d->path_foto) ?>" alt="">
                        </div>
                    </td>
                    <td><?= $d->keteranganIjin?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php if($this->session->userdata('role') == "admin") {?>
<div class="card border-0 m-4 p-4">
    <h5 class="mb-4">Report Presensi</h5>
    <div class="table">
        <table class="table w-100" id="tableReportPresensi">
            <thead>
                <tr>
                    <th scope="col">Nama Report</th>
                    <th scope="col">Total Karyawan Hadir</th>
                    <th scope="col">Total Ijin</th>
                    <th scope="col">Total Sakit</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($DataLaporanPresensi as $e) { ?>
                <tr>
                    <td><?= $e->nama_laporan?></td>
                    <td><?= $e->total_masuk?></td>
                    <td><?= $e->total_ijin?></td>
                    <td><?= $e->total_sakit?></td>
                    <td>
                        <a class="dropdown-toggle" href="#" role="button" id="<?= $e->idreport?>" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal mdi-24px"></i>                        
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="<?= $e->idreport?>">
                            <a href="<?= base_url('presensi/detailLaporan/'.$e->idreport)?>" class="dropdown-item" type="button">
                                <i class="mdi mdi-eye mr-3"></i>Detail
                            </a>
                            <a href="#" class="dropdown-item" type="button">
                                <i class="mdi mdi-delete mr-3"></i>Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php }?>

<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
<script src="assets/datatables/DataTables-1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('.sidebar-nav li a.active').removeClass('active')
    $('#presensi').addClass('active');
    $('.dropdown-toggle').dropdown()
    $("#date").val(getDate());

    $("input[type='date']").change(function(){
        console.log($(this).val())
    })

    $("#suratDokter, #KeteranganIjin").hide();
    $("input[type='radio']").click(function(){
        if($("#sakit").is(":checked")){
            $("#suratDokter").show();
            $("#KeteranganIjin").hide();
        }else if($("#ijin").is(":checked")){
            $("#KeteranganIjin").show();
            $("#suratDokter").hide();
        }else{
            $("#suratDokter, #KeteranganIjin").hide();
        }
    })
    $('#tablePresensi').DataTable({
        "responsive": true,
        columnDefs: [
            { 
                orderable: false,
                className: "text-center",
                targets: -1,
                width: "15%"
            }
        ]
    })
    $('#tableReportPresensi').DataTable({
        "responsive": true,
        columnDefs: [
            { 
                orderable: false,
                className: "text-center",
                targets: -1,
                width: "10%"
            }
        ]
    })

    function getDate(){
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        return yyyy + '-' + mm + '-' + dd;
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [day, month, year].join('-');
    }
</script>