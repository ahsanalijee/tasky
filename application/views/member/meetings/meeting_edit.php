<?php
$this->view('member/header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Update Meeting</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>
	<form method="post" enctype="multipart/form-data" action="<?php echo site_url()."member/meetings/update"?>">
		
		<input type="hidden" name="editid" value="<?php echo $data['0']->meeting_id; ?>">
		<div class="form-group col-sm-12">
			<label>Title</label>
			<input type="text" name="title" required="required" value="<?php echo $data['0']->meeting_title; ?>" class="form-control">
		</div>
		<div class="form-group col-sm-12">
			<label>Description</label>
			<textarea class="form-control" rows="7" required name="discription"><?php echo $data['0']->meeting_discription; ?></textarea>
		</div>
		<div class="form-group col-sm-12">
			<label>Time</label>
			<input type="text" name="time" value="<?php echo $data['0']->meeting_date; ?>" required="required"  class="form-control">
		</div>
		<div class="form-group col-xs-12">
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>
