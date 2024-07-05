<div class="container pt-5">

    <h3><?= $title ?></h3>

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('/add'); ?>">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                <?php

                if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;
                            </span>
                        </button>
                    </div>;
                <?php endif;
                ?>
            </div>
            <div class="d-flex justify-content-center">
                <?php foreach ($data_product as $row) : ?>
                    <div class="card ml-3 mr-3 border border-2" style="width: 15rem;">
                        <img src="<?= base_url() ?>/img/<?= $row['foto'] ?>" width="240px" height="240px" class="card-img-top" alt="<?= $row['foto'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama'] ?></h5>
                            <table width="100%">
                                <tr>
                                    <td width="60%"><span class="text-danger ">Rp. <?= $row['harga'] ?></span></td>
                                    <td><span class="text-warning "><?= $row['berat'] ?> gram</span></td>
                                </tr>
                            </table>
                            <small>kategori : </small>
                            <small><?= $row['kategori'] ?></small>
                            <p class="card-text text-secondary"><?= $row['keterangan'] ?></p>
                            <a href="<?= base_url('edit/' . $row['id']); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" data="<?= $row['id'] ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
<!-- Modal dialog hapus data-->

<div class="modal fade" id="myModalDelete" tabindex="-1" aria- labelledby="myModalDeleteLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda ingin menghapus data ini?
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data- dismiss="modal">Tutup</button>

                <button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // menampilkan modal dialog saat tombol hapus ditekan
        $('.item-delete').click(function() {
            // ambil data dari atribut data
            var id = $(this).attr('data');
            $('#myModalDelete').modal('show');
            // ketika tombol lanjutkan ditekan, data id akan dikirim ke method delete pada controller mahasiswa
            $('#btdelete').unbind().click(function() {
                $.ajax({
                    type: 'DELETE',
                    url: '<?= base_url() ?>delete/' + id,
                    success: function(response) {
                        $('#myModalDelete').modal('hide');
                        location.reload();
                    }
                });
            });
        });
    });
</script>