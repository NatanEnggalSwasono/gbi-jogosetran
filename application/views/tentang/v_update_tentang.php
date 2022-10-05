<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8 text-gray-800">

            <form id="form-update-tentang" method="post" action="<?= site_url('tentang/update') ?>" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Visi</label>
                    <div class="col-sm-10">
                        <textarea require type="text" class="form-control" name="visi" rows="7"><?= $tentang->visi ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Misi</label>
                    <div class="col-sm-10">
                        <textarea require type="text" class="form-control" name="misi" rows="7"><?= $tentang->misi ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama Pendeta</label>
                    <div class="col-sm-10">
                        <input require type="text" value="<?= $tentang->nama_pendeta ?>" class="form-control" name="nama_pendeta">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Background Pendeta</label>
                    <div class="col-sm-10">
                        <textarea require type="text" class="form-control" name="background_pendeta" rows="7"><?= $tentang->background_pendeta ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="id_tentang" value="<?= $tentang->id_tentang ?>">
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn" id="btn-update-tentang" style="background-color: #2a5d68; color: #ededed;">Simpan</button>
                        <a href="<?= site_url('tentang') ?>" class="btn btn-md" style="background-color: #2b58bf; color: #ededed;">
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

<!--<html>

<head>
    <title>Ubah Tentang Gereja </title>
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
            <h3>Form Update Tentang</h3>
        </div>
        <div class="card-body">
            <form id="form-update-tentang" method="post" action="<?= site_url('tentang/update') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">visi</label>
                    <textarea require type="text" class="form-control" name="visi" rows="7"><?= $tentang->visi ?></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Misi</label>
                    <textarea require type="text" class="form-control" name="misi" rows="7"><?= $tentang->misi ?></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Pendeta</label>
                    <input require type="text" value="<?= $tentang->nama_pendeta ?>" class="form-control" name="nama_pendeta">
                </div>
                <div class="form-group">
                    <label class="form-label">Background Pendeta</label>
                    <textarea require type="text" class="form-control" name="background_pendeta" rows="7"><?= $tentang->background_pendeta ?></textarea>
                </div>
                <input type="hidden" name="id_tentang" value="<?= $tentang->id_tentang ?>">
            </form>
        </div>
        <div class="card-footer">
            <button type="button" id="btn-update-tentang" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="<?= site_url('tentang') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-reply"></i> Kembali
            </a>
        </div>
    </div>
</body>

</html>-->

<script>
    $(function() {
        $("#btn-update-tentang").on("click", function() {
            let validate = $("#form-update-tentang").valid()
            if (validate) {
                $("#form-update-tentang").submit()
            }
        })
        $("#form-update-tentang").validates({
            rules: {
                tentang: {
                    digits: true
                },
                tentang: {
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