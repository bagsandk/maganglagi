<div class="page-header header-small header-filter" data-parallax="true" style="background-image: url('<?= base_url() ?>/assets/img/b2.jpg');">
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
							<a href="<?php echo site_url('bagian/add'); ?>" class="btn btn-secondary text-success ">Add</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Bagian</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php $n = 1;
									foreach ($tbl_bagian as $t) { ?>
										<tr>
											<td><?php echo $n++; ?></td>
											<td><?php echo $t['bagian_name']; ?></td>
											<td>
												<a href="<?php echo site_url('bagian/edit/' . $t['id_bagian']); ?>" class="btn btn btn-warning btn-circle mr-2 btn-sm" data-toggle="tooltip" data-placement="top" title="Edit bagian">
													<i class=" fas fa-edit "></i>
												</a>
												<a href="<?php echo site_url('bagian/remove/' . $t['id_bagian']); ?>" class="btn btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?');" data-toggle="tooltip" data-placement="top" title="Hapus bagian">
													<i class=" fas fa-trash "></i>
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