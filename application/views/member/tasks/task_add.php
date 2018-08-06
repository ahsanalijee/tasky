<?php
$this->view('member/header');
?>
<!-- page Header End -->

	<!-- page content -->
	
	<h1 align="center">Assign Task</h1>
	<a onclick="window.history.back()" class="btn btn-warning" style="margin: 30px 0">Go Back</a>

	<form method="post"  action="<?php echo site_url()."member/tasks/save"?>">
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
			<label>Member</label>
			<select   name="member" class="form-control" id="members">
				<option value="">Select</option>
				<?php
					foreach ($member as $team) {
				?>
					<option value="<?php echo $team->member_id?>"><?php echo $team->member_name?></option>
				<?php
					}
				?>
				
			</select>
		</div>
		<div class="form-group col-sm-12">
			<label>Title</label>
			<input type="text" name="title" class="form-control">
		</div>
		<div class="form-group col-sm-12">
			<label>Discription</label>
			<textarea class="form-control" rows="7" name="discription"></textarea>
		</div>
		<div class="form-group col-xs-12">
			
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