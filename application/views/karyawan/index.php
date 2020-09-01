<div class="page-header header-small header-filter clear-filter purple-filter " data-parallax="true" style="background-image: url('./assets/img/bg2.jpg');">
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
							<a href="<?php echo site_url('karyawan/add'); ?>" class="btn btn-secondary text-success ">Add</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Agama</th>
										<th>Alamat</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php $n = 1;
									foreach ($tbl_karyawan as $t) { ?>
										<tr>
											<td><?= $n++; ?></td>
											<td><?php echo $t['karyawan_name']; ?></td>
											<td><?php echo $t['birth_pl']; ?></td>
											<td><?php echo $t['birth_dt']; ?></td>
											<td><?php echo $t['gender'] == 'P' ? 'Perempuan' : 'Laki-laki'; ?></td>
											<td><?php echo $t['religion']; ?></td>
											<td><?php echo $t['address']; ?></td>
											<td>
												<a href="<?php echo site_url('karyawan/edit/' . $t['id_karyawan']); ?>" class="btn btn btn-warning btn-circle mr-2 btn-sm" data-toggle="tooltip" data-placement="top" title="Edit karyawan"><i class=" fas fa-edit "></i>
													<a href="<?php echo site_url('karyawan/remove/' . $t['id_karyawan']); ?>" class="btn btn btn-danger btn-circle mr-2 btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Karyawan" onclick="return confirm('Apakah anda yakin ingin menghapus?');"><i class=" fas fa-trash "></i>
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