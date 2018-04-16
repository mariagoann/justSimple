<?php
  $this->load->library('session');
?>
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
      <div class="container center_div">
        <div class="row">
          <?php
            if($this->session->userdata('error_login')!=""){
            ?>
          <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $_SESSION['error_login'];?>
            </div>
            <?php
              unset($_SESSION['error_login']);
            }
          ?>
            <div class="col-md-4 col-md-offset-4">
                <p><center><h3>Simple Content</h3></center></p><br>
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo site_url('/user/login_process'); ?>">
                            <fieldset>
                                <div class="form-group"  >
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="login" >
                            </fieldset>
                        </form>
                        <BR>
                    <center><b>Not registered ?</b> <br></b><a href="<?php echo site_url('/user/register'); ?>">Register here</a></center><!--for centered text-->
    
                    </div>
                </div>
            </div>
        </div>
      </div>
  </body>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  </body>
</html>
