<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Update Task</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>
	<form method="post"  action="<?php echo site_url()."tasks/update"?>">
		<input type="hidden" name="editid" value="<?php echo $data['0']->task_id; ?>">

		<div class="form-group col-sm-6">
			<label>Team </label>
			<select   name="team" class="form-control" id="teams">
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
		<?php //print_r($members)?>
		<div class="form-group col-sm-6">
			<label>Member</label>
			<select   name="member" class="form-control" id="members">
				<option value="">Select</option>
				<?php
					foreach ($members as $member) {
				?>
					<option value="<?php echo $member->member_id?>" <?php if ($member->member_id==$data['0']->member_id): ?>
						selected
					<?php endif ?>><?php echo $member->member_name?></option>
				<?php
					}
				?>
				
			</select>
		</div>
		<div class="form-group col-sm-12">
			<label>Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo $data['0']->task_title; ?>">
		</div>
		<div class="form-group col-sm-12">
			<label>Discription</label>
			<textarea class="form-control" rows="7" name="discription"> <?php echo $data['0']->task_discription; ?></textarea>
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
	$('#teams').on('change',function(){
		var id=$(this).val();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url()."members/ajax"?>",
			dataType: 'html',
			data: {id:id},
		}).done(function(res) {
		    //$("#cbook").removeData();
		    //$("#cmember").hide();
		    $("#members").html(res);
		  })
		  
	});
</script>