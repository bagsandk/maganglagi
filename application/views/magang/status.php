<div class="page-header header-small header-filter clear-filter purple-filter " data-parallax="true" style="background-image: url('./assets/img/bg2.jpg');">
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
<!-- main page -->
<div class="main main-raised">
    <div class="section section-basic">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-warning">
                        <div class="card-text d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-white"><?= $message ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>