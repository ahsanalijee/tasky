<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->

	<h1 align="center" style="text-transform: capitalize;">Welcome <?php 
	$user=$this->session->userdata('admin');
	echo $user->admin_name;
	?></h1>
	<h3>Today Reports</h3>
	<div class="row">
	<?php
		foreach ($reports as $report) {
	?>

		<div class="col-sm-4">
			<div class="table-responsive" style="background: #f5f5f5; padding: 20px 10px; min-height: 300px; border-radius: 10px; margin: 20px 0">
				<h4 align="center"><?php echo $report['team']?></h4>
				<table class="table table-striped table-hover">
					<tr>
						<th>Name</th>
						<th>Type</th>
						<th>title</th>
						<th><i class="far fa-eye"></i></th>
					</tr>
					<?php
						foreach ( $report['members'] as $member) {
					?>
						<tr>
							<td><?php echo $member->member_name ?></td>
							<td><?php echo $member->report_type ?></td>
							<td><?php echo $member->report_title ?></td>
							<td><a type="button" onclick="showreport(<?php echo $member->report_id ?>)"><i class="far fa-eye"></i></a></td>
						</tr>
					<?php
						}
					?>
						
				</table>
			</div>
		</div>
	<?php
		}
	?>
	</div>

<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Report</h4>
      </div>
      <div class="modal-body" id="mbody">
        <h2 align="center" id></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
		
<!-- page footer -->
<?php
$this->view('footer');
?>
<script type="text/javascript">
	function showreport(id) {
		$.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/search",
                data: {id: id},
                success: function (data) {
                    $("#mbody").html(data);
                }
            });
		$('#modal').modal('show');
	}
</script>