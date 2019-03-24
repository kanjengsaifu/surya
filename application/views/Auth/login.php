<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.8/collection/icon/icon.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<?php //flash message ?>
  <?php //success ?>
  <?php if($this->session->flashdata('success')) : ?>
    <?php echo
      '<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color:#d4edda">
            <div class="modal-body">
              <p class="text-success text-center" style = "margin-top:16px">'.$this->session->flashdata("success").'</p>
            </div>
          </div>
        </div>
      </div>'
    ?>
  <?php endif; ?>

  <?php //failed ?>
  <?php if($this->session->flashdata('failed')) : ?>
    <?php echo
      '<div class="modal fade" id="failed" tabindex="-1" role="dialog" aria-labelledby="modalFailedLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color:#f8d7da">
            <div class="modal-body">
              <p class="text-danger text-center" style = "margin-top:16px">'.$this->session->flashdata("failed").'</p>
            </div>
          </div>
        </div>
      </div>'
    ?>
  <?php endif; ?>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>S</b>urya</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start using application</p>

    <?php echo form_open('auth'); ?>
      <div class="form-group <?php if (form_error('username')){ echo 'has-error'; } ?>">
        <input type="text" class="form-control" placeholder="Username" name="username"
          value="<?php
          if (isset($_POST['username']))
          {
            echo $_POST['username'];
          }
        ?>">
        <?php echo form_error('username'); ?>
      </div>
      <div class="form-group <?php if (form_error('password')){ echo 'has-error'; } ?>">
        <input type="password" class="form-control" placeholder="Password" name="password"
          value="<?php
          if (isset($_POST['password']))
          {
            echo $_POST['password'];
          }
        ?>">
        <?php echo form_error('password'); ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>

    <!-- <a href="#">I forgot my password</a><br> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
</body>
<script>
  // Show the failed modal
  $(window).on('load',function(){
    $('#failed').modal('show');
  });

  // Show the success modal
  $(window).on('load',function(){
    $('#success').modal('show');
  });
</script>
</html>
