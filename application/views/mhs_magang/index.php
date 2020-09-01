<div class="page-header header-small header-filter  " data-parallax="true" style="background-image: url('./assets/img/b2.jpg');">
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
							<a href="<?php echo site_url('mhs_magang/add'); ?>" class="btn btn-secondary text-success ">Add</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<!-- <th>Id Mhs</th> -->
										<!-- <th>Id User</th> -->
										<th>Nama</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Agama</th>
										<th>Alamat</th>
										<th>Asal PTN</th>
										<th>CV</th>
										<th>Status</th>
										<!-- <th>Foto</th> -->
										<th>Actions</th>
									</tr>
								</thead>

								<tbody>
									<?php $n = 1;
									foreach ($tbl_mhs_magang as $t) { ?>
										<tr>
											<td><?= $n++; ?></td>
											<!-- <td><?php echo $t['id_mhs']; ?></td> -->
											<!-- <td><?php echo $t['id_user']; ?></td> -->
											<td><?php echo $t['mhs_name']; ?></td>
											<td><?php echo $t['birth_dt']; ?></td>
											<td><?php echo $t['gender']  == 'L' ? 'Laki-laki' : ($t['gender'] == 'P' ? 'Perempuan' : 'belum di input'); ?></td>
											<td><?php echo $t['religion']; ?></td>
											<td><?php echo $t['address']; ?></td>
											<td><?php echo $t['mhs_from']; ?></td>
											<td><?php if ($t['cv'] !== null || "") { ?>

													<a href="<?= base_url('file/cv/' . $t['cv']) ?>" target="_blank" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat CV">
														<i class=" fas fa-eye "></i>
													</a>
												<?php } else {
													echo "Tidak ada";
												} ?>
											</td>
											<td><?php echo $t['status'] == 'p' ? 'Pending' : ($t['status'] == 't' ? 'Diterima' : 'Ditolak'); ?></td>
											<td>
												<a href="<?php echo site_url('mhs_magang/edit/' . $t['id_mhs']); ?>" class="btn btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit mahasiswa">
													<i class=" fas fa-edit "></i>
												</a>
												<a href="<?php echo site_url('mhs_magang/remove/' . $t['id_mhs']); ?>" class="btn btn btn-danger btn-circle  btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus mahasiswa" onclick="return confirm('Apakah anda yakin ingin menghapus?');">
													<i class=" fas fa-trash "></i>
												</a>
												<a href="<?php echo site_url('mhs_magang/info/' . $t['id_mhs']); ?>" class="btn btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Info mahasiswa magang">
													<i class=" fas fa-info "></i>
												</a>
												<?php if ($t['status'] !== 't') { ?>
													<a href="<?php echo site_url('mhs_magang/verif/' . $t['id_mhs']); ?>" class="btn btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Verifikasi">
														<i class=" fas fa-user-check "></i>
													</a>
												<?php } ?>

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