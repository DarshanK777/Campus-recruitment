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

$sql = "SELECT * FROM `company_data` ";
$result1 = mysqli_query($conn, $sql);
echo $email;
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    // $row = mysqli_fetch_assoc($result); 
        
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style type="text/css">
<style>
body, html {
  height: 100%;
  margin: 0;
  font: 400 15px/1.8 "Lato", sans-serif;
  color: #777;
}

.bgimg-1, .bgimg-2, .bgimg-3 {
  position: relative;
  opacity: 0.65;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("images/1.jpg");
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
    .bgimg-1{
        background-attachment: scroll;
    }
}
</style>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>

<div class="bgimg-1">
  <div class="caption">
    <span class="border">COMPANIES</span>
  </div>
</div>


 <div style="padding-left: 40px;padding-right: 40px;">

<!--3 elemnts-->
<form action="company_disp.php" method="POST">
  <?php while($row1 = mysqli_fetch_assoc($result1)){?>
  <div class="row" style="margin:30px;">
  <div class=" col-md-4 col-sm-4 col-xs-4"><button style="border: 0px;background-color: transparent;" onclick="sendCompany()"><img src="<?php echo $row1['img_path']; ?>" class="img-fluid"style="max-width: 100%;border-radius: 10px;margin: 10px;"></button></div>
  <?php $row1 = mysqli_fetch_assoc($result1) ; ?>
  <div class=" col-md-4 col-sm-4 col-xs-4"><button style="border: 0px;background-color: transparent;" onclick="sendCompany()"><img src="<?php echo $row1['img_path']; ?>" class="img-fluid" style="max-width: 100%;border-radius: 10px;margin: 10px;"></button></div>
  <?php $row1 = mysqli_fetch_assoc($result1) ; ?>
  <div class=" col-md-4 col-sm-4 col-xs-4"><button style="border: 0px;background-color: transparent;" onclick="sendCompany()"><img src="<?php echo $row1['img_path']; ?>" class="img-fluid" style="max-width: 100%;border-radius: 10px;margin: 10px;"></button></div>
</div>
<?php }  ?>
</form>
<!--2 elemnts-->
 <!-- <div class="row" style="margin:30px;" >
  <div class=" col-md-2 col-sm-2  col-xs-2"></div>
  <div class=" col-md-4 col-sm-4  col-xs-4"><im src="images/1.jpg" class="img-fluid" style="max-width: 100%;border-radius: 10px ;margin: 10px;"></div>
  <div class=" col-md-4 col-sm-4  col-xs-4"><img src="images/1.jpg" class="img-fluid" style="max-width: 100%;border-radius: 10px;margin: 10px;"></div>
  <div class=" col-md-2 col-sm-2  col-xs-2" ></div>
</div>
1 elemnts
  <div class="row" style="margin:30px;">
  <div class=" col-md-4 col-sm-4  col-xs-4"></div>
  <div class=" col-md-4 col-sm-4  col-xs-4"><img src="images/1.jpg" class="img-fluid" style="max-width: 100%;border-radius: 10px;margin: 10px;"></div>
  <div class=" col-md-4 col-sm-4  col-xs-4"></div>
</div>
     --> -->

</div>


<script type="text/javascript">
  document.getElementById()
</script>>


<div class="bgimg-1">
  <div class="caption">
    <span class="border">click on companies</span>
  </div>
</div>
<section class="box3">
    <div class="left_footer">
      <div id="text3">
        REACH OUT
      </div>
    </div>

    <div class="right_footer">
      
        <p>Contact Us</p>

        <form method="POST">
          
          <input type="email" name="email" placeholder="Email" />
          <textarea name="message" placeholder="Message"></textarea>
          <button>Send</button>
        
       

        
        </form>

      </div>
      
      
    </div>
    
    
  </section>

</body>
</html>