<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Update Team</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px o">Go Back</a>
	<form method="post"  action="<?php echo site_url()."teams/update"?>">
		<input type="hidden" name="editid" value="<?php echo $data['0']->team_id; ?>">

		<div class="form-group">
			<label>Team Name</label>
			<input type="text" name="name" required="required" value="<?php echo $data['0']->team_name; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Discription</label>
			<textarea class="form-control" rows="7" name="discription"><?php echo $data['0']->discription; ?></textarea>
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>