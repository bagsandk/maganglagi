<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url() ?>/assets/img/b5.jpg');">
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
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                            <img src="<?= base_url() ?>/assets/img/profil/<?= $mhs['photo'] ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <div class="name">
                            <h3 class="title text-capitalize"> Nilai Untuk <?= $mhs['mhs_name'] ?></h3>
                            <?php echo form_open('magang/nilai/' . $magang['id_magang'], array("class" => "user")); ?>
                            <div class="row col-md-12">
                                <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="material-icons">stars</i>
                                                </i></span>
                                        </div>
                                        <input class="form-control" placeholder="Masukan nilai" type="text" name="nilai" value="<?= ($this->input->post('nilai') ? $this->input->post('nilai') : $magang['nilai']); ?>" onkeypress=" return angka(event);" maxlength="3" />
                                    </div>
                                    <span class="text-danger"><?php echo form_error('name1'); ?></span>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="login" class="btn btn-success my-4">
                                    Update nilai
                                </button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center pb-3">
            </div>
        </div>
    </div>
</div>