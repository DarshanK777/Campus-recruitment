<?php
include('server.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campus";
$email=$_SESSION['cemailid'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `company_data` where email = '$email'";
$result = mysqli_query($conn, $sql);
echo $email;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result); 
        
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body, html {
  height: 100%;
  margin: 0;
  font: 400 15px/1.8 "Lato", sans-serif;
  color: #777;
}

.bgimg-1, .bgimg-2, .bgimg-3, .bgimg-4, .bgimg-5, .bgimg-6, .bgimg-7, .bgimg-8 {
  position: relative;
  opacity: 0.65;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("c1.jpg");
  min-height: 100%;
}

.bgimg-2 {
  background-image: url("c2.jpg");
  min-height: 400px;
}

.bgimg-3 {
  background-image: url("c3.jpg");
  min-height: 400px;
}

.bgimg-4 {
  background-image: url("c4.png");
  min-height: 60%;
}

.bgimg-5 {
  background-image: url("c5.jpg");
  min-height: 60%;
}

.bgimg-6 {
  background-image: url("c6.jpg");
  min-height: 60%;
}

.bgimg-7 {
  background-image: url("c7.png");
  min-height: 60%;
}

.bgimg-8 {
  background-image: url("c8.jpg");
  min-height: 100%;
}

.caption {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: #000;
}

.caption span.border {
  background-color: #111;
  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
}

h3 {
  letter-spacing: 5px;
  text-transform: uppercase;
  font: 20px "Lato", sans-serif;
  color: #111;
}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3, .bgimg-4, .bgimg-5, .bgimg-6, .bgimg-7, .bgimg-8 {
        background-attachment: scroll;
    }
}
</style>
</head>
<body>

<div class="bgimg-1">
  <div class="caption">
    <span class="border">WELCOME</span>
  </div>
</div>
<form method="post" action="server.php" enctype="multipart/form-data">
<div class="row" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
  <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12"><h3 style="text-align:center;">Description</h3>
  <textarea name="description" style="height:170px;width:610px;" placeholder="Enter here..." ><?php echo $row['description'];   ?></textarea></div>
  <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12"> <input type="file" name="file" accept="image/*" style="margin-top:85px;margin-left:300px"></div>
</div>

<div class="bgimg-2">
  <div class="caption">
    <span class="border">About the Job Profile</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">About the job</h3>
   <textarea name="abtj" style="height:50px;width: 100%;color:black" placeholder="Enter here..." value="<?php echo $row['abtj']; ?>"></textarea>
  </div>
</div>

<div class="bgimg-3">
  <div class="caption">
    <span class="border">Requirements</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">Basic Requirements</h3>
    <input type="text" name="req1" style="height:30px;width:50%;margin-top:5px;color:black" placeholder="Enter here..." value="<?php echo $row['req1']; ?>">
    <input type="text" name="req2" style="height:30px;width:50%;margin-top:5px;color:black" placeholder="Enter here..." value="<?php echo $row['req2']; ?>">
    <input type="text" name="req3" style="height:30px;width:50%;margin-top:5px;color:black" placeholder="Enter here..." value="<?php echo $row['req3']; ?>">
    <input type="text" name="req4" style="height:30px;width:50%;margin-top:5px;color:black" placeholder="Enter here..." value="<?php echo $row['req4']; ?>">
    <input type="text" name="req5" style="height:30px;width:50%;margin-top:5px;color:black" placeholder="Enter here..." value="<?php echo $row['req5']; ?>">
  </div>
</div>

<div class="bgimg-4">
  <div class="caption">
    <span class="border">Ui/Ux Designer</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">Web</h3>
    <p>Vacant Seats : <input type="text" name="web_vac" style="height:25px;width:10%;margin-top:5px;color:black" placeholder="Enter here..." value="<?php echo $row['web_vac']; ?>"></p>
    <p>Expected Salary : <input type="text" name="web_sal" style="height:25px;width:10%;margin-top:5px;color:black" placeholder="Enter here..." value="<?php echo $row['web_sal']; ?>"></p>
  </div>
</div>

<div class="bgimg-5">
  <div class="caption">
    <span class="border">Android Developer</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">Developer</h3>
    <p>Vacant Seats : <input type="text" name="desi_vac" style="height:25px;width:10%;margin-top:5px;color:black" placeholder="Enter here..."  value="<?php echo $row['desi_vac']; ?>"></p>
    <p>Expected Salary : <input type="text" name="desi_sal" style="height:25px;width:10%;margin-top:5px;color:black" placeholder="Enter here..." value="<?php echo $row['desi_sal']; ?>"> </p>
  </div>
</div>

<div class="bgimg-6">
  <div class="caption">
    <span class="border">Database Administrator</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">Administrator</h3>
    <p>Vacant Seats : <input type="text" name="dev_vac" style="height:25px;width:10%;margin-top:5px;color:black" placeholder="Enter here..."  value="<?php echo $row['dev_vac']; ?>"></p>
    <p>Expected Salary : <input type="text" name="dev_sal" style="height:25px;width:10%;margin-top:5px;color:black" placeholder="Enter here..."  value="<?php echo $row['dev_sal']; ?>"> </p>
  </div>
</div>

<div class="bgimg-7">
  <div class="caption">
    <span class="border">Software Engineer</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">Software</h3>
    <p>Vacant Seats : <input type="text" name="sf_vac" style="height:25px;width:10%;margin-top:5px;color:black" placeholder="Enter here..."  value="<?php echo $row['sf_vac']; ?>"> </p>
    <p>Expected Salary : <input type="text" name="sf_sal" style="height:25px;width:10%;margin-top:5px;color:black" placeholder="Enter here..."  value="<?php echo $row['sf_sal']; ?>"> </p>
  </div>
</div>

<div class="bgimg-8">
  <div class="caption">
    <span class="border">click below to save your profile</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <span class="border"><a href=""><center><button name="sv_company" class="btn btn-info btn-lg">save your profile</button></center></a></span>
  </div>
</div>
</form>
</body>
</html>

