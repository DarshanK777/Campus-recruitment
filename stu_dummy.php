<?php
include('server.php');
// session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campus";
$email=$_SESSION['emailid'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `student_data` where email = '$email'";

$result = mysqli_query($conn, $sql);
$res=mysqli_query($conn, $sql);

$ro = mysqli_fetch_assoc($res);
  if($ro['description'] === NULL){
    header('location: st_reg.php');
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

.bgimg-1, .bgimg-2, .bgimg-3, .bgimg-4, .bgimg-5 {
  position: relative;
  opacity: 0.65;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("img1.jpg");
  min-height: 100%;
}

.bgimg-2 {
  background-image: url("img2.jpg");
  min-height: 400px;
}

.bgimg-3 {
  background-image: url("img3.jpg");
  min-height: 400px;
}

.bgimg-4 {
  background-image: url("img4.jpg");
  min-height: 100%;
}

.bgimg-5 {
  background-image: url("img5.jpg");
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
    .bgimg-1, .bgimg-2, .bgimg-3, .bgimg-4, .bgimg-5 {
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
    <span class="border">QUALIFICATIONS</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">HSC & SSC Marks</h3>
    <p>Marks obtained in 10th = <?php echo $row['ssc']; ?>%</p>
    <p>Marks obtained in 12th = <?php echo $row['hsc']; ?>%</p>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">Semester Pointers</h3>
    <p>Semester 1 = <?php echo $row['sem1']; ?></p>
    <p>Semester 2 = <?php echo $row['sem2']; ?></p>
    <p>Semester 3 = <?php echo $row['sem3']; ?></p>
    <p>Semester 4 = <?php echo $row['sem4']; ?></p>
    <p>Semester 5 = <?php echo $row['sem5']; ?></p>
    <p>Semester 6 = <?php echo $row['sem6']; ?></p>
    <p>Semester 7 = <?php echo $row['sem7']; ?></p>
    <p>Semester 8 = <?php echo $row['sem8']; ?></p>
  </div>
</div>

<div class="bgimg-3">
  <div class="caption">
    <span class="border">Workshops</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">Workshops Attended</h3>
    <p><?php echo $row['work1']; ?></p>
    <p><?php echo $row['work2']; ?></p>
    <p><?php echo $row['work3']; ?></p>
    <p><?php echo $row['work4']; ?></p>
    <p><?php echo $row['work5']; ?></p>
  </div>
</div>

<div class="bgimg-4">
  <div class="caption">
    <span class="border">Internships</span>
  </div>
</div>

<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="color:white;">Internships Done</h3>
    <p><?php echo $row['inta1']; ?></p>
    <p><?php echo $row['inta2']; ?></p>
    <p><?php echo $row['inta3']; ?></p>
    <p><?php echo $row['inta4']; ?></p>
    <p><?php echo $row['inta5']; ?></p>
  </div>
</div>

<div class="bgimg-5">
  <div class="caption">
    <span class="border">Apply for Company</span>
  </div>
</div>
<form action="companies.php" method="post">
<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <span class="border"><a href=""><center><button class="btn btn-info btn-lg">Apply</button></center></a></span>
  </div>
</div>
</form>
</body>
</html>