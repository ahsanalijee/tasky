<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Update Meeting</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>
	<form method="post" enctype="multipart/form-data" action="<?php echo site_url()."meetings/update"?>">
		
		<input type="hidden" name="editid" value="<?php echo $data['0']->meeting_id; ?>">
		<div class="form-group col-sm-12">
			<label>Title</label>
			<input type="text" name="title" required="required" value="<?php echo $data['0']->meeting_title; ?>" class="form-control">
		</div>
		<div class="form-group col-sm-12">
			<label>Description</label>
			<textarea class="form-control" rows="7" required name="discription"><?php echo $data['0']->meeting_discription; ?></textarea>
		</div>
		<div class="form-group col-sm-6">
			<label>Time</label>
			<input type="text" name="time" value="<?php echo $data['0']->meeting_date; ?>" required="required"  class="form-control">
		</div>
		<div class="form-group col-sm-6">
			<label>Team</label>
			<select   name="team" class="form-control">
				<option value="">Select</option>
				<?php
					foreach ($teams as $team) {
				?>
					<option value="<?php echo $team->team_id?>" <?php if ($team->team_id==$data['0']->team_id): ?>
						selected
					<?php endif ?>><?php echo $team->team_name?></option>
				<?php
					}
				?>
				
			</select>
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>
<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                document.getElementById('cimage').src=e.target.result;
               	document.getElementById('checkimage').value='';
                document.getElementById("checkimage").value = "";
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>