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
            <?php echo form_open('user/changepass', array("role" => "form")); ?>
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="material-icons">lock</i></i></span>
                    </div>
                    <input class="form-control" placeholder="Password lama" type="password" name="password">
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="material-icons">lock</i></span>
                    </div>
                    <input class="form-control" placeholder="Password baru" type="password" name="newpass">
                    <span class="text-danger"><?php echo form_error('newpass'); ?></span>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="register" class="btn btn-info mt-4">Ubah password</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>