<div class="page-header header-filter" data-parallax="true" style="background-image: url(./assets/img/profile_city.jpg); transform: translate3d(0px, 0px, 0px);">
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
<div class="main main-raised">
	<div class="container">
		<div class="section text-center">
			<?php echo form_open('bagian/edit/' . $bagian['id_bagian'], array("role" => "form")); ?>
			<div class="form-group">
				<div class="input-group input-group-merge input-group-alternative mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">face</i></span>
					</div>
					<input style="text-transform: capitalize;" class="form-control" placeholder="Nama bagian" type="text" name="bagian_name" value="<?= ($this->input->post('bagian_name') ? $this->input->post('bagian_name') : $bagian['bagian_name']); ?>">
					<span class="text-danger"><?php echo form_error('bagian_name'); ?></span>
				</div>
			</div>
			<div class="text-center">
				<button type="submit" name="register" class="btn btn-info mt-4">Edit Bagian</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>