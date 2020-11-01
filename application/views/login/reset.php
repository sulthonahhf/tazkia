<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Tazkia</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/template-admin/HTML/css/maruti-login.css" />
    </head>
    <body>
        <div id="loginbox">
            <?php echo form_open('reset_password/'.$this->uri->segment(2),array(
                      'class' => 'form-vertical'
                  )); ?>
				<div class="control-group normal_text">
					<h4>Tazkia<br>Masukkan Password Baru</h4>
				</div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" class="form-control" name="password" id="password" placeholder="Password Baru" required>
                        </div>
                    </div>
                </div>
                <div class="control-group" style="padding-top: 2px">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" class="form-control" name="password_new" id="password_new" placeholder="Ulangi Password Baru" required>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                	<!-- <span class="pull-left"><a href="<?php echo site_url('forgot_password') ?>" class="flip-link btn btn-inverse" id="to-recover">Lupa Password</a></span> -->
                    <!-- <a class="btn btn-info" href="<?php echo site_url('Home') ?>">Back to Home</a> -->
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Reset" /></span>
                </div>
            <?php echo form_close(); ?>
        </div>
        
        <script src="<?php echo base_url() ?>assets/template-admin/HTML/js/jquery.min.js"></script>  
        <script src="<?php echo base_url() ?>assets/template-admin/HTML/js/maruti.login.js"></script> 
    </body>

</html>
