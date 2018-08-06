<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Add New Team</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>

	<form method="post"  action="<?php echo site_url()."teams/save"?>">
		<?php
		 if ($this->session->flashdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <?php echo $this->session->flashdata('success');?>
			</div>
		<?php
		 }
		?>
		<?php
		 if ($this->session->flashdata('error')) {
		?>
			<div class="alert alert-warning alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <?php echo $this->session->flashdata('error');?>
			</div>
		<?php
		 }
		?>
		
		<div class="form-group">
			<label>Team Name</label>
			<input type="text" name="name" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Discription</label>
			<textarea class="form-control" rows="7" name="discription"></textarea>
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>