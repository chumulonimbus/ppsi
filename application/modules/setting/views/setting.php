<style>

</style>
<div class="row m-4">
    <div class="col-4 px-0 pr-3">
        <div class="card border-0 p-4">
            <div class="image-profile rounded-circle mb-5" style="width: 60px; height: 60px">
                <p class="m-auto text-profile-letter" style="font-size: 24px"><?php $uname = $this->session->userdata("username"); $letter = mb_substr($uname, 0, 1); echo $letter; ?></p>
            </div>
            <div class="mx-auto d-flex align-items-center">
                <span class="badge badge-pill badge-secondary" style="font-weight: inherit">System Analyst</span>
                <p class="mb-0 mx-3">|</p>
                <span class="badge badge-pill badge-secondary" style="font-weight: inherit">Backend Dev</span>
            </div>
            <p class="mb-0">Income: Rp3000000</p>
        </div>
    </div>
    <div class="col-8 px-0 pl-3">
        <div class="card border-0 p-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" class="form-control" name="nip" value="<?php echo $this->session->userdata("nip") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("nama") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("username") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("no_telp") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("email") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("tempat_lahir") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("tanggal_lahir") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("jenis_kelamin") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("alamat") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Status Kerja</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("status_kerja") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("status") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tanggungan</label>
                    <input type="text" class="form-control" value="<?php echo $this->session->userdata("tanggungan") ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" value="<?php echo $this->session->userdata("password") ?>" readonly>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/jquery/jquery.js"></script>
<script>
    $('.sidebar-nav li a.active').removeClass('active')
    $('#settings').addClass('active')
</script>