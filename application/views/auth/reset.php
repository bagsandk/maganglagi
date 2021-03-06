<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Verifikasi
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link href="<?= base_url() ?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?= base_url() ?>/assets/css/material-kit.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url() ?>/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="profile-page">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto mt-5">
                <div class="card card-login mt-5">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title">Verifikasi</h4>
                    </div>
                    <p class="description text-center text-dongker">Cek pesan whatsapp</p>
                    <p class="description text-center text-dongker"><?= $this->session->userdata('verif'); ?></p>
                    <p class="description text-center text-dongker">Masukan kode OTP</p>
                    <div class="card-body">
                        <?php echo form_open('auth/verif', array("role" => "form")); ?>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="material-icons">lock</i></span>
                                </div>
                                <input style="text-transform: capitalize;" class="form-control" placeholder="OTP" type="text" name="otp" maxlength="4" onkeypress=" return angka(event);">
                                <span class="text-danger"><?php echo form_error('otp'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="footer text-center mb-4">
                        <button type="submit" name="register" class="btn btn-info">Tambah Bagian</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <?= $this->session->flashdata('message'); ?>
    </div>
    <footer class="footer footer-default">
        <div class="container">
            <nav class="float-left">
                <ul>
                    <li>
                        <a>
                            Magang run system
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
            </div>
        </div>
    </footer>
    <script src="<?= base_url() ?>/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/js/cek.js"></script>

</body>

</html>