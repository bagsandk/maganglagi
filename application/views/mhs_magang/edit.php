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
			<?php echo form_open_multipart('mhs_magang/edit/' . $id_mhs, array("class" => "user")); ?>
			<div class="row col-md-12">
				<div class="form-group col-md-12">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">face</i>
								</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Nama" type="text" name="name1" value="<?= ($this->input->post('name1') ? $this->input->post('name1') : $mhs_magang['mhs_name']); ?>" />
					</div>
					<span class="text-danger"><?php echo form_error('name1'); ?></span>
				</div>
			</div>
			<div class="row col-md-12">
				<div class="form-group col-md-3">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">favorite</i>
								</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Tempat lahir" type="text" name="birth_pl" value="<?= ($this->input->post('birth_pl') ? $this->input->post('birth_pl') : $mhs_magang['birth_pl']); ?>" />
					</div>
					<span class="text-danger"><?php echo form_error('birth_pl'); ?></span>
				</div>
				<div class="form-group col-md-3">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">date_range</i>
								</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Tanggal lahir" type="date" name="birth_dt" value="<?= ($this->input->post('birth_dt') ? $this->input->post('birth_dt') : $mhs_magang['birth_dt']); ?>" />
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
								$selected = ($p == $this->input->post('religion') ? 'selected="selected"' : ($p == $mhs_magang['religion'] ? ' selected="selected"' : ""));
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
							$gender = array('L' => 'Laki-laki', 'P' => 'Perempuan',);
							foreach ($gender as $i => $p) {
								$selected =  ($i == $this->input->post('gender') ? 'selected="selected"' : ($i == $mhs_magang['gender'] ? ' selected="selected"' : ""));
								echo '<option value="' . $i . '"' . $selected . '>' . $p . '</option>';
							}
							?>
						</select>
					</div>
					<span class="text-danger"><?php echo form_error('gender'); ?></span>
				</div>
			</div>
			<div class="row col-md-12">
				<div class="form-group col-md-6">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">corporate_fare</i>
								</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Asal instansi" type="text" name="mhs_from" value="<?= ($this->input->post('mhs_from') ? $this->input->post('mhs_from') : $mhs_magang['mhs_from']); ?>" />
					</div>
					<span class="text-danger"><?php echo form_error('mhs_from'); ?></span>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group input-group-merge input-group-alternative mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">picture_in_picture</i>
								</i></span>
						</div>
						<div class="custom-file">
							<input style="text-transform: capitalize;" type="file" name="cv" class="custom-file-input" id="customFile" accept=".pdf,.docx,.doc" />
							<label class="custom-file-label border-bottom" for="customFile">Curriculum vitae</label>
						</div>
						<span class="text-danger"><?php echo form_error('cv'); ?></span>
					</div>
				</div>
			</div>
			<div class="row col-md-12">
				<div class="form-group col-md-6">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">location_on</i></span>
						</div>
						<input style="text-transform: capitalize;" class="form-control" placeholder="Alamat" type="text" name="address" value="<?= ($this->input->post('address') ? $this->input->post('address') : $mhs_magang['address']); ?>" />
					</div>
					<span class="text-danger"><?php echo form_error('address'); ?></span>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group input-group-merge input-group-alternative  mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">how_to_reg</i>
								</i></span>
						</div>
						<select name="status" class="form-control">
							<option value="">Status</option>
							<?php
							$status = array('f' => 'Tidak aktif', 't' => 'Aktif', 'p' => 'Pending',);
							foreach ($status as $i => $p) {
								$selected =  ($i == $this->input->post('status') ? 'selected="selected"' : ($i == $mhs_magang['status'] ? ' selected="selected"' : ""));
								echo '<option value="' . $i . '"' . $selected . '>' . $p . '</option>';
							}
							?>
						</select>
					</div>
					<span class="text-danger"><?php echo form_error('status'); ?></span>
				</div>
			</div>
			<div class="text-center">
				<button type="submit" name="login" class="btn btn-success my-4">
					Edit
				</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>