<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/favicon.png">
	<link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		<?= $tittle; ?>
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

<body class="profile-page sidebar-collapse">
	<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
		<div class="container">
			<div class="navbar-translate">
				<a class="navbar-brand" href="<?= base_url(); ?>">
					Magang </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="sr-only">Toggle navigation</span>
					<span class="navbar-toggler-icon"></span>
					<span class="navbar-toggler-icon"></span>
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>">
							<i class="material-icons">home</i> Home
						</a>
					</li>
					<?php if (!$this->session->has_userdata('ids')) { ?>
						<li class="nav-item">
							<button type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#exampleModal2">
								<i class="material-icons">account_box</i>
								Register
							</button>
						</li>
						<li class="nav-item">
							<button type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#exampleModal1">
								<i class="material-icons">login</i>
								Login
							</button>
						</li>
					<?php } else { ?>
						<?php if ($this->session->userdata('role') == 1) { ?>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('dashboard') ?>" onclick="scrollToDownload()">
									<i class="material-icons">dashboard</i>Dashboard
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('mhs_magang') ?>">
									<i class="material-icons">accessibility_new</i> Mahasiswa
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('user') ?>">
									<i class="material-icons">account_box</i> Users
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('karyawan') ?>">
									<i class="material-icons">assignment_ind</i> Karyawan
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('bagian') ?>">
									<i class="material-icons">nature_people</i> Bagian
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('magang') ?>">
								<i class="material-icons">donut_small</i> Magang
							</a>
						</li>
						<li class="dropdown nav-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<i class="material-icons">settings</i> Setting
							</a>
							<div class="dropdown-menu dropdown-with-icons">
								<a href="<?= base_url('user/profile') ?>" class="dropdown-item">
									<i class="material-icons">local_florist</i>Profil
								</a>
								<a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
									<i class="material-icons">power_settings_new</i> Logout
								</a>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<?php
	if (isset($_view) && $_view)
		$this->load->view($_view);
	?>
	<footer class="footer footer-default">
		<div class="container">
			<nav class="float-left">
				<ul>
					<li>
						<a href="<?= base_url('') ?>">
							Magang Run System
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
	<script src="<?= base_url() ?>/assets/js/core/jquery.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>/assets/js/core/popper.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>/assets/js/plugins/moment.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>/assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
	<script src="<?= base_url() ?>/assets/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>/assets/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>/assets/datatables/datatables-demo.js"></script>

	<script src="<?= base_url() ?>/assets/js/cekform.js"></script>
	<script src="<?= base_url() ?>/assets/js/cek.js"></script>
</body>

</html>