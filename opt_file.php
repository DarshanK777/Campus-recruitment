<?php
	session_start();
	$q = $_REQUEST['q'];
	$_SESSION['email']=$q;
	$hint="";
	$db = mysqli_connect('localhost','root','','campus');

	if($q !== ""){
		if (strpos($q,'@gmail.com')!==false){
			$sql="SELECT * FROM stud_data where email = '$q'";
			$result=mysqli_query($sql);

			if(mysqli_num_rows($result)>0){
				$msg = 'email already taken!'

				echo $msg;
			}
			else{
				$msg = "valid email";
				require_once 'OTP/mailS.php' 
			}
		}
	}
	echo $msg === "" ? "invalid email.":"";
?>

<script type="text/javascript">
	function showMsg(str){
		if(str_length==0){
			document.getElementById('msg').innerHTML ="";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById('msg').innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","opt_file.php?q"+str,true);
		}


	}

</script>