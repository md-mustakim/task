<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Task</title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
	
</head>
<body>
	<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
		<div class="">
		<div class="card shadow" style="width: 50vw;">
			<div class="card-header">
				<div class="d-flex justify-content-between align-items-center">
					User Information
					<a href="<?php echo base_url().'userController'?>" class="">
						<i class="fa fa-list"></i>
					</a>
				</div>
			</div>
			<div class="card-body">					
				<h2> 
					<i class="fa fa-user"></i> 
					Information of <strong> <?php echo $user->name?></strong>
				</h2>
				<table class="table table-sm">
					<tbody>
						<tr>
							<td>Name</td>
							<td><?php echo $user->name; ?></td>
						</tr>

						
						<tr>
							<td>Email</td>
							<td><?php echo $user->email; ?></td>
						</tr>

						
						<tr>
							<td>Phone</td>
							<td><?php echo $user->phone; ?></td>
						</tr>

						
						<tr>
							<td>Address</td>
							<td><?php echo $user->address; ?></td>
						</tr>
					
					</tbody>

				</table>
			</div>
			
		</div>
	</div>
</body>
</html>
