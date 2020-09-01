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
            <?php echo form_open_multipart('mhs_magang/verif/' . $id_mhs, array("class" => "user")); ?>
            <div class="row col-md-12">
                <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative  mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">how_to_reg</i>
                                </i></span>
                        </div>
                        <select name="id_karyawan" class="form-control">
                            <option value="">Pilih Karyawan</option>
                            <?php
                            foreach ($karyawan as $p) {
                                $selected = ($p == $this->input->post('id_karyawan')) ? ' selected="selected"' : "";
                                echo '<option value="' . $p['id_karyawan'] . '"' . $selected . '>' . $p['karyawan_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <span class="text-danger"><?php echo form_error('id_karyawan'); ?></span>
                </div>
                <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative  mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">how_to_reg</i>
                                </i></span>
                        </div>
                        <select name="id_bagian" class="form-control">
                            <option value="">Pilih Bagian</option>
                            <?php
                            foreach ($bagian as $p) {
                                $selected = ($p == $this->input->post('id_bagian')) ? ' selected="selected"' : "";
                                echo '<option value="' . $p['id_bagian'] . '"' . $selected . '>' . $p['bagian_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <span class="text-danger"><?php echo form_error('id_bagian'); ?></span>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="login" class="btn btn-success my-4">
                    Terima
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>