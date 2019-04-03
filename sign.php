

<!doctype html>
<html>
<meta charset="utf-8">
<head>
	<title> SignUp </title>
	<style>

	body
	{
		background: url('background.jpg');
		background-size : cover;
	}


	input[type=text], input[type=password], input[type=email]
	{
		border : 0 ;
		border-radius: 25px;
		height: 25px;
	
		padding: 8px;
		font-size: 20px;
		color : DodgerBlue;
	}

	input[type=text]:focus, input[type=password]:focus, input[type=email]:focus
	{
		outline: none;
		border-radius: 25px;
		box-shadow:0 0 20px white;
		border-color: red;
	}

	input[type=submit]
	{
		font-size: 20px ;
		color: white;
		background : 0;
		width: 400px;
		height: 50px;
		border: 1 solid;
 		box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
		outline: 1px solid;
  		outline-color: rgba(255, 255, 255, .5);
		outline-offset: 0px;
 		text-shadow: none;
		transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
	}

	input[type=submit]:hover
	{
		border: 2px solid;
		border-radius: 25px;
  		box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
  		outline-color: rgba(255, 255, 255, 0);
  		outline-offset: 15px;
  		text-shadow: 1px 1px 2px #427388; 
	}


	td
	{
		color : white;
		font-size: 25px;
		margin-top:10px;
	
	}

	h1
	{
		color : white;
		font-family: 'Serif';
		font-style: oblique;
		font-size: 35px;
		text-shadow: 1px 1px 2px #427388;
	}

	.SignUp
	{
		padding-top: 70px;
		right : 200px;
		position: absolute;
	}

	.buttons
	{
		padding : 5px;
	}

	</style>
</head>
<body>
	<form action="sign.php" method="POST" enctype= multipart/form-data>
		<div class="SignUp">
			<table>
			<thead>
				<tr>
					<td colspan="2" style="text-align:center;"><h1>Create a New Account</h1></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label for="fname">Company Name :</label>
					</td>
					<td>
						<input type="text" name="cname" required="required" id="fname" >
					</td>
				</tr>
			
				<tr>
					<td >
						<label for="email">Email: </label>
					</td>
					<td>
						<input type="email" name="email" required="required" id="email" >
					</td>
				</tr>
				<tr>
					<td>
						<label for="password">Password: </label>
					</td>
					<td>
						<input type="password" name="password1" required="required" id="password">
					</td>
				</tr>
				<tr>
					<td>
						<label for="password2">Confirm-Password: </label>
					</td>
					<td>
						<input type="password" name="password2" required="required" id="password2">

					</td>
					
				</tr>
				<tr>
					<td><label for="file">Logo</label></td>
					<td><input type="file" name="file"></td>
					
				</tr>
				<tr>
					<td colspan="2">
						<input type="checkbox" name="checkbox" required="required" id="checkbox" value="True"><label for="checkbox">I accept all the terms and condition</label>
					</td>
				
				</tr>
				
			</tbody>
		</table>
			<br>
			<div class="buttons" align="center">
				<input type="submit" value="SignUp" name="submit">
			</div>

		</div>
	</form>
</body>
</html>

<?php include 'signup.php'; ?>
