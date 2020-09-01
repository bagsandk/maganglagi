<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url() ?>/assets/img/b2.jpg');">
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
                <div class="col-md-12 ml-auto mr-auto ">
                    <div class="row">
                        <div class="profile col-md-6 mb-4">
                            <div class="avatar">
                                <img src="<?= base_url() ?>/assets/img/profil/<?= $mhs['photo']  ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name ">
                                <h3 class="title text-capitalize"><?= $mhs['mhs_name'] ?></h3>
                                <h6><?= $mhs['role'] == 3 ? 'Mahasiswa' : 'Karyawan' ?></h6>
                                <h6><?= $mhs['email'] ?></h6>
                                <h6><?= $mhs['phone'] ?></h6>
                            </div>
                            <div class="row d-flex justify-content-between bg-secondary px-3 my-1 mx-1 rounded text-white">
                                <h5>Tempat lahir</h5>
                                <h5 class="text-capitalize"><?= $mhs['birth_pl'] ?></h5>
                            </div>
                            <div class="row d-flex justify-content-between  px-3 my-1 mx-1 rounded">
                                <h5>Tanggal lahir</h5>
                                <h5><?= $mhs['birth_dt'] ?></h5>
                            </div>
                            <div class="row d-flex justify-content-between bg-secondary px-3 my-1 mx-1 rounded text-white">
                                <h5>Agama</h5>
                                <h5><?= $mhs['religion'] ?></h5>
                            </div>
                            <div class="row d-flex justify-content-between  px-3 my-1 mx-1 rounded">
                                <h5>Jenis Kelamin</h5>
                                <h5><?= $mhs['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></h5>
                            </div>
                            <div class="row d-flex justify-content-between bg-secondary px-3 my-1 mx-1 rounded text-white">
                                <h5>Alamat</h5>
                                <h5 class="text-capitalize"><?= $mhs['address'] ?></h5>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <a href="<?= base_url('file/cv/' . $mhs['cv']) ?>" target="_blank" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat CV">
                                    <i class=" fas fa-eye "></i>
                                </a>
                            </div>
                            <hr class="mb-5">
                        </div>
                        <div class="profile col-md-6 px-1">
                            <div class="avatar">
                                <img src="<?= base_url() ?>/assets/img/profil/<?= $karyawan['photo'] ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name ">
                                <h3 class="title text-capitalize"><?= $karyawan['karyawan_name'] ?></h3>
                                <h6><?= $karyawan['role'] == 3 ? 'Mahasiswa' : 'Karyawan' ?></h6>
                                <h6><?= $karyawan['email'] ?></h6>
                                <h6><?= $karyawan['phone'] ?></h6>
                            </div>
                            <div class="row d-flex justify-content-between bg-secondary px-3 my-1 mx-1 rounded text-white">
                                <h5>Tempat lahir</h5>
                                <h5 class="text-capitalize"><?= $karyawan['birth_pl'] ?></h5>
                            </div>
                            <div class="row d-flex justify-content-between  px-3 my-1 mx-1 rounded">
                                <h5>Tanggal lahir</h5>
                                <h5><?= $karyawan['birth_dt'] ?></h5>
                            </div>
                            <div class="row d-flex justify-content-between bg-secondary px-3 my-1 mx-1 rounded text-white">
                                <h5>Agama</h5>
                                <h5><?= $karyawan['religion'] ?></h5>
                            </div>
                            <div class="row d-flex justify-content-between  px-3 my-1 mx-1 rounded">
                                <h5>Jenis Kelamin</h5>
                                <h5><?= $karyawan['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></h5>
                            </div>
                            <div class="row d-flex justify-content-between bg-secondary px-3 my-1 mx-1 rounded text-white">
                                <h5>Alamat</h5>
                                <h5 class="text-capitalize"><?= $karyawan['address'] ?></h5>
                            </div>
                            <hr class="mb-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>