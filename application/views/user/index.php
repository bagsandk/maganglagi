<div class="page-header header-small header-filter  " data-parallax="true" style="background-image: url('<?= base_url() ?>/assets/img/b2.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ml-auto mr-auto">
				<div class="brand">
					<h2><?= $tittle; ?></h2>
				</div>
			</div>
		</div>
		<?= $this->session->flashdata('message'); ?>
	</div>
</div>
<!-- main page -->
<div class="main main-raised">
	<div class="section section-basic">
		<div class="container">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-text card-header-primary">
						<div class="card-text d-flex justify-content-between">
							<h4 class="card-title"><?= $tittle; ?></h4>
							<a href="<?php echo site_url('user/add'); ?>" class="btn btn-secondary text-success ">Add</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Display name</th>
										<th>Email</th>
										<th>No HP</th>
										<th>Role</th>
										<th>Aktif</th>
										<th>Last Login</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php $n = 1;
									foreach ($users as $t) { ?>
										<tr>
											<td><?= $n++ ?></td>
											<td><?php echo $t['display_name']; ?></td>
											<td><?php echo $t['email']; ?></td>
											<td><?php echo $t['phone']; ?></td>
											<td><?php echo ($t['role'] == 1) ? 'Admin' : (($t['role'] == 2) ? 'Pegawai' : 'Mahasiswa') ?></td>
											<td <?php echo $t['active'] == 't' ? 'class="text-success">Aktif' : 'class="text-danger">Tidak aktif'; ?></td> <td><?php echo $t['last_login']; ?></td>
											<td>
												<a href="<?php echo site_url('user/edit/' . $t['id_user']); ?>" class="btn btn btn-warning btn-circle btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Edit user">
													<i class=" fas fa-edit "></i>
												</a>
												<a href="<?php echo site_url('user/remove/' . $t['id_user']); ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus user" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $t['email']; ?>?');">
													<i class="fas fa-trash"></i>
												</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>