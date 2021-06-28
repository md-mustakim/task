	<div class="container mt-5">
		<div class="d-flex justify-content-between">
			<h2> <i class="fa fa-users"></i> User List</h2>
			<div>				
				<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#openRegisterForm">
					Add new User
				</button>
			</div>
		</div>
		<div id="users" class="container">
			Fetching data form database ...
		</div>
	</div>



		<!--Create User  Modal -->
		<div class="modal fade" id="openRegisterForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		    	<form id="addUserForm">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Add new User</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			        <div>
			        		<div id="message"></div>
			        		<ul id="errorList"></ul>
						<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Name:</strong>
									<input type="text" name="name" id="name" class="form-control">
									<span id="error_name"></span>
								</div>
							</div>

							
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Email:</strong>
									<input type="email" name="email" id="email" class="form-control">
									<span id="error_email"></span>
								</div>
							</div>

								
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Phone:</strong>
									<input type="text" name="phone" id="phone" class="form-control">
									<span id="error_phone"></span>
								</div>
							</div>


							
								
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Address:</strong>
									<textarea name="address" id="address" class="form-control" id="" cols="20" rows="5"></textarea>
									<span id="error_address" ></span>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 text-center">
									
							</div>
						</div>	
								

								
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" id="modalClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
			      </div>
			  </form>
		    </div>
		  </div>
		</div>








		<!--Show User Modal -->
		<div class="modal fade" id="openUserInfo" tabindex="-1" aria-labelledby="UserInfo" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		    	<form id="addUserForm">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">User Info</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body" id="modalBody">
			       
			      </div>
			      <div class="modal-footer">
			        <button type="button" id="modalClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        
			      </div>
			  </form>
		    </div>
		  </div>
		</div>






		<!--Update User Modal -->
		<div class="modal fade" id="updateUserInfo" tabindex="-1" aria-labelledby="UserInfo" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">		    	
			       	<form id="editUserForm">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Update User Info</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			        <div>
			        		<div id="message"></div>
			        		<ul id="errorList"></ul>
						<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Name:</strong>
									<input type="text" name="name" id="edit_name" class="form-control">
									<span id="error_name"></span>
								</div>
							</div>

							
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Email:</strong>
									<input type="email" name="email" id="edit_email" class="form-control">
									<span id="error_email"></span>
								</div>
							</div>

								
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Phone:</strong>
									<input type="text" name="phone" id="edit_phone" class="form-control">
									<span id="error_phone"></span>
								</div>
							</div>


							
								
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Address:</strong>
									<textarea name="address" id="edit_address" class="form-control" id="" cols="20" rows="5"></textarea>
									<span id="error_address" ></span>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 text-center">
									
							</div>
						</div>	
								

								
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" id="modalClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Update <i class="fa fa-save"></i></button>
			      </div>
			  </form>
		    </div>
		  </div>
		</div>
















	<script type="text/javascript">
		let base_url = '<?php echo base_url() ?>';
		
		$(document).ready(function(){
			let base_url = '<?php echo base_url() ?>';

			// fetch All data of users table
			function loadIndex(){
					$.ajax({
					url: base_url + 'ajaxController/showTable',
					method: 'GET',
					success: function(data){
						$("#users").html(data);
					}
				});
			}
			loadIndex();


			//Add New user via Bootstrap Modal

			$("#addUserForm").submit(function(event){
				event.preventDefault();

				document.getElementById("errorList").innerHTML = "";
				document.getElementById("message").innerHTML = "";

				let addUserData = {
					name: $("#name").val(),
					email: $("#email").val(),
					phone: $("#phone").val(),
					address: $("#address").val()
				};
				
				$.ajax({
					url: base_url + 'ajaxController/store',
					method: 'POST',
					data: addUserData,				
					success: function(response){
						 response = $.parseJSON(response);
					


						if(response.status)
						{
							$("#message").html(response.message);
							setTimeout(()=>{
								window.location.reload();
							}, 3000);

						}else{
							for(let item in response.errors){
 								let li = document.createElement("li");
							  	li.innerText = response.errors[item];
							  	document.getElementById("errorList").appendChild(li);
							}
						}
						
					}
				});



			});


		});

		function removeItem(id){				
				$.ajax({
				url: base_url + 'ajaxController/delete/'+id,
				method: 'GET',
				success: function (response){					
					window.location.reload();
				}
			});	
			

		}

		function show(id){		
			$.ajax({
				url: base_url + 'ajaxController/show/'+id,
				method: 'GET',
				success: function (response){
					
					$('#openUserInfo').modal('toggle');
					$("#modalBody").html(response);
				}
			});	
			

		}

		function edit(id){
			$.ajax({
				url: base_url + 'ajaxController/edit/'+id,
				method: 'GET',
				success: function (response){				
					 response = $.parseJSON(response);

					 $("#edit_name").val(response.name),
					 $("#edit_email").val(response.email),
					 $("#edit_phone").val(response.phone),
					 $("#edit_address").val(response.address)

				

					$('#updateUserInfo').modal('toggle');

					$("#editUserForm").submit(function(event){
							event.preventDefault();
							let addUserData = {
								name: $("#edit_name").val(),
								email: $("#edit_email").val(),
								phone: $("#edit_phone").val(),
								address: $("#edit_address").val()
							};

								$.ajax({
									url: base_url + 'ajaxController/update/'+id,
									method: 'POST',
									data: addUserData,	
									success: function(response){
										console.log(response);
										response = $.parseJSON(response);

										if(response.status)
										{
											$("#message").html(response.message);
											setTimeout(()=>{
												window.location.reload();
											}, 3000);

										}else{
											for(let item in response.errors){
				 								let li = document.createElement("li");
											  	li.innerText = response.errors[item];
											  	document.getElementById("errorList").appendChild(li);
											}
										}
									}
								});

					});					
				}
			});	
		}
	</script>

