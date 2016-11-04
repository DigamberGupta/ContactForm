<?php 
  $error ="";
  $successMessage ="";

	 if($_POST) { 

		  if(!$_POST["email"]){

		  	$error .= "An email address is empty<br>";

		  }
		  if(!$_POST["subject"]){

		  	$error .= "The subject is empty<br>";
		  	
		  }

		  if(!$_POST["content"]){

		  	$error .= "your content is empty<br>";
		  	
		  }
		  if ($_POST["email"] && filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) === false){
		        $error .="Invalid email address";
		  } 
		  if ($error !=""){

		  	 $error ='<div class="alert alert-danger" role="alert"><strong>There were some errors in this form :<br></strong> '. $error .'</div>';
		  }else {

			  	$emailTo = "lokesh.jadhav10@gmail.com";
				$subject = $_POST["subject"];
				$body    =$_POST["content"];
				$headers = "From : ".$_POST["email"];

					if(mail($emailTo, $subject, $body, $headers)){

						$successMessage .= '<div class="alert alert-success" role="alert"><strong>The email has succesfully send to :<br></strong> '.$_POST["email"] .'</div>';
					}
					else {
						 $error ='<div class="alert alert-danger" role="alert"><strong>There were some errors in this form :<br></strong> '. $error .'</div>';
					}







		  }
	   
	 }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  </head>
  <body>
    

<form method="POST">
		 <div class="container">

			  <h1>Get in Touch</h1>
			  <div class="error" ><?php echo $error.$successMessage; ?></div>

		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter youe email address" name="email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="subject">Subject</label>
		    <input type="text" class="form-control" id="subject" name="subject">
		  </div>
		  
		  <div class="form-group">
		    <label for="content">what would you like to ask us? </label>
		    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
		  </div>

		  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
		</form>

	 </div>

	 	
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

 	<script type="text/javascript">

	 		 $("form").submit(function(e){
       				// e.preventDefault(); This methode has a problem of double click hence use return true and return false

       				var error="";

       				if($("#email").val() ==""){

			 			error +="The email is empty<br>";
			 		}

			 		if($("#subject").val() ==""){

			 			error +="The subject is empty<br>";
			 		}
			 		 if($("#content").val() ==""){

	 		 			error +="The content is empty";

	 				 }

			 		if(error !=""){
			 			$(".error").html('<div class="alert alert-danger" role="alert"><strong>There were some errors in this form :<br></strong> '+ error +'</div>' );
			 			return false;
			 		}else{
			 			// $("form").unbind("submit").submit();
			 			return true;
			 		}


   				 });
	 			

	 		

	 	</script>


  </body>
</html>