<?php

	session_start();

	$errors=null;


// connect to database
	$db=mysqli_connect('localhost','root','','campus');
	// $mysqli = new mysqli("localhost", "root", "", "campus");

	 // if the registration button is clicked for user
	if (isset($_POST['st_register'])) 
	{
		
		$firstname= mysqli_real_escape_string($db,$_POST['Firstname']);
		$lastname= mysqli_real_escape_string($db,$_POST['Lastname']);
		$phoneno= mysqli_real_escape_string($db,$_POST['Phone']);
		$emailid= mysqli_real_escape_string($db,$_POST['Email']);
		$gender= mysqli_real_escape_string($db,$_POST['Gender']);
		$password= mysqli_real_escape_string($db,$_POST['Password']);
		
		
		// ensure that form fields are filled properly
		if(empty($firstname))
		{
			array_push($errors,"Username is required");
		}

		if(empty($lastname))
		{
			array_push($errors,"Lastname is required");
		}

		if(empty($phoneno))
		{
			array_push($errors,"Phone No. is required");
		}

		if(empty($emailid))
		{
			array_push($errors,"Email ID is required");
		}

		if(empty($gender))
		{
			array_push($errors,"Gender is required");
		}

		if(empty($password))
		{
			array_push($errors,"Password is required");
		}

		// if($password != $cpassword)
		// {
		// 	array_push($errors,"The two password do not match");
		// }

		// if there are no error save to database
		if(count($errors) == 0) 
		{
			$password=md5($password); //encrypt password before store in database
			$sql="INSERT INTO `stud_data` (fname,lname,phoneno,email,password,gender) VALUES('$firstname','$lastname','$phoneno','$emailid','$password','$gender')";
			mysqli_query($db,$sql);
			$sql="INSERT INTO `student_data` (email) VALUES('$emailid')";
			mysqli_query($db,$sql);

			$_SESSION['emailid'] = $emailid;
			echo "<script>
		      alert('You are logged in.');
		      window.location.href='stu_dummy.php';
		      </script>";  
			$_SESSION['success'] = "You are now logged in";
			header('location: stu_dummy.php'); //redirect to home page
			
		}	
	}


	if (isset($_POST['co_register'])) 
	{
		
		$companyname= mysqli_real_escape_string($db,$_POST['companyname']);
		$phoneno= mysqli_real_escape_string($db,$_POST['Phone']);
		$emailid= mysqli_real_escape_string($db,$_POST['Email']);
		$password= mysqli_real_escape_string($db,$_POST['Password']);
		
		
		// ensure that form fields are filled properly

		if(empty($phoneno))
		{
			array_push($errors,"Phone No. is required");
		}

		if(empty($emailid))
		{
			array_push($errors,"Email ID is required");
		}


		if(empty($password))
		{
			array_push($errors,"Password is required");
		}

		

		// if there are no error save to database
		if(count($errors) == 0) 
		{
			$password=md5($password); //encrypt password before store in database
			$sql="INSERT INTO `comp_data` (cname,phoneno,email, password) VALUES('$companyname','$phoneno','$emailid','$password')";
			mysqli_query($db,$sql);
			$sql="INSERT INTO `company_data` (email) VALUES('$emailid')";
			mysqli_query($db,$sql);
			echo $sql;
			$_SESSION['cemailid'] = $emailid;
			echo "<script>
		      alert('You are logged in.');
		      window.location.href='company_reg.php';
		      </script>"; 
			//header('location: student.php'); //redirect to home page
			
		}	
	}


	// if the registration button is clicked for admin
	if (isset($_POST['ad_register'])) 
	{
		$emailida= mysqli_real_escape_string($db,$_POST['emailida']);
		$passworda= mysqli_real_escape_string($db,$_POST['passworda']);
		// $cpassworda= mysqli_real_escape_string($db,$_POST['cpassworda']);


		// $username=$firstname." ".$middlename." ".$lastname;
		
		// ensure that form fields are filled properly
		

		if(empty($emailida))
		{
			array_push($errors,"Email ID is required");
		}

		if(empty($passworda))
		{
			array_push($errors,"Password is required");
		}

		// if there are no error save to database

		if(count($errors) == 0) 
		{

			$passworda=md5($cpassworda); //encrypt password before store in database
			$sql="INSERT INTO `admin` (email,password) VALUES ('$emailida','$passworda')";
			mysqli_query($db,$sql);

			$_SESSION['emailida'] = $emailida;
			
			 echo "<script>
      alert('You are logged in.');
      window.location.href='homeadmin.php';
      </script>";  

			

			//header('location: homeadmin.php'); //redirect to home page
			
		}	
	}

	// log user in from login page
	if (isset($_POST['loginadmin']))
	{
		$emailid = mysqli_real_escape_string($db,$_POST['emailid']);	
		$password = mysqli_real_escape_string($db,$_POST['password']);



		// ensure that form fields are filled properly
		if (empty($emailid)) 
		{
				array_push($errors,"Emailid is required");
		}

		if (empty($password)) 
		{
				array_push($errors,"Password is required");
		}

		if (count($errors)==0) 
		{
			$password=md5($password); //encrypt password before comparing with other
		
			$query="SELECT * FROM stud_data WHERE email='$emailid' AND password='$password'";

			$result=mysqli_query($db,$query);

			
			if (mysqli_num_rows($result)==1)
			{
				// log user in 
				
				$_SESSION['emailid']=$emailid;
				$_SESSION['success']="You are now logged in";
				echo "<script>
			      alert('You are logged in.');
			      window.location.href='homeadmin.php';
			      </script>"; 
				// header('location: admin.php'); //redirect to home page
			}
			else {
				array_push($errors, "wrong username/password combination");
				header('location: adminlogin.php');
			}
		}

	}

	if (isset($_POST['loginstud']))
	{
		$emailid = mysqli_real_escape_string($db,$_POST['emailid']);	
		$password = mysqli_real_escape_string($db,$_POST['password']);



		// ensure that form fields are filled properly
		if (empty($emailid)) 
		{
				array_push($errors,"Emailid is required");
		}

		if (empty($password)) 
		{
				array_push($errors,"Password is required");
		}

		if (count($errors)==0) 
		{
			$password=md5($password); //encrypt password before comparing with other
		
			$query="SELECT * FROM stud_data WHERE email='$emailid' AND password='$password'";

			$result=mysqli_query($db,$query);

			
			if (mysqli_num_rows($result)==1)
			{
				// log user in 
				
				$_SESSION['emailid']=$emailid;
				$_SESSION['success']="You are now logged in";
				
				header('location: stu_dummy.php'); //redirect to home page
			}
			else {
				array_push($errors, "wrong username/password combination");
				header('location: loginstud.php');
			}
		}

	}

	if (isset($_POST['logincomp']))
	{
		$emailid = mysqli_real_escape_string($db,$_POST['emailid']);	
		$password = mysqli_real_escape_string($db,$_POST['password']);



		// ensure that form fields are filled properly
		if (empty($emailid)) 
		{
				array_push($errors,"Emailid is required");
		}

		if (empty($password)) 
		{
				array_push($errors,"Password is required");
		}

		if (count($errors)==0) 
		{
			$password=md5($password); //encrypt password before comparing with other
		
			$query="SELECT * FROM comp_data WHERE email='$emailid' AND password='$password'";

			$result=mysqli_query($db,$query);

			
			if (mysqli_num_rows($result)==1)
			{
				// log user in 
				
				$_SESSION['cemailid']=$emailid;
				$_SESSION['success']="You are now logged in";
				echo '<script language="javascript">';
				echo 'alert("Logged in successfully")';
				echo '</script>';
				header('location: company.php'); //redirect to home page
			}
			else {
				echo '<script language="javascript">';
				echo 'alert("wrong username/password combination")';
				echo '</script>';
				array_push($errors, "wrong username/password combination");
				header('location: logincomp.php');
			}
		}

	}

	

	if(isset($_POST['sv_stud']))
	{
		$filetmp = $_FILES["file"]["tmp_name"];
		$filename = $email.'.jpg';
		$filepath = "photo/".$filename;
		move_uploaded_file($filetmp, $filepath);


		$email=$_SESSION['emailid'];

		$description= mysqli_real_escape_string($db,$_POST['description']);
		$ssc= mysqli_real_escape_string($db,$_POST['ssc']);
		$hsc= mysqli_real_escape_string($db,$_POST['hsc']);
		$sem1= mysqli_real_escape_string($db,$_POST['sem1']);
		$sem2= mysqli_real_escape_string($db,$_POST['sem2']);
		$sem3= mysqli_real_escape_string($db,$_POST['sem3']);
		$sem4= mysqli_real_escape_string($db,$_POST['sem4']);
		$sem5= mysqli_real_escape_string($db,$_POST['sem5']);
		$sem6= mysqli_real_escape_string($db,$_POST['sem6']);
		$sem7= mysqli_real_escape_string($db,$_POST['sem7']);
		$sem8= mysqli_real_escape_string($db,$_POST['sem8']);
		$work1= mysqli_real_escape_string($db,$_POST['work1']);
		$work2= mysqli_real_escape_string($db,$_POST['work2']);
		$work3= mysqli_real_escape_string($db,$_POST['work3']);
		$work4= mysqli_real_escape_string($db,$_POST['work4']);
		$work5= mysqli_real_escape_string($db,$_POST['work5']);
		$inta1= mysqli_real_escape_string($db,$_POST['inta1']);
		$inta2= mysqli_real_escape_string($db,$_POST['inta2']);
		$inta3= mysqli_real_escape_string($db,$_POST['inta3']);
		$inta4= mysqli_real_escape_string($db,$_POST['inta4']);
		$inta5= mysqli_real_escape_string($db,$_POST['inta5']);
		
		
		

		echo $description;
		// exit;
		// ensure that form fields are filled properly
		
		if(empty($description))
		{
			array_push($errors,"description is required");
		}

		if(empty($ssc))
		{
			array_push($errors,"ssc is required");
		}

		if(empty($hsc))
		{
			array_push($errors,"HSC is required");
		}

		if(empty($sem1))
		{
			array_push($errors,"1 is required");
		}

		if(empty($sem2))
		{
			array_push($errors,"sem2 is required");
		}

		if(empty($sem3))
		{
			array_push($errors,"sem3 is required");
		}

		
		if(empty($sem5))
		{
			array_push($errors,"sem2 is required");
		}

		if(empty($sem6))
		{
			array_push($errors,"sem3 is required");
		}

		
		if(empty($sem8))
		{
			array_push($errors,"sem2 is required");
		}

		


		// if there are no error save to database
		if (count($errors)==0) {
			// $sem3=md5($csem3); //encrypt sem3 before store in database
			
	
			// $sql = "INSERT INTO upload_img (img_name,img_path,img_type) VALUES ('$filename','$filepath','$filetype')";
			// $result = mysqli_query($db,$sql);
			// $sql="UPDATE INTO student_data ( description, ssc, hsc, sem1, sem2, sem3, sem4, sem5, sem6, sem7, sem8, work1, work2, work3, work4, work5, inta1, inta2, inta3, inta4, inta5) VALUES ('$description','$ssc','$hsc','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6','$sem7','$sem8','$work1','$work2','$work3','$work4','$work5','$int1','$int2','$int3','$int4','$int5') WHERE email = '$email'";

			$sql="UPDATE `student_data` SET `description` = '$description', `ssc` = '$ssc', `hsc` = '$hsc', `sem1` = '$sem1', `sem2` = '$sem2', `sem3` = '$sem3', `sem4` = '$sem4', `sem5` = '$sem5', `sem6` = '$sem6', `sem7` = '$sem7', `sem8` = '$sem8', `work1` = '$work1', `work2` = '$work2', `work3` = '$work3', `work4` = '$work4', `work5` = '$work5', `inta1` = '$inta1', `inta2` = '$inta2', `inta3` = '$inta3', `inta4` = '$inta4', `inta5` = 'inta5',`img_path`='$filepath' WHERE `email` = '$email'";
			mysqli_query($db,$sql);

			

			
			
			$_SESSION['username'] = $email;
			echo "<script>
		      alert('You are logged in.');
		      window.location.href='stu_dummy.php';
		      </script>";  
			header('location: stu_dummy.php'); //redirect to home page
			
		}	


	}

	if(isset($_POST['contactus'])){
		$cname=mysql_real_escape_string($db,$_POST['cname']);
		$cmail=mysqli_real_escape_string($db,$_POST['cmail']);
		$cmessage=mysqli_real_escape_string($db,$_POST['cmessage']);

		if(empty($cmail))
		{
			array_push($errors,"name is required");
		}

		if(empty($cmail))
		{
			array_push($errors,"email is required");
		}

		if(empty($cmessage))
		{
			array_push($errors,"message is required");
		}

		if(count($errors) == 0) 
		{
			// $sem3=md5($csem3); //encrypt sem3 before store in database
			
	
			$sql = "INSERT INTO `contactus` (`cname`,`cmail`,`cmessage`) VALUES ('$cname','$cmail','$cmessage')";
			$result = mysqli_query($db,$sql);
			

		}		

	}



	if(isset($_POST['sv_company'])){
		$email=$_SESSION['cemailid'];
		$filetmp = $_FILES["file"]["tmp_name"];
		$filename = $email.'.jpg';
		$filepath = "photo/".$filename;
		move_uploaded_file($filetmp, $filepath);

		$email=$_SESSION['cemailid'];
		$description= mysqli_real_escape_string($db,$_POST['description']);
		$abtj= mysqli_real_escape_string($db,$_POST['abtj']);
		$req1= mysqli_real_escape_string($db,$_POST['req1']);
		$req2= mysqli_real_escape_string($db,$_POST['req2']);
		$req3= mysqli_real_escape_string($db,$_POST['req3']);
		$req4= mysqli_real_escape_string($db,$_POST['req4']);
		$req5= mysqli_real_escape_string($db,$_POST['req5']);
		$web_vac= mysqli_real_escape_string($db,$_POST['web_vac']);
		$web_sal= mysqli_real_escape_string($db,$_POST['web_sal']);
		$desi_vac= mysqli_real_escape_string($db,$_POST['desi_vac']);
		$desi_sal= mysqli_real_escape_string($db,$_POST['desi_sal']);
		$dev_vac= mysqli_real_escape_string($db,$_POST['dev_vac']);
		$dev_sal= mysqli_real_escape_string($db,$_POST['dev_sal']);
		$sf_vac= mysqli_real_escape_string($db,$_POST['sf_vac']);
		$sf_sal= mysqli_real_escape_string($db,$_POST['sf_sal']);
		
		



		// if there are no error save to database
		if(count($errors) == 0) 
		{
			// $sem3=md5($csem3); //encrypt sem3 before store in database
			
			// $sql="UPDATE INTO student_data ( description, ssc, hsc, sem1, sem2, sem3, sem4, sem5, sem6, sem7, sem8, work1, work2, work3, work4, work5, inta1, inta2, inta3, inta4, inta5) VALUES ('$description','$ssc','$hsc','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6','$sem7','$sem8','$work1','$work2','$work3','$work4','$work5','$int1','$int2','$int3','$int4','$int5') WHERE email = '$email'";

			$sql="UPDATE `company_data` SET `description` = '$description', `abtj` = '$abtj', `req1` = '$req1', `req2` = '$req2', `req3` = '$req3', `req4` = '$req4', `req5` = '$req5', `web_vac` = '$web_vac', `web_sal` = '$web_sal', `desi_vac` = 'desi_vac', `desi_sal` = '$desi_sal', `dev_vac` = '$dev_vac', `dev_sal` = '$dev_sal', `sf_vac` = '$sf_vac', `sf_sal` = '$sf_sal',`img_path`='$filepath' WHERE `email` = '$email'";
			mysqli_query($db,$sql);
			// $mysqli->query($sql);
			echo $sql;
			echo $email."panda";
			
			
			echo "<script>
		      alert('You are logged in.');
		      window.location.href='company.php';
		      </script>";
			// header('location: company.php'); //redirect to home page
			
		}	
		
	}


	//logout for user
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['emailid']);
		header('location: login.php');
	}

	//logout for admin
	if(isset($_GET['logoutadmin'])){
		session_destroy();
		unset($_SESSION['emailida']);
		header('location: loginadmin.php');
	}



					// function test_input($data) {
					//   $data = trim($data);
					//   $data = stripslashes($data);  
					//   $data = htmlspecialchars($data);  
					//   return $data; 
					// }


					// // $emailErr = $messageErr."";
					// // $email = $message."";
					//  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
					// 	if (empty($_POST["email"])) {
					// 	 	$emailErr = "Email is required";  
					// 	} else {
					//  		$email = test_input($_POST["email"]);  
					// 	}
						
					// 	if (empty($_POST["message"])) {
					// 	 	$messageErr = "Email is required";  
					// 	} else {
					//  		$message = test_input($_POST["message"]);  
					// 	}
					// }				 
?>