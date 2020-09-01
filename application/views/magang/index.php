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
							<?php if ($this->session->userdata('role') != 3) { ?>
								<a href="<?php echo site_url('magang/add'); ?>" class="btn btn-secondary text-success ">Add</a>
							<?php } ?>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Mahasiswa</th>
										<th>Bagian</th>
										<th>Nama Pembimbing</th>
										<th>Nilai</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php $n = 1;
									foreach ($tbl_magang as $t) { ?>
										<tr>
											<td><?php echo $n++; ?></td>
											<td><?php echo $t['mhs_name']; ?></td>
											<td><?php echo $t['bagian_name']; ?></td>
											<td><?php echo $t['karyawan_name']; ?></td>
											<td><?php echo $t['nilai']; ?></td>
											<td><?php echo $t['status_magang'] == 'f' ? 'Magang' : 'Lulus'; ?></td>
											<td>
												<a href="<?php echo site_url('magang/info/' . $t['id_magang']); ?>" class="btn btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Info mahasiswa magang">
													<i class=" fas fa-info "></i>
												</a>
												<?php if ($this->session->userdata('role') == 1) { ?>
													<a href="<?php echo site_url('magang/edit/' . $t['id_magang']); ?>" class="btn btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Edit item">
														<i class=" fas fa-edit "></i>
													</a>
													<a href="<?php echo site_url('magang/remove/' . $t['id_magang']); ?>" class="btn btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?');" data-toggle="tooltip" data-placement="top" title="Hapus item">
														<i class=" fas fa-trash "></i>
													</a>
													<a href="<?php echo site_url('magang/nilai/' . $t['id_magang']); ?>" class="btn btn btn-success btn-circle btn-sm  " data-toggle="tooltip" data-placement="top" title="Input nilai">
														<i class=" fas fa-keyboard "></i>
													</a>
												<?php }; ?>
												<?php if ($t['status_magang'] == 't') { ?>
													<a href="<?php echo site_url('Laporan_pdf/cetaknilai/' . $t['id_mhs']); ?>" class="btn btn btn-info btn-circle btn-sm  " data-toggle="tooltip" data-placement="top" title="Download form nilai" target="_blank">
														<i class=" fas fa-download "></i>
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