<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8 text-gray-800">

            <form id="form-tambah-informasi" method="post" action="<?= site_url('informasi/insert') ?>" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Judul Informasi</label>
                    <div class="col-sm-10">
                        <input require type="text" class="form-control" name="judul_informasi">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Isi Informasi</label>
                    <div class="col-sm-10">
                        <textarea require type="text" class="form-control" name="isi_informasi" rows="7"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Tanggal Informasi</label>
                    <div class="col-sm-10">
                        <input require type="date" class="form-control" name="tanggal_informasi">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">File</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" name="userfile" class="custom-file-input" required />
                                    <label class="custom-file-label" for="file">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn" id="btn-save-informasi" style="background-color: #2a5d68; color: #ededed;">Simpan</button>
                        <a href="<?= site_url('informasi') ?>" class="btn btn-md" style="background-color: #2b58bf; color: #ededed;">
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
        $("#btn-save-informasi").on("click", function() {
            let validate = $("#form-tambah-informasi").valid()
            if (validate) {
                $("#form-tambah-informasi").submit()
            }
        })
        $("#form-tambah-informasi").validates({
            rules: {
                isi_informasi: {
                    digits: true
                },
                file: {
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