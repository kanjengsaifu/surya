<div class="content-wrapper">
  <section class="content-header">
    <h1><?-$title?></h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <?php echo form_open('auth/changepwd'); ?>
            <div class="box-body">
              <div class="form-group <?php if (form_error('old_password')){ echo 'has-error'; } ?>">
                <label>Old Password</label>
                <input class="form-control" type="password" name="old_password" id="old_password"
                  value="<?php
                  if (isset($_POST['old_password']))
                  {
                    echo $_POST['old_password'];
                  }
                ?>">
                <?php echo form_error('old_password'); ?>
              </div>
              <div class="form-group <?php if (form_error('new_password')){ echo 'has-error'; } ?>">
                <label>New Password</label>
                <input class="form-control" type="password" name="new_password" id="new_password"
                  value="<?php
                  if (isset($_POST['new_password']))
                  {
                    echo $_POST['new_password'];
                  }
                ?>">
                <?php echo form_error('new_password'); ?>
              </div>
              <div class="form-group <?php if (form_error('confirm_password')){ echo 'has-error'; } ?>">
                <label>Confirm Password</label>
                <input class="form-control" type="password" name="confirm_password" id="confirm_password"
                  value="<?php
                  if (isset($_POST['confirm_password']))
                  {
                    echo $_POST['confirm_password'];
                  }
                ?>">
                <?php echo form_error('confirm_password'); ?>
              </div>
            </div>
            <div class="box-footer">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>
</div>