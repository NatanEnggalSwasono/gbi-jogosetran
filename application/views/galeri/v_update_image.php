<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-8 text-gray-800">

      <form id="form-update-galeri" method="post" action="<?= site_url('galeri/update') ?>" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col-sm-2">Foto</div>
          <div class="col-sm-10">
            <div class="row">
              <div class="col-sm-3">
                <img src="<?= base_url('assets/picture/') . $galeri->foto; ?>" class="img-thumbnail">
              </div>
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" name="userfile" class="custom-file-input" size="20" required />
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>
              <input type="hidden" name="id" value="<?= $galeri->id ?>">
            </div>
          </div>
        </div>

        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn" id="btn-update-galeri" style="background-color: #2a5d68; color: #ededed;">Simpan</button>
            <a href="<?= site_url('galeri') ?>" class="btn btn-md" style="background-color: #2b58bf; color: #ededed;">
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

<!--<!DOCTYPE html>
<html lang="en">

<head>
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
      <h3>Form Update Image</h3>
    </div>
    <div class="card-body">
      <form id="form-update-galeri" method="post" action="<?= site_url('galeri/update') ?>" enctype="multipart/form-data">
        <div class="form-group">
          <img src="<?= base_url() ?>/assets/picture/<?= $galeri->foto ?>" width="200px" /> <br>
          <label class="form-label">Foto</label>
          <input require type="file" value="<?= $galeri->foto ?>" class="form-control" name="userfile">
        </div>
        <input type="hidden" name="id" value="<?= $galeri->id ?>">
      </form>
    </div>
    <div class="card-footer">
      <button type="button" id="btn-update-galeri" class="btn btn-success btn-sm">
        <i class="fa fa-save"></i> Simpan
      </button>
      <a href="<?= site_url('galeri') ?>" class="btn btn-primary btn-sm">
        <i class="fa fa-reply"></i> Kembali
      </a>
    </div>
  </div>

  <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
</body>

</html>-->

<script>
  $(function() {
    $("#btn-update-galeri").on("click", function() {
      let validate = $("#form-update-galeri").valid()
      if (validate) {
        $("#form-update-galeri").submit()
      }
    })
    $("#form-update-galeri").validates({
      rules: {
        id: {
          digits: true
        },
        foto: {
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