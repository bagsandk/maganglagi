<div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');">
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
                            <img src="<?= base_url() ?>/assets/img/profil/<?= $this->session->userdata('foto') ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <div class="name">
                            <?php echo form_open_multipart('user/changephoto', array("class" => "user")); ?>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="material-icons">picture_in_picture</i>
                                            </i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" id="customFile" accept="image/*" />
                                        <label class="custom-file-label border-bottom" for="customFile">Foto</label>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('photo'); ?></span>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="login" class="btn btn-success my-4">
                                    Upload
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