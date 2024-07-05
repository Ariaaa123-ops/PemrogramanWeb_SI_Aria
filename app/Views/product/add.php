<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Product</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url(); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="<?= base_url(); ?>/save" id="FrmAddMahasiswa" method="post" autocomplete="off" accept-charset="utf-8" enctype="multipart/form-data">
                        <?= csrf_field(); ?>




                        <div class="form-group row">

                            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= set_value('nama'); ?>" autofocus>
                                <small class="text-danger invalid-feedback">
                                    <?= validation_show_error('nama') ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="Kategori" class="col-sm-2 col-form-label">Kategori</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= (validation_show_error('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" value="<?= set_value('kategori'); ?>" autofocus>
                                <small class="text-danger invalid-feedback">
                                    <?= validation_show_error('kategori') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="Harga" class="col-sm-2 col-form-label">Harga</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= (validation_show_error('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= set_value('harga'); ?>" autofocus>
                                <small class="text-danger invalid-feedback">
                                    <?= validation_show_error('harga') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="Berat" class="col-sm-2 col-form-label">Berat (gram)</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= (validation_show_error('berat')) ? 'is-invalid' : ''; ?>" id="berat" name="berat" value="<?= set_value('berat'); ?>" autofocus>
                                <small class="text-danger invalid-feedback">
                                    <?= validation_show_error('berat') ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="Foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="<?= (validation_show_error('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto">
                                <small class="text-danger invalid-feedback">
                                    <?= validation_show_error('foto') ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="Keterangan" class="col-sm-2 col-form-label">Keterangan</label>

                            <div class="col-sm-10">
                                <textarea class="form-control <?= (validation_show_error('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" rows="3"><?= set_value('keterangan'); ?></textarea>
                                <small class="text-danger">
                                    <?= validation_show_error('keterangan') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>

                                <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>