<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->

	<h2 align="center"> Settings</h2>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>
	<form method="post" autocomplete="off"  action="<?php echo site_url()."home/changesettings"?>">
		<?php
		 if ($this->session->flashdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <?php echo $this->session->flashdata('success');?>
			</div>
		<?php
		 }
		 $user=$this->session->userdata('admin');
		?>
		<input id="username" style="display:none" type="text" name="fakeusernameremembered">
  		<input id="password" style="display:none" type="password" name="fakepasswordremembered">
  		<div class="form-group">
			<label>Name</label>
			<input type="text"  required class="form-control" name="name" value="<?php echo $user->admin_name?>">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email"  required class="form-control" name="email" value="<?php echo $user->admin_email?>">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password"  required class="form-control" name="password" value="<?php echo $user->admin_pass?>">
		</div>
		<input type="submit" name="" class="btn btn-primary" value="Save Changes">
	</form>
<!-- page footer -->
<?php
$this->view('member/footer');
?>
