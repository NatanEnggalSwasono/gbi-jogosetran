<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8 text-gray-800">

            <form id="form-tambah-kontak" method="post" action="<?= site_url('kontak/insert') ?>" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-10">
                        <input require type="number" class="form-control" name="no_telepon">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input require type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Social Media</label>
                    <div class="col-sm-10">
                        <input require type="text" class="form-control" name="social_media">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                        <input require type="text" class="form-control" name="website">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input require type="text" class="form-control" name="alamat">
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn" id="btn-save-kontak" style="background-color: #2a5d68; color: #ededed;">Simpan</button>
                        <a href="<?= site_url('kontak') ?>" class="btn btn-md" style="background-color: #2b58bf; color: #ededed;">
                            <i class="fa fa-reply"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    $(function() {
        $("#btn-save-kontak").on("click", function() {
            let validate = $("#form-tambah-kontak").valid()
            if (validate) {
                $("#form-tambah-kontak").submit()
            }
        })
        $("#form-tambah-kontak").validates({
            rules: {
                harga_barang: {
                    digits: true
                },
                jumlah_barang: {
                    digits: true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            }
        })
    })
</script>