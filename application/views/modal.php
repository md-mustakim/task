<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" integrity="sha512-egJ/Y+22P9NQ9aIyVCh0VCOsfydyn8eNmqBy+y2CnJG+fpRIxXMS6jbWP8tVKp0jp+NO5n8WtMUAnNnGoJKi4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
</head>
<body>
	<form id="form">
		<input type="text" name="name" id="name" autofocus>
		<button type="submit">submit</button>		
	</form>
	<div class="" id="data">

	</div>

	<script src="<?php echo base_url();?>/assets/js/all.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script>
		
			$(document).ready(function(){
				$("form").submit(function(e){
					e.preventDefault();

					let name = $("#name").val();
					let base_url = '<?php echo base_url(); ?>';
					let post_url = base_url + 'ajax';


					$.ajax({
						method: 'GET',
						url: post_url,		
						success: function(success){					
							document.getElementById("data").innerHTML = success;
						},
								
					});			
				});
			});
		
	</script>
</body>
</html>
