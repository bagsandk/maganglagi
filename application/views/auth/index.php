<div class="page-header header-filter" data-parallax="true" style="background-image: url(<?= base_url() ?>/assets/img/b4.jpg); transform: translate3d(0px, 0px, 0px);">
    <div class="container ">
        <div class="row mt-2">
            <div class="col-md-6">
                <h1 class="title">Selamat datang di magang run system.</h1>
                <h4>Daftarkan dirimu untuk menambah pengalaman melalui magang </h4>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <?= $this->session->flashdata('message'); ?>
                    <h2 class="title">PT. Global Sukses Solusi </h2>
                    <h5 class="description">Global Sukses Solusi didirikan pada tahun 2010, yang sejak tahun 2013 mengkhususkan pada penyediaan solusi berupa software ERP untuk bisnis skala menengah hingga besar pada Industri Manufacture, Distribusi dan Perdagangan, serta Jasa.</h5>
                    <h5 class="description">Pada tahun 2014 Global Sukses Solusi bertransformasi menjadi PT. Global Sukses Solusi sehingga semua solusi dan layanan dapat lebih maksimal. Pada tahun 2014 pula RUNSystem ikut serta dalam program Indigo Incubator 2014 yang diadakan oleh PT. Telkom Indonesia sehingga RUNSystem mendapatkan dukungan penuh dari PT. Telkom Indonesia, Tbk dalam rangka pengembangan produk dan layanan. Tahun 2015 menjadi momentum dimana PT. Telkom Indonesia menjadi salah satu Business Partner sebagai distribution Partner RUN System sebagai solusi ERP kepada seluruh pelanggan PT. Telkom Indonesia di Indonesia. Kerjasama ini diharapkan meningkatkan kualitas layanan kepada pelanggan dimana dimungkinan untuk mensinergikan resources dan layanan yang dimiliki oleh PT. Telkom Indonesia ke dalam layanan RUNSystem dan sebaliknya</h5>
                    <h5 class="description">Dengan pengalaman para anggota tim sebagai anggota senior management dan C-Level selama bertahun-tahun membuat kami berusaha melihat dari perspektif business owner dan eksekutif level dalam setiap produk dan layanan yang ditawarkan.</h5>
                    <h5 class="description">Kekuatan utama kami adalah pada keahlian dan pengalaman yang luas dalam Perencanaan, Desain, Membangun,
                        serta Implementasi Solusi Teknologi Informasi untuk seluruh proses bisnis yang terintegrasi. Dimana tantangan dan situasi persaingan bisnis yang begitu mudah berubah memberikan kami energi lebih agar setiap produk dapat menjawab segala kebutuhan konsumen. RUN System sebagai produk unggulan merupakan manifestasi dari seluruh jiwa kami yang dihasilkan dari pemilihan dan pemilahan teknologi terbaik yang disesuaikan dengan situasi, kondisi serta budaya perusahaan di Indonesia yang memiliki keunikan tersendiri.</h5>
                    <h5 class="description">Saat ini telah RUN System telah memiliki 3 Gold Business Partner dan 1 Silver Business Partner, baik sebagai Distribustion Partner maupun Implementation Partner yang membuktikan RUNSystem sebagai Software ERP terbaik di Asia Tenggara. Dengan dukungan para RUNers (sebutan untuk seluruh stakeholder RUNSystem) baik Technology Expert maupun Business Process Expert, maka RUN System memiliki:</h5>
                </div>
            </div>
            <div class="features">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">VIsi</h4>
                            <p>Menjadi mitra strategis terpercaya dalam solusi Software ERP di Asia Tenggara</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Misi</h4>
                            <p>Mendukung mitra pelanggan kami menjalankan bisnis (doing business) lebih efektif dan efisien dengan solusi bisnis yang sesuai dengan budaya organisasi.
                                Mendukung mitra pelanggan kami memenangkan persaingan dan mengembangkan bisnis (promoting business).
                                Mendukung mitra pelanggan kami mengontrol bisnis (controlling business) sehingga sesuai objective organisasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login to your account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('auth/', array("role" => "form", "onsubmit" => "return ceklogin();",)); ?>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">email</i>
                                </i></span>
                        </div>
                        <input class="form-control" placeholder="Email" type="email" name="email" id="email" />
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i></span>
                        </div>
                        <input class="form-control" placeholder="Password" type="password" name="password" id="password" />
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="login" class="btn btn-success my-4">
                        Sign in
                    </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- register -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('auth/', array("role" => "form", "onsubmit" => "return cekdaftar();", "id" => "daftar")); ?>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">face</i></span>
                        </div>
                        <input class="form-control" placeholder="Display name" type="text" name="name" onkeypress="return huruf(event);">
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">email</i></i></span>
                        </div>
                        <input class="form-control" placeholder="Email" type="email" name="email" id="email1">
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">contact_phone</i></i></span>
                        </div>
                        <input class="form-control" placeholder="Phone Number" type="text" name="phone" id="phone" onkeypress=" return angka(event);" maxlength="13">
                        <span class="text-danger"><?php echo form_error('phone'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons">lock</i></span>
                        </div>
                        <input class="form-control" placeholder="Password" type="password" name="password" id="password1">
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="register" class="btn btn-info mt-4">Create account</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>