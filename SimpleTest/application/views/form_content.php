<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple Content</title>
      <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <script src="<?php echo base_url()  ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
      <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: "link image"
         });
      </script>
  </head>
  <body>
    <div class='wrapper'>
      <div class="container">
      <div class=row>
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Simple Content</a>
              </div>
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url()."/content"?>">Home</a></li>
              </ul>

              <div class="nav navbar-nav navbar-right">
                  <a class="navbar-brand">
                      Welcome <strong><?php echo $_SESSION['username'];?></strong>
                  </a>
                 <a href="<?php echo site_url()."/user/logout"?>" class="navbar-brand">Logout</a>
              </div>
            </div>
          </nav>
      </div>
        <div class='row'>
          <h2>Content</h2>
          <div class='col-md-12'>
            <form class="form-horizontal" action="<?php echo site_url('/content/add'); ?>" method='post'>
              <div class="form-group">
                <label class="control-label col-sm-2" for="judul">Judul:</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="judul" placeholder="Judul" name='judul' required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="isi">Isi:</label>
                <div class="col-sm-8"> 
                  <textarea id="isi" name="isi" rows="10" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="tag">Tag(s):</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="tag" placeholder="Tags" name='tag'>
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success">Tambah Content</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  </body>
</html>
