<div class="page-header header-filter" data-parallax="true" style="background-image: url(<?= base_url() ?>/assets/img/b1.jpg); transform: translate3d(0px, 0px, 0px);">
    <div class="container ">
        <div class="row mt-2">
            <div class="col-md-6">
                <h1 class="title">Lengkapi data</h1>
                <h4>Daftarkan dirimu untuk menambah pengalaman melalui magang</h4>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <?php echo form_open_multipart('complete', array("class" => "user")); ?>
            <div class="row col-md-12">
                <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">face</i>
                                </i></span>
                        </div>
                        <input class="form-control" placeholder="Nama depan" type="text" name="name1" />
                    </div>
                    <span class="text-danger"><?php echo form_error('name1'); ?></span>
                </div>
                <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">face</i>
                                </i></span>
                        </div>
                        <input class="form-control" placeholder="Nama belakang" type="text" name="name2" />
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
                        <input class="form-control" placeholder="Tempat lahir" type="text" name="birth_pl" />
                    </div>
                    <span class="text-danger"><?php echo form_error('birth_pl'); ?></span>
                </div>
                <div class="form-group col-md-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">date_range</i>
                                </i></span>
                        </div>
                        <input class="form-control" placeholder="Tanggal lahir" type="date" name="birth_dt" />
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
                <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">corporate_fare</i>
                                </i></span>
                        </div>
                        <input class="form-control" placeholder="Asal instansi" type="text" name="mhs_from" />
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
                            <input type="file" name="cv" class="custom-file-input" id="customFile" accept=".pdf,.docx,.doc" required>
                            <label class="custom-file-label border-bottom" for="customFile">Curriculum vitae</label>
                        </div>
                        <span class="text-danger"><?php echo form_error('cv'); ?></span>
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="form-group col-md-12">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">location_on</i></span>
                        </div>
                        <input class="form-control" placeholder="Alamat" type="text" name="address" />
                    </div>
                    <span class="text-danger"><?php echo form_error('address'); ?></span>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="login" class="btn btn-success my-4">
                    Daftar
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>