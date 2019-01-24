<?php
session_start();
include"connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>
<div>
<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>User Login Form</h1>

            <div>
                <input onfocus="myFunction()"  id="demo"type="text" name="username" class="form-control" placeholder="QR Code" required=""/>
            </div>

            <div>

                <input class="btn btn-success" type="submit" name="submit1" value="Login"><br>
 
            </div>
			 <div class="clearfix"></div>
			   

                <div class="clearfix"></div>
                


            </div>

            <div class="clearfix"></div>


                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>
</div>

</div>
 <?php
    if(isset($_POST["submit1"]))
        {  $count=0 ; 
$res=mysqli_query($link,"select * from student_registration where username='$_POST[username]' && status='yes' " );
           $count=mysqli_num_rows($res) ;
        // echo $count ;
  if($count==0)
       {  ?>
   
          <div class="alert alert-danger col-lg-6 col-lg-push-3">
     <strong style="color:white">Invalid</strong> Qr Code .
    </div>
<?php
          }
   else
{
	$_SESSION["username"]=$_POST["username"];
	?>
   <script type="text/javascript">
    window.location="my_issued_books.php" ;
      </script>
<?php
  }
 
        }   
     
 ?>




<div>

    <title>Instascan &ndash; Demo</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="adapter.min.js"></script>
    <script type="text/javascript" src="vue.min.js"></script>
    <script type="text/javascript" src="instascan.min.js"></script>
  </head>
  <body>
    <div id="app">
      <div class="sidebar">
        <section class="cameras">
          <h2>Cameras</h2>
          <ul>
            <li v-if="cameras.length === 0" class="empty">No cameras found</li>
            <li v-for="camera in cameras">
              <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
              <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
              </span>
            </li>
          </ul>
        </section>
        <section class="scans">
          <h2>Scans</h2>
          <ul v-if="scans.length === 0">
            <li class="empty">No scans yet</li>
          </ul>
          <transition-group name="scans" tag="ul" >
           <li  v-for="(scan,key) in scans" :key="key" :title="scan.content"><input hidden onfocus="myFunction()" type="password" id="demo"><p id ="myText" hidden>{{ scan.content }}</p></li>

          </transition-group>

        </section>

      </div>
      <div class="preview-container">
        <video id="preview"></video>
      </div>
    </div>


</div>

<script>
function myFunction() {
    var x = document.getElementById("myText").innerHTML;
    document.getElementById("demo").value = x;
}
</script>

    <script type="text/javascript" src="app.js"></script>
  </body>
</html>
