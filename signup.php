<?php
		
		if(isset($_POST['submit']))
		  {
		  
		    $conn = mysqli_connect('localhost','root','','intpproj');

		    if(!$conn)
		    {
		      echo "<script> window.alert('Connection Failed :'); </script>";
		    }
		  	else
		  	{
		  		
		  		// prepare and bind
					$stmt = $conn->prepare("INSERT INTO companylogin (Cname,email,password,confirm_password,logo) VALUES (?,?,?,?,?)");
					$stmt->bind_param("sssss", $cname, $email, $password,$confirmpassword,$logo);
						$cname = $_POST['cname'];
					   	$email = $_POST['email'];
					    $password = $_POST['password1'];
					    $confirmpassword = $_POST['password2'];
					    $logo = $_POST['logo'];
						$stmt->execute();

			   
					    

					    if($stmt)
					    {
					      echo "<script> window.alert('Login Successfull :'); </script>"; 


					      header('Location: index.php'); 
					    }
					    else
					    {
					     echo "<script> window.alert('Invalid Username and Password'); </script>"; 
					    }	

					    $stmt->close();
					    $conn->close();
		  	}

		    
		  }


?>