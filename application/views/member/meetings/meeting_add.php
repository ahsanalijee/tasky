<?php
$this->view('member/header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Add New Meeting</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>

	<form method="post"  action="<?php echo site_url()."member/meetings/save"?>">
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
		<div class="form-group col-sm-12">
			<label>Title</label>
			<input type="text" name="title" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
		</div>
		<div class="form-group col-sm-12">
			<label>Description</label>
			<textarea class="form-control" rows="7" required name="discription"></textarea>
		</div>
		<div class="form-group col-sm-6">
			<label>Time</label>
			<input type="time" name="time" required="required"  class="form-control">
		</div>
		<div class="form-group col-sm-6">
			<label>Date</label>
			<input type="date"  name="date"  class="form-control" required>
		</div>
		<div class="form-group col-xs-12">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>