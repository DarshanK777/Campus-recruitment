<?php
include('server.php');
// session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campus";
$email=$_SESSION['cemailid'];
echo $email;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `company_data` where email = '$email'";

$result = mysqli_query($conn, $sql);
$res=mysqli_query($conn, $sql);

$ro = mysqli_fetch_assoc($res);
  if($ro['description'] === NULL){
    header('location: company_reg.php');
  }


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
 }       
 else{
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

<div class="row" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
  <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12"><h3 style="text-align:center;">Description</h3>
  <p><?php echo $row['description']; ?></p></div>
  <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12"> <img height="300px" width="300px" src="<?php echo $row['img_path'];?>"></div>
</div>

<div class="bgimg-2">
  <div class="caption">
    <span class="border">About the Job Profile</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">About the job</h3>
    <p><?php echo $row['abtj']; ?></p>
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
    <p><?php echo $row['req1']; ?></p>
    <p><?php echo $row['req2']; ?></p>
    <p><?php echo $row['req3']; ?></p>
    <p><?php echo $row['req4']; ?></p>
    <p><?php echo $row['req5']; ?></p>
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
    <p>Vacant Seats : <?php echo $row['web_vac']; ?> </p>
    <p>Expected Salary : <?php echo $row['web_sal']; ?> lakh/annum </p>
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
    <p>Vacant Seats : <?php echo $row['desi_vac']; ?> </p>
    <p>Expected Salary : <?php echo $row['desi_sal']; ?> lakh/annum </p>
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
    <p>Vacant Seats : <?php echo $row['dev_vac']; ?> </p>
    <p>Expected Salary : <?php echo $row['dev_sal']; ?> lakh/annum </p>
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
    <p>Vacant Seats : <?php echo $row['sf_vac']; ?> </p>
    <p>Expected Salary : <?php echo $row['sf_sal']; ?> lakh/annum </p>
  </div>
</div>

<div class="bgimg-8">
  <div class="caption">
    <span class="border">Apply for Company</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <span class="border"><a href=""><center><button class="btn btn-info btn-lg">Apply</button></center></a></span>
  </div>
</div>

</body>
</html>

