<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Task</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css">
	
	
</head>
<body>
	<div class="d-flex justify-content-center align-item-center" style="height: 100vh;">
		<div class="my-3">
			<div class="card" style="width: 50vw;">
				<div class="card-header">
					<div class="d-flex justify-content-between">
						<div class="">Edit <strong><?php echo $user->name."'s information";?></strong></div>
						<a href="<?php echo base_url(). 'userController';?>" class="">
							<i class="fa fa-list"></i>
						</a>
					</div>
				</div>
				<div class="card-body">

					<form method="post" action="<?php echo base_url('userController/update/'.$user->id)?>">
						<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Name:</strong>
									<input type="text" name="name" class="form-control" value="<?php echo $user->name?>">
									<?php
									if (isset($this->session->flashdata('errors')['name'])){
										echo '<div class="alert alert-danger mt-2">';
										echo $this->session->flashdata('errors')['name'];
										echo "</div>";
									}
									?>
								</div>
							</div>

							
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Email:</strong>
									<input type="email" name="email" class="form-control" value="<?php echo $user->email?>">
									<?php
									if (isset($this->session->flashdata('errors')['email'])){
										echo '<div class="alert alert-danger mt-2">';
										echo $this->session->flashdata('errors')['email'];
										echo "</div>";
									}
									?>
								</div>
							</div>

								
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Phone:</strong>
									<input type="text" name="phone" class="form-control" value="<?php echo $user->phone?>">
									<?php
									if (isset($this->session->flashdata('errors')['phone'])){
										echo '<div class="alert alert-danger mt-2">';
										echo $this->session->flashdata('errors')['phone'];
										echo "</div>";
									}
									?>
								</div>
							</div>


							
								
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Address:</strong>
									<textarea name="address" class="form-control" id="" cols="30" rows="10"><?php echo $user->address?></textarea>
									<?php
									if (isset($this->session->flashdata('errors')['address'])){
										echo '<div class="alert alert-danger mt-2">';
										echo $this->session->flashdata('errors')['address'];
										echo "</div>";
									}
									?>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 text-center">
									<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
					<?php $this->session->unset_userdata('errors'); ?>

				</div>
			</div>
		</div>
	</div>
</body>
</html>
