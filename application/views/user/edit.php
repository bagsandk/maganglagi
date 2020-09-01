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
			<?php echo form_open('user/edit/' . $user['id_user'], array("role" => "form")); ?>
			<div class="form-group">
				<div class="input-group input-group-merge input-group-alternative mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">face</i></span>
					</div>
					<input style="text-transform: capitalize;" class="form-control" placeholder="Display name" type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $user['display_name']); ?>">
					<span class="text-danger"><?php echo form_error('name'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group input-group-merge input-group-alternative mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">email</i></i></span>
					</div>
					<input class="form-control" placeholder="Email" type="email" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>">
					<span class="text-danger"><?php echo form_error('email'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group input-group-merge input-group-alternative mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">contact_phone</i></i></span>
					</div>
					<input class="form-control" placeholder="Phone Number" type="text" name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $user['phone']); ?>">
					<span class="text-danger"><?php echo form_error('phone'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group input-group-merge input-group-alternative">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">lock</i></span>
					</div>
					<input class="form-control" placeholder="Kosongkan password jika tidak diubah" type="password" name="password">
					<span class="text-danger"><?php echo form_error('password'); ?></span>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<div class="input-group input-group-merge input-group-alternative  mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">how_to_reg</i>
								</i></span>
						</div>
						<select name="active" class="form-control">
							<option value="">Active</option>
							<?php
							$active = array('t' => 'Aktif', 'f' => 'Tidak aktif');
							foreach ($active as $i => $p) {
								$selected = ($i == $this->input->post('active') ? ' selected="selected"' : ($i == $user['active'] ? ' selected="selected"' :  ""));
								echo '<option value="' . $i . '"' . $selected . '>' . $p . '</option>';
							}
							?>
						</select>
					</div>
					<span class="text-danger"><?php echo form_error('active'); ?></span>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group input-group-merge input-group-alternative mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">supervisor_account</i>
								</i></span>
						</div>
						<select name="role" class="form-control">
							<option value="">Role</option>
							<?php
							$role = array(1 => 'Karyawan', 3 => 'Mahasiswa',);
							foreach ($role as $i => $p) {
								$selected = ($i == $this->input->post('role') ? ' selected="selected"' : ($i == $user['role'] ? ' selected="selected"' :  ""));
								echo '<option value="' . $i . '"' . $selected . '>' . $p . '</option>';
							}
							?>
						</select>
					</div>
					<span class="text-danger"><?php echo form_error('role'); ?></span>
				</div>
			</div>
			<div class="text-center">
				<button type="submit" name="register" class="btn btn-info mt-4">Tambah User</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>