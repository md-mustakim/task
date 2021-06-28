<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User List</title>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/js/bootstrap.bundle.min.js">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
	
</head>
<body>
	<div class="container">

	<div class="">


			<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
	Launch demo modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add new User</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form onsubmit="postData" id="modalForm">
						<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Name:</strong>
									<input type="text" name="name" class="form-control">
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
									<input type="email" name="email" class="form-control">
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
									<input type="text" name="phone" class="form-control">
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
									<textarea name="address" class="form-control" id="" cols="30" rows="10"></textarea>
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
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		</div>
		</div>
	</div>
	</div>	






	</div>
		
		<div class="d-flex justify-content-between my-3">
			<div class="h2"><i class="fa fa-users"></i> User List</div>
			<div class="">
				<a href="<?php echo base_url('userController/create')?>" class="btn btn-primary">
					<i class="fa fa-plus"></i>
				</a>			
			</div>
		</div>
		<div class="mx-auto">
			<table class="table table-sm">
			<thead class="thead-light">
				<tr>
					<td>Id</td>
					<td>Name</td>
					<td>Email</td>
					<td>Phone</td>
					<td>Address</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user){ ?>
				<tr>	
					<td><?php echo $user->id; ?></td>
					<td>
						<a href="userController/show/<?php echo $user->id; ?>" class="text-decoration-done">
							<?php echo $user->name; ?>
						</a>
					</td>
					<td><?php echo $user->email; ?></td>
					<td><?php echo $user->phone; ?></td>
					<td><?php echo $user->address; ?></td>		
					<td> 
						<a href="<?php echo base_url('userController/edit/'. $user->id)?>" class="text-decoration-none">Edit</a> 
						
						<button class="btn btn-danger" onclick="removeItem()"><i class="fa fa-trash"></i></button>
						<form id="submit" method="DELETE" class="d-none" action="<?php echo base_url('userController/delete/'.$user->id);?>">
							
						</form>
					</td>		
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	
	</div>
	<script>
		
	</script>

	<script>
		function removeItem(){
			if(confirm("Are you Sure"))
			{
				document.getElementById("submit").submit();
			}
		}

		function postData(event){
			$("#modalForm").submit(function(e) {
				e.preventDefault();
			});

			event.preventDefault();
			let name = $("$name").val();
			let email = $("$email").val();
			let phone = $("$phone").val();
			let address = $("$address").val();
			let data = [
				name,
				email,
				phone,
				address
			];
			console.log(data);
		}




	</script>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
