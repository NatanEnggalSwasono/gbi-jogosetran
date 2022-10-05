<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8 text-gray-800">

            <form id="form-tambah-agenda" method="post" action="<?= site_url('jadwal/insert') ?>" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Nama Ibadah</label>
                    <div class="col-sm-10">
                        <input require type="text" class="form-control" name="nama_ibadah">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Hari</label>
                    <div class="col-sm-10">
                        <input require type="text" class="form-control" name="tanggal">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-10">
                        <input require type="time" class="form-control" name="waktu">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea require type="text" class="form-control" rows="5" name="keterangan"></textarea>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn" id="btn-save-jadwal" style="background-color: #2a5d68; color: #ededed;">Simpan</button>
                        <a href="<?= site_url('jadwal') ?>" class="btn btn-md" style="background-color: #2b58bf; color: #ededed;">
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
        $("#btn-save-jadwal").on("click", function() {
            let validate = $("#form-tambah-jadwal").valid()
            if (validate) {
                $("#form-tambah-jadwal").submit()
            }
        })
        $("#form-tambah-jadwal").validates({
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