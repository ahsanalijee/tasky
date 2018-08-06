<?php
$this->view('member/header');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- page Header End -->
<h2 align="center">My Reports</h2>
<a class="btn btn-primary" href="<?php echo site_url()."member/reports/index"?>" style="margin: 30px 0">Add New</a>
<table id="myTable" class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Type</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($data as $d) {
	?>
		<tr>
			<td><?php echo $d->report_title?></td>
			<td><?php echo $d->report_type?></td>
			<td><?php echo $d->report_date?></td>
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
