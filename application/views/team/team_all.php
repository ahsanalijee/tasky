<?php
$this->view('header');
?>

<!-- page Header End -->
<h2 align="center">All Teams</h2>
<a class="btn btn-primary" href="<?php echo site_url()."teams/index"?>" style="margin: 30px 0">Add New</a>
<table id="myTable" class="table table-hover">
	<thead>
		<tr>
			<th>Team Name</th>
			<th>Discription</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($data as $d) {
	?>
		<tr>
			<td><?php echo $d->team_name?></td>
			<td><?php echo $d->discription?></td>
			<td>
				<a class="btn btn-warning" href="<?php echo site_url()."teams/edit/".$d->team_id?>">Edit</a>
				<a class="btn btn-danger" onclick="return confirm('Are You Sure You Wanna Delete This?')" href="<?php echo site_url()."teams/delete/".$d->team_id?>">Delete</a>
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

<script type="text/javascript">
	$(document).ready( function () {
	    $('#myTable').DataTable();
	} );
</script>
