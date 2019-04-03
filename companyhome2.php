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
					$stmt = $conn->prepare("INSERT INTO companylogin (description,marketing,sales,technical) VALUES (?,?,?,?)");
					$stmt->bind_param("siii", $description, $marketing, $sales,$technical);
						$description = $_POST['description'];
					   	$marketing = $_POST['Marketingnumber'];
					    $sales = $_POST['Salesnumber'];
					    $technical = $_POST['Technicalnumber'];
					
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


?>