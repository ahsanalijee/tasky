<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Update Team</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>
	<form method="post" enctype="multipart/form-data" action="<?php echo site_url()."members/update"?>">
		
		<input type="hidden" name="editid" value="<?php echo $data['0']->member_id; ?>">
		<div class="form-group col-sm-6">
			<label>Member Name</label>
			<input type="text" name="name" required="required" value="<?php echo $data['0']->member_name; ?>" class="form-control">
		</div>
		<div class="form-group col-sm-6">
			<label>Designation</label>
			<input type="text" name="designation" required="required" value="<?php echo $data['0']->designation; ?>" class="form-control">
		</div>
		<div class="form-group col-sm-12">
			<label>Email</label>
			<input type="text" name="email" required="required" value="<?php echo $data['0']->email; ?>" class="form-control">
		</div>
		
		<div class="form-group col-sm-6">
			<label>Image</label>
			<input type="file" class="form-control" accept="image/*" name="image" onchange="readURL(this)">
		<input type="hidden" id="checkimage" name="checkimage" value="<?php echo $data['0']->member_image; ?>">
		
		</div>
		<div class="form-group col-sm-6">
			<label>Type</label>
			<select name="type"  class="form-control">
				<option value="">Select</option>
				<option value="1" <?php  if($data['0']->is_leader==1){
					echo "selected";
				} ?>>Leader</option>
				<option value="0"  <?php  if($data['0']->is_leader==0){
					echo "selected";
				} ?>>Member</option>
			</select>
		</div>
		<img width="200px" height="200px" class="img img-thumbnail img-responsive" id="cimage" src="<?php echo site_url().$data['0']->member_image; ?>" style="display: block; margin: auto;">
		<div class="form-group col-sm-12">
			<label>Team (if any)</label>
			<?php //print_r($teams)?>
			<select   name="team" class="form-control">
				<option value="">Select</option>
				<?php
					foreach ($teams as $team) {
				?>
					<option value="<?php echo $team->team_id?>"  <?php  if($data['0']->team_id==$team->team_id){
					echo "selected";
				} ?>><?php echo $team->team_name?></option>
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