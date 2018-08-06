<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Add New Member</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>

	<form method="post" enctype="multipart/form-data"  action="<?php echo site_url()."members/save"?>">
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
		
		<div class="form-group col-sm-6">
			<label>Member Name</label>
			<input type="text" name="name" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
		</div>
		<div class="form-group col-sm-6">
			<label>Designation</label>
			<input type="text" name="designation" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
		</div>
		<div class="form-group col-sm-6">
			<label>Email</label>
			<input type="text" name="email" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
		</div>
		<div class="form-group col-sm-6">
			<label>Password</label>
			<input type="password" name="password" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
		</div>
		<div class="form-group col-sm-6">
			<label>Image</label>
			<input type="file" accept="image/*" name="image"  class="form-control">
		</div>
		<div class="form-group col-sm-6">
			<label>Type</label>
			<select name="type"  class="form-control">
				<option value="">Select</option>
				<option value="1">Leader</option>
				<option value="0">Member</option>
			</select>
		</div>
		<div class="form-group col-sm-12">
			<label>Team (if any)</label>
			<?php //print_r($teams)?>
			<select   name="team" class="form-control">
				<option value="">Select</option>
				<?php
					foreach ($teams as $team) {
				?>
					<option value="<?php echo $team->team_id?>"><?php echo $team->team_name?></option>
				<?php
					}
				?>
				
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