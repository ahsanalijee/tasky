<?php
$this->view('header');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- page Header End -->
<h2 align="center">Pending Tasks</h2>
<a class="btn btn-primary" href="<?php echo site_url()."tasks/index"?>" style="margin: 30px 0">Add New</a>
<table id="myTable" class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Assigned To</th>
			<th>Assign Date</th>
			<th>Completed Date</th>
			<th>Completed</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
		// print_r($data);
		 foreach ($data as $d) {
	?>
		<tr>
			<td><?php echo $d->task_title?></td>
			<td><?php echo $d->member_name?></td>
			<td><?php echo $d->assign_date?></td>
			<td><?php echo $d->completed_date?></td>
			<td><a class="btn btn-default" onclick="return confirm('Are You Sure Task Is Completed?')" href="<?php echo site_url()."tasks/completed/".$d->task_id?>">Confirm <i class="fas fa-check"></i></a></td>
			<td>
				<a class="btn btn-warning" href="<?php echo site_url()."tasks/edit/".$d->task_id?>">Edit</a>
				<a class="btn btn-danger" onclick="return confirm('Are You Sure You Wanna Delete This?')" href="<?php echo site_url()."tasks/delete/".$d->task_id?>">Delete</a>
			</td>
		</tr>
	<?php
		}
	?>
	</tbody>
</table>

<!-- page footer -->
<?php
$this->view('footer');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
