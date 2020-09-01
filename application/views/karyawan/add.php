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
			<?php echo form_open_multipart('karyawan/add', array("class" => "user")); ?>
			<div class="row col-md-12">
				<div class="form-group col-md-12">
					<div class="input-group input-group-merge input-group-alternative  mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">how_to_reg</i>
								</i></span>
						</div>
						<select name="id_user" class="form-control">
							<option value="">Pilih User</option>
							<?php
							foreach ($users as $p) {
								$selected = ($p == $this->input->post('id_user')) ? ' selected="selected"' : "";
								echo '<option value="' . $p['id_user'] . '"' . $selected . '>' . $p['display_name'] . '</option>';
							}
							?>
						</select>
					</div>
					<span class="text-danger"><?php echo form_error('id_user'); ?></span>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">face</i>
								</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Nama depan" type="text" name="name1" />
					</div>
					<span class="text-danger"><?php echo form_error('name1'); ?></span>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">face</i>
								</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Nama belakang" type="text" name="name2" />
					</div>
					<span class="text-danger"><?php echo form_error('name2'); ?></span>
				</div>
			</div>
			<div class="row col-md-12">
				<div class="form-group col-md-3">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">favorite</i>
								</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Tempat lahir" type="text" name="birth_pl" />
					</div>
					<span class="text-danger"><?php echo form_error('birth_pl'); ?></span>
				</div>
				<div class="form-group col-md-3">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">date_range</i>
								</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Tanggal lahir" type="date" name="birth_dt" />
					</div>
					<span class="text-danger"><?php echo form_error('birth_dt'); ?></span>
				</div>
				<div class="form-group col-md-3">
					<div class="input-group input-group-merge input-group-alternative  mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">how_to_reg</i>
								</i></span>
						</div>
						<select name="religion" class="form-control">
							<option value="">Agama</option>
							<?php
							$religion = array('Islam', 'Hindu', 'Kristen', 'Budha', 'Khatolik', 'Konguchu');
							foreach ($religion as $p) {
								$selected = ($p == $this->input->post('religion')) ? ' selected="selected"' : "";
								echo '<option value="' . $p . '"' . $selected . '>' . $p . '</option>';
							}
							?>
						</select>
					</div>
					<span class="text-danger"><?php echo form_error('religion'); ?></span>
				</div>
				<div class="form-group col-md-3">
					<div class="input-group input-group-merge input-group-alternative mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">supervisor_account</i>
								</i></span>
						</div>
						<select name="gender" class="form-control">
							<option value="">Jenis kelamin</option>
							<?php
							$gender = array('Laki-laki', 'Perempuan',);
							foreach ($gender as $p) {
								$selected = ($p == $this->input->post('gender')) ? ' selected="selected"' : "";
								echo '<option value="' . $p . '"' . $selected . '>' . $p . '</option>';
							}
							?>
						</select>
					</div>
					<span class="text-danger"><?php echo form_error('gender'); ?></span>
				</div>
			</div>
			<div class="row col-md-12">
				<div class="form-group col-md-12">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">location_on</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Alamat" type="text" name="address" />
					</div>
					<span class="text-danger"><?php echo form_error('address'); ?></span>
				</div>
			</div>
			<div class="text-center">
				<button type="submit" name="login" class="btn btn-success my-4">
					Add
				</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>