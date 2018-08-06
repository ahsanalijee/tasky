<?php
$this->view('member/header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Add New Report</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>
	<form method="post" enctype="multipart/form-data"  action="<?php echo site_url()."member/reports/save"?>">
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
			<input type="text" name="title" required="required"  class="form-control">
		</div>
		<div class="form-group col-sm-12">
			<label>Description</label>
			<textarea rows="7" class="form-control" required name="discription"></textarea>
		</div>
		<div class="form-group col-sm-12">
			<label>Type</label>
			<select class="form-control" name="type">
				<option value="">Select One</option>
				<option>daily</option>
				<option>weakely</option>
				<option>Special</option>
			</select>
		</div>
		<div class="form-group col-xs-12">
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>