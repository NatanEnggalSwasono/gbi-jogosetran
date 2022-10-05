<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8 text-gray-800">

            <form id="form-update-informasi" method="post" action="<?= site_url('jadwal/update') ?>" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Nama Ibadah</label>
                    <div class="col-sm-10">
                        <input require type="text" class="form-control" value="<?= $jadwal->nama_ibadah ?>" name="nama_ibadah">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Hari</label>
                    <div class="col-sm-10">
                        <input require type="text" class="form-control" value="<?= $jadwal->tanggal ?>" name="tanggal"></input>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-10">
                        <input require type="time" class="form-control" value="<?= $jadwal->waktu ?>" name="waktu">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea require type="text" class="form-control" rows="7" name="keterangan"><?= $jadwal->keterangan ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="id_jadwal" value="<?= $jadwal->id_jadwal ?>">

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn" id="btn-update-jadwal" style="background-color: #2a5d68; color: #ededed;">Simpan</button>
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
        $("#btn-update-jadwal").on("click", function() {
            let validate = $("#form-update-jadwal").valid()
            if (validate) {
                $("#form-update-jadwal").submit()
            }
        })
        $("#form-update-jadwal").validates({
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