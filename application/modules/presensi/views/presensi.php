<link rel="stylesheet" href="assets/mdi/css/materialdesignicons.css">
<link rel="stylesheet" href="assets/datatables/DataTables-1.11.3/css/dataTables.bootstrap4.min.css">
<style>

</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h5 class="modal-title mb-3" id="exampleModalLabel">Presensi</h5>
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
                        <input type="text" class="form-control" name="tanggal" id="date" placeholder="dd-mm-yyyy" readonly>
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
<div class="card border-0 m-4 p-4">
    <div class="table">
        <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#exampleModal">Presensi +</button>
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
                    <th><?= $d->nama?></th>
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

<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/popper/popper.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
<script src="assets/datatables/DataTables-1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('.sidebar-nav li a.active').removeClass('active')
    $('#presensi').addClass('active')
    $("#date").val(getDate());

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

    function getDate(){
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        return mm + '-' + dd + '-' + yyyy;
    }
</script>