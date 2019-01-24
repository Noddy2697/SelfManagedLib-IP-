<?php
include("qr/qrlib.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
	
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <h2>User Registration Form</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required=""/>
                    </div>
<div> student's photo
									     <input type="file"  name="f1" required=""/><br></div>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" onkeyup="generate_qrcode(this.value)"required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="email" name="email" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="contact" name="contact" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="SEM" name="sem" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enrollment No" name="enrollmentno" required=""/>
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit1" value="Register">
                    </div>
<div> qr code
									     <input type="file"  value="C:\wamp\www\project lms\phplms1\student\images"  id="demo" name="f2" /><br></div>
                </form>
            </section>
	


<p id="result"></p>
<script>
 function generate_qrcode(sample){
 $.ajax({
 type: 'post',
 url: 'generator.php',
 data : {sample:sample},
 success: function(code){
 $('#result').html(code);
 }
 });

 } 
 function myFunction() {
    var x = document.getElementById("result").innerHTML;
    document.getElementById("demo").value = x;
}
</script>

       <?php
           if(isset($_POST["submit1"]))
                 {
                      $link=mysqli_connect("localhost","root","") ;
                     mysqli_select_db($link,"lms") ;
					 $tm=md5(time()) ;
	             $fnm=$_FILES["f1"]["name"] ;
	             $dst="./books_image/".$tm.$fnm ;
				 $dst1="books_image/".$tm.$fnm ;
				 move_uploaded_file($_FILES["f1"]["tmp_name"],$dst) ;
                     mysqli_query($link,"insert into student_registration values('','$_POST[firstname]','$dst1','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]','$_POST[sem]','$_POST[enrollmentno]','no')") ;
?>
    <div class="alert alert-success col-lg-6 col-lg-push-3">
        Registration successfully, You will get email when your account is approved 
    </div>
     
<?php  
          }
?>



    </div>

    


</body>
</html>
