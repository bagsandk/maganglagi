<!-- Page Heading -->
<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url() ?>assets/img/b4.jpg');">
	<div class="container text-center">
		<h1>Dashboard</h1>
	</div>
</div>
<div class="main main-raised">
	<div class="profile-content">
		<div class="container">
			<div class="row">
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<a class="collapse-item" href="<?= base_url() ?>karyawan">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-dongker text-uppercase mb-1">Karyawan</div>
										<div class="h5 mb-0 font-weight-bold text-dark"><?= $karyawan; ?></div>
									</div>
									<div class="col-auto">
										<i class="material-icons">assignment_ind</i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<a class="collapse-item" href="<?= base_url() ?>mhs_magang">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-dongker text-uppercase mb-1">Mahasiswa Magang</div>
										<div class="h5 mb-0 font-weight-bold text-dark"><?= $magang; ?></div>
									</div>
									<div class="col-auto">
										<i class="material-icons">accessibility_new</i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<!-- Pending Requests Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<a class="collapse-item" href="<?= base_url() ?>mhs_magang/pending">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-dongker text-uppercase mb-1">Permintaan Magang</div>
										<div class="h5 mb-0 font-weight-bold text-dark"><?= $pending; ?></div>
									</div>
									<div class="col-auto">
										<i class="material-icons">bookmark</i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<a class="collapse-item" href="<?= base_url() ?>user">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-dongker text-uppercase mb-1">User Aktif</div>
										<div class="h5 mb-0 font-weight-bold text-dark"><?= $aktif; ?></div>
									</div>
									<div class="col-auto">
										<i class="material-icons">verified_user</i>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="description text-center pb-3">
			</div>
		</div>
	</div>
</div>