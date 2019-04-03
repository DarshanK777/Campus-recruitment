<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
  
  table 
    { 
      border-collapse: separate; border-spacing: 5px;
    }
    body
    {
      background: url("back.png") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
    }
</style>
</head>
<body>

<div class="container clearfix">
  <img src="background.jpg" class="img-rounded" alt="Cinque Terre" style="float: right;height:100px;width: 100px">
  <h2>welcome, </h2>
  <ul class="nav nav-tabs" ">
    <li class="active"><a data-toggle="tab" href="#home">Fill Details</a></li>
    <li><a data-toggle="tab" href="#menu1">Student Applications</a></li>
    
  </ul>

  <div class="tab-content">
    
        <div id="home" class="tab-pane fade in active">
          <table>
          	<form action="companyhome.php" method="POST">   
            <tr>
                <td> <label for="description">Description</label></td>
                <td>  <textarea name="description" id="description" style="margin: 0px; width: 463px; height: 121px;"></textarea></td>
            </tr>
            <tr>
              <td><label for="Intake">Intake</label></td>
              <td>
                <table>
                    <tr>
                      <th>Marketing</th>
                      <th>Sales</th>
                      <th>Technical</th>
                    </tr>
                    <tr>
                      <td><input type="number" name="Marketingnumber"></td>
                      <td><input type="number" name="Salesnumber"></td>
                      <td><input type="number" name="Technicalnumber"></td>
                    </tr>
                    </form>
                </table>
              </td>
            </tr>
            <tr>
             
              <td colspan="2"><button type="submit" class="btn-primary">Submit</button></td>
            </tr>
          
          </table>
       
        </div>
        <div id="menu1" class="tab-pane fade in active">
          <h3>add the code here</h3>
          <h1>hello</h1>
          
        </div>
  
  </div>
</div>

</body>
</html>
<?php include 'companyhome2.php'; ?>