<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8 text-gray-800">

            <form id="form-update-renungan" method="post" action="<?= site_url('renungan/update') ?>" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Judul Renungan</label>
                    <div class="col-sm-10">
                        <input require type="text" class="form-control" value="<?= $renungan->judul_renungan ?>" name="judul_renungan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Isi Renungan</label>
                    <div class="col-sm-10">
                        <textarea require type="text" class="form-control" name="isi_renungan" rows="7"><?= $renungan->isi_renungan ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Tanggal Renungan</label>
                    <div class="col-sm-10">
                        <input require type="date" class="form-control" value="<?= $renungan->tanggal_renungan ?>" name="tanggal_renungan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">Gambar</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('gambar/renungan/') . $renungan->gambar_renungan; ?>" class="img-thumbnail" width="150px;">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" name="userfile" class="custom-file-input" size="20" required />
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_renungan" value="<?= $renungan->id_renungan ?>">

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn" id="btn-update-renungan" style="background-color: #2a5d68; color: #ededed;">Simpan</button>
                        <a href="<?= site_url('renungan') ?>" class="btn btn-md" style="background-color: #2b58bf; color: #ededed;">
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

<!--<head>
    <title>Form Ubah Barang</title>
     CSS only CDN 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     JQuery and Javascript CDN 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script async src="https://docs.opencv.org/master/opencv.js" type="text/javascript"></script>
     JQuery Validation CDN
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3>Form Update Renungan</h3>
        </div>
        <div class="card-body">
            <form id="form-update-renungan" method="post" action="<?= site_url('renungan/update') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Judul Renungan</label>
                    <input require type="text" value="<?= $renungan->judul_renungan ?>" class="form-control" name="judul_renungan">
                </div>
                <div class="form-group">
                    <label class="form-label">Isi Renungan</label>
                    <textarea require type="text" class="form-control" name="isi_renungan" rows="7"><?= $renungan->isi_renungan ?></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal Renungan</label>
                    <input require type="date" value="<?= $renungan->tanggal_renungan ?>" class="form-control" name="tanggal_renungan">
                </div>
                <div class="form-group">
                    <label class="form-label">Gambar</label><br>
                    <img src="<?= base_url('gambar/renungan/') . $renungan->gambar_renungan; ?>" class="img-thumbnail" width="150px;">
                    <input require type="file" value="<?= $renungan->gambar_renungan ?>" class="form-control" name="userfile">
                </div>
                <input type="hidden" name="id_renungan" value="<?= $renungan->id_renungan ?>">
            </form>
        </div>
        <div class="card-footer">
            <button type="button" id="btn-update-renungan" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="<?= site_url('renungan') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-reply"></i> Kembali
            </a>
        </div>
    </div>
</body>

</html>-->

<script>
    $(function() {
        $("#btn-update-renungan").on("click", function() {
            let validate = $("#form-update-renungan").valid()
            if (validate) {
                $("#form-update-renungan").submit()
            }
        })
        $("#form-update-renungan").validates({
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