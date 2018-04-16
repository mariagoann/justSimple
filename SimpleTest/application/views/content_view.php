<?php
  $this->load->helper('htmlpurifier');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple Content</title>
      <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
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

          <div class='col-md-10'>
            <?php
              if($_SESSION['role']==2){
            ?>
            <a href="<?php echo site_url()."/content/add_content"?>" class="btn btn-success" role="button" >Tambah Content</a>
            <?php
              }
            ?>
            
          <?php
            foreach ($content as $key => $value) {
              echo "<h2>".$value['judul']."</h2>";
              echo html_purify($value['isi']);
              echo "<br>";
              echo "Tag(s) : ".$value['tag'];
              echo "<br>";
              echo "<i> Ditulis oleh : ".$value['name']."</i>";
            }
          ?>
          </div>
          <h2></h2>
        </div>
      </div>
    </div>

  </body>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  </body>
</html>
