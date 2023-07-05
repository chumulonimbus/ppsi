<style>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

.circle-img{
    width: 128px;
    height: 128px;
    object-fit: cover;
    border-radius: 50%;
}
</style>
<div class="m-4">
    <h6 class="mb-3 font-weight-bold">Kehadiran hari ini</h6>
    <div class="row">
        <div class="col-3">
            <div class="card p-4 border-0">
                <p class="mb-2 text-secondary">Total Karyawan</p>
                <div class="d-flex align-items-center">
                    <div class="d-flex" style="width: 50px;height: 50px;background: #d8e7ff;border-radius: 50%;">
                        <i class="mdi mdi-account mdi-24px m-auto" style="color: #287bff"></i>
                    </div>
                    <small class="ml-auto h3 font-weight-bold mb-0"><?= count($b)?></small>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-4 border-0">
                <p class="mb-2 text-secondary">Total Hadir</p>
                <div class="d-flex align-items-center">
                    <div class="d-flex" style="width: 50px;height: 50px;background: #deffd5;border-radius: 50%;">
                        <i class="mdi mdi-account-check mdi-24px m-auto" style="color: #43cb1d"></i>
                    </div>
                    <small class="ml-auto h3 font-weight-bold mb-0"></small>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-4 border-0">
                <p class="mb-2 text-secondary">Total Karyawan</p>
                <div class="d-flex align-items-center">
                    <div class="d-flex" style="width: 50px;height: 50px;background: #d8e7ff;border-radius: 50%;">
                        <i class="mdi mdi-account mdi-24px m-auto" style="color: #287bff"></i>
                    </div>
                    <small class="ml-auto h3 font-weight-bold mb-0">24</small>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-4 border-0">
                <p class="mb-2 text-secondary">Total Karyawan</p>
                <div class="d-flex align-items-center">
                    <div class="d-flex" style="width: 50px;height: 50px;background: #d8e7ff;border-radius: 50%;">
                        <i class="mdi mdi-account mdi-24px m-auto" style="color: #287bff"></i>
                    </div>
                    <small class="ml-auto h3 font-weight-bold mb-0">24</small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card border-0 m-4 p-4">
    <h1>Welcome to our system</h1>
    <div id="myDiv">
        <?php foreach($a as $d){ ?>
            <div class="d-flex">
                <ul style="list-style: none" class="p-0 mr-3">
                    <li>Name</li>
                    <li>Username</li>
                    <li>Email</li>
                </ul>
                <ul style="list-style: none" class="p-0">
                    <li>: <?= $d->nama?></li>
                    <li>: <?= $d->username?></li>
                    <li>: <?= $d->email?></li>
                </ul>
            </div>
        <?php } ?>
    </div>
    <a class="btn btn-primary btn-md" href="<?php echo base_url('login/logout'); ?>">Logout</a>
</div>

<script src="assets/jquery/jquery.js"></script>
<script>
    $('.sidebar-nav li a.active').removeClass('active')
    $('#home').addClass('active')
</script>