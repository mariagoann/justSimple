<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple Content</title>
      <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
      <style type="text/css">
        .center_div{
            vertical-align: middle;
            padding-top: 80px;
        }
      </style>
  </head>
  <body>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <div class="container center_div"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row">
          <?php
            if($this->session->userdata('warning_reg')!=""){
              if($_SESSION['warning_reg']==2){
            ?>
            <div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Error.Register tidak berhasil!
              </div>
            <?php
              }else if($_SESSION['warning_reg']==3){
            ?>
            <div class="alert alert-warning alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Username telah ada. Silahkan gunakan username yang lain.
              </div>
            <?php
              }
              unset($_SESSION['warning_reg']);
            }
          ?>
          <div class="col-md-4 col-md-offset-4 centered">
            <p><center><h3>Simple Content</h3></center></p><br><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Register</h3>
                  </div>
                  <div class="panel-body">

                      <form role="form" method="post" action="<?php echo site_url('/user/register_process'); ?>">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Name" name="name" type="text" autofocus required>
                              </div>


                              <div class="form-group">
                                  <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus required>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Username" name="username" type="text" required>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" name="password" type="password" required>
                              </div>

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                          </fieldset>
                      </form>
                      <br>
                      <center><b>Already registered ?</b> <br></b><a href="<?php echo site_url('/user'); ?>">Login here</a></center><!--for centered text-->
                  </div>
              </div>
          </div>
      </div>
  </div>

    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  </body>
</html>
