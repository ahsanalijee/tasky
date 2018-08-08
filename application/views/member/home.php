<?php
$this->view('member/header');
?>
<!-- page Header End -->

	<!-- page content -->

	<h1 align="center" style="text-transform: capitalize;">Welcome <?php 
	$user=$this->session->userdata('user');
	echo $user->member_name;
	?> </h1>
	<div class="row" style="margin: 30px auto">
		<div class="col-sm-8" >
			<div style="background: #f5f5f5; padding: 20px 10px; min-height: 300px">
				<h4 align="center">Your Tasks</h4>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<tr>
							<th>Title</th>
							<th>Discription</th>
							<th>Date</th>
							<th>Assigned By</th>
							<th>Completed</th>
						</tr>
						<?php
							foreach ($data as $d) {
						?>
							<tr>
								<td><?php echo $d->task_title?></td>
								<td><?php echo $d->task_discription?></td>
								<td><?php echo $d->assign_date?></td>
								<td><?php 
									echo ($d->by_leader) ? "Team leader" :"Admin";
								?></td>
								<?php
									if ($d->completed_date) {
								?>
									<td><?php echo $d->completed_date?></td>
								<?php
									}else{
								?>
									<td><a onclick="return confirm('Have You Completed The Task?')" href="<?php echo site_url()."member/home/membercompleted/".$d->task_id?>" class="btn btn-default" >Completed</a></td>
								<?php
									}
								?>
							</tr>
						<?php	
							}
						?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-sm-4  table-responsive">
			<div style="background: #f5f5f5; padding: 20px 10px; min-height: 300px">
				<h4 align="center">Notifications</h4>
				<div>
					<table width="100%">
						<h5 align="center" style="margin: 20px auto">Meetings</h5>
						<?php
							foreach ($meetings as $d) {
						?>
							<tr>
								<td width="75%"><h4><?php echo $d->meeting_title?></h4><span>By
									<?php  echo ($d->is_team)? "Leader" :"Admin" ?>
								</span>
								</td>
								<td><h6><?php echo $d->meeting_date?></h6></td>
							</tr>
							<tr>
								<td colspan="2"><p><?php echo $d->meeting_discription?></p></td>
							</tr>
						<?php	
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
<!-- page footer -->
<?php
$this->view('member/footer');

?>
<?php
$url=site_url()."member/home";
header('Refresh: 60; URL='.$url);
?> 
