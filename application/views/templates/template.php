<!-- <!doctype html>
<html lang="en">
  <head>
    Required meta tags
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    Bootstrap CSS
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    {content}

    Optional JavaScript; choose one of the two!

    Option 1: jQuery and Bootstrap Bundle (includes Popper)
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    Option 2: Separate Popper and Bootstrap JS
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
   
  </body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Employee</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/mdi/css/materialdesignicons.css">
</head>
<style>
    @font-face {
        font-family: 'Poppins';
        src:  url('assets/font/poppins/Poppins-Regular.ttf');
    }
    html, body{
        font-family: 'Poppins' !important;
        background-color: #f3f8ff;
        font-size: 14px;
        height: 100%
    }
    .container-scroller{
        overflow: hidden;
        height: inherit
    }
    .container-wrapper{
        position: relative;
        overflow: hidden;
        display: flex;
        height: inherit
    }
    .sidebar{
        width: 250px;
        height: 100%;
        position: relative;
        background-color: #287bff;
    }
    .container-content{
        width: calc(100% - 250px);
        /* height: 100vh; */
        position: relative;
        overflow: auto
    }
    .container-navbar{
        height: 63px;
    }
    .form-control.border-0.bg-light:focus{
        box-shadow: unset;
    }
    .image-profile{
        display: flex;
        align-items: center;
        margin: auto;
        background: #287bff;
        width: 40px;
        height: 40px;
    }
    .image-profile .text-profile-letter{
      color: white;
      font-size: 18px;
      text-transform: capitalize;
    }
    .image-profile .text-profile-letter:hover{
      color: white;
      text-decoration: none;
    }
    a .account .text-right:hover, .d-flex.align-items-center:hover{
        color: #515151 !important;
        text-decoration: none !important;
    }
    .sidebar-nav{
        position: relative;
        top: 0;
        width: 250px;
        margin: 0;
        padding: 0;
        list-style: none;
        padding: 0 20px;
    }
    .sidebar-nav li{
        line-height: 45px;
        position: relative;
    }
    .sidebar-nav li a {
        display: block;
        text-decoration: none;
        padding: 0 10px;
        color: #fff;
    }
    .sidebar-nav li a.active,
    .sidebar-nav li a:hover {
        text-decoration: none;
        background: #f3f8ff;
        color: #287bff;
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
    }
    .sidebar-nav li a.active:before,
    .sidebar-nav li a:hover::before  {
        content: '';
        position: absolute;
        right: 0;
        top: -50px;
        width: 50px;
        height: 50px;
        background: transparent;
        border-radius: 50%;
        box-shadow: 35px 35px 0 10px #f3f8ff;
    }
    .sidebar-nav li a.active:after,
    .sidebar-nav li a:hover::after {
        content: '';
        position: absolute;
        right: 0;
        bottom: -50px;
        width: 50px;
        height: 50px;
        background: transparent;
        border-radius: 50%;
        box-shadow: 35px -35px 0 10px #f3f8ff;
    }
    .content-wrapper{
        width: 100%;
        /* height: 100vh; */
    }
    .profile-container {
        position: relative;
    }
</style>
<body>
    <div class="container-scroller">
        <div class="container-wrapper">
            <div class="sidebar">
                <nav class="navbar container-navbar">
                    <a class="navbar-brand" href="#" style="color: white">
                        <h4>My Employee</h4>
                    </a>
                </nav>
                <ul class="sidebar-nav pr-0 mt-4">
                    <li>
                        <a id="home" href="dashboard" class="active pr-0">
                            <i class="mdi mdi-home mr-3"></i>Home
                        </a>
                    </li>
                    <li>
                        <a id="presensi" href="presensi" class="pr-0">
                            <i class="mdi mdi-clipboard-check mr-3"></i>Presensi
                        </a>
                    </li>
                    <li>
                        <a id="cuti" href="cuti" class="pr-0">
                            <i class="mdi mdi-calendar-month mr-3"></i>Cuti
                        </a>
                    </li>
                    <li>
                        <a id="penilaian" href="penilaian" class="pr-0">
                            <i class="mdi mdi-clipboard-text mr-3"></i>Penilaian
                        </a>
                    </li>
                    <li>
                        <a id="settings" href="setting" class="pr-0">
                            <i class="mdi mdi-cog mr-3"></i>Settings
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container-content">
                <nav class="navbar navbar-expand-lg navbar-light bg-white container-navbar">
                    <div class="row w-100 align-items-center">
                        <!-- <div class="col-5">
                            <div class="input-group" id="search">
                                <input type="text" class="form-control border-0 bg-light" style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;" placeholder="Search">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-light border-0" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;" id="basic-addon2">
                                        <i class="mdi mdi-magnify" style="font-size: 15px"></i>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <div class="profile-container ml-auto">
                            <a class="d-flex align-items-centerdropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                <div class="account mr-3 text-right">
                                    <p class="mb-0" style="color: #515151; font-size: 15px; font-weight: 700;"><?php echo $this->session->userdata("username"); ?></p>
                                    <span class="badge badge-pill badge-warning" style="font-weight: inherit">SA</span>
                                </div>
                                <div class="image-profile rounded-circle">
                                    <p class="m-auto text-profile-letter"><?php $uname = $this->session->userdata("username"); $letter = mb_substr($uname, 0, 1); echo $letter; ?></p>
                                    <img class="img-fluid" src="<?php echo base_url('assets/images/upload/'.$this->session->userdata("avatar"))?>" alt="">
                                </div>                         
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <button class="dropdown-item" type="button">
                                    <i class="mdi mdi-account mr-3"></i>Profile
                                </button>
                                <a href="<?php echo base_url('login/logout'); ?>" class="dropdown-item" type="button">
                                    <i class="mdi mdi-logout-variant mr-3"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="content-wrapper">
                    {content}
                </div>
            </div>
        </div>
    </div>
    <script src="assets/jquery/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        // $('.sidebar-nav li a').on('click', function(){
        //     $('.sidebar-nav li a.active').removeClass('active')
        //     $(this).addClass('active')
        // })
        $('#dropdownMenuLink').dropdown()
    </script>
</body>
</html>
