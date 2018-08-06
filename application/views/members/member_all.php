<?php
$this->view('header');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- page Header End -->
<h2 align="center">All Members</h2>
<a class="btn btn-primary" href="<?php echo site_url()."teams/index"?>" style="margin: 30px 0">Add New</a>
<table id="myTable" class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>Team</th>
			<th>Designation</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($data as $d) {
	?>
		<tr>
			<td><img width="70px" class="img img-thumbnail" height="70px" src="<?php echo site_url().$d->member_image?>" ></td>
			<td><?php echo $d->member_name?></td>
			<td><?php echo $d->team_name?></td>
			<td><?php echo $d->designation?></td>
			<td>
				<a class="btn btn-warning" href="<?php echo site_url()."members/edit/".$d->member_id?>">Edit</a>
				<a class="btn btn-danger" onclick="return confirm('Are You Sure You Wanna Delete This?')" href="<?php echo site_url()."members/delete/".$d->member_id?>">Delete</a>
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
