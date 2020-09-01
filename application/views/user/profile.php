<div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');">
    <div class="container text-center">
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
                            <?php if ($this->session->userdata('role') == 3) { ?>
                                <h3 class="title text-capitalize"><?= $profil['mhs_name'] ?></h3>
                            <?php } else { ?>
                                <h3 class="title text-capitalize"><?= $profil['karyawan_name'] ?></h3>
                            <?php } ?>
                            <h6><?= $profil['role'] == 3 ? 'Mahasiswa' : 'Karyawan' ?></h6>
                            <h6><?= $profil['email'] ?></h6>
                            <h6><?= $profil['phone'] ?></h6>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between bg-secondary px-3 my-1 rounded text-white">
                        <h5>Tempat lahir</h5>
                        <h5 class="text-capitalize"><?= $profil['birth_pl'] ?></h5>
                    </div>
                    <div class="row d-flex justify-content-between  px-3 my-1 rounded">
                        <h5>Tanggal lahir</h5>
                        <h5><?= $profil['birth_dt'] ?></h5>
                    </div>
                    <div class="row d-flex justify-content-between bg-secondary px-3 my-1 rounded text-white">
                        <h5>Agama</h5>
                        <h5><?= $profil['religion'] ?></h5>
                    </div>
                    <div class="row d-flex justify-content-between  px-3 my-1 rounded">
                        <h5>Jenis Kelamin</h5>
                        <h5><?= $profil['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></h5>
                    </div>
                    <div class="row d-flex justify-content-between bg-secondary px-3 my-1 rounded text-white">
                        <h5>Alamat</h5>
                        <h5 class="text-capitalize"><?= $profil['address'] ?></h5>
                    </div>
                    <?php if ($this->session->userdata('role') == 3) { ?>
                        <div class="row d-flex justify-content-center">
                            <a href="<?= base_url('file/cv/' . $profil['cv']) ?>" target="_blank" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat CV">
                                <i class=" fas fa-eye "></i>
                            </a>
                        </div>
                    <?php } ?>
                    <hr>
                    <div class="row d-flex justify-content-between my-1 rounded">
                        <a href="<?php echo site_url('user/editprofile/'); ?>" class="btn btn-sm btn-info ">Edit Profil</a>
                        <a href="<?php echo site_url('user/changepass/'); ?>" class="btn btn-sm btn-warning ">Ganti Password</a>
                        <a href="<?php echo site_url('user/changephoto/'); ?>" class="btn btn-sm btn-success ">Ganti Foto</a>
                    </div>
                </div>
            </div>
            <div class="description text-center pb-3">
            </div>
        </div>
    </div>
</div>