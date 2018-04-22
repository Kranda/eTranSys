<?php 

//require('../../../assets/main/main.php');

session_start(); 
// private $dbuser = 'root'; 
// 		private $dbpass = '';
// 		private $dbhost = '127.0.0.1';
// 		private $dbname = 'etransys_college';

if(isset( $_SESSION['school_id'])){
}
		else{
				header("Location: http://localhost/etransys/college_login.php");
		 	die();
		} 

$servername = "127.0.0.1";
$username = "root";
$password = "";

// 		private $dbname = 'etransys_college';
$conn = mysqli_connect("127.0.0.1","root","","etransys_college");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$schoolid = $_SESSION['school_id'];
$username = $_SESSION['adminusername'];



?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/about.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

        <style type="text/css">
        	.logoimg{
        		max-width: 180px; 
        		max-height: 180px;
        	}

          .linksimage{
            font-size: 60px;
            color:green;
          }

        	.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
    text-align: center;
}
        </style>
	<title>School</title>
</head>
<body>
	<!-- Adding Navigation Bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<img src="../../../images/logoets.png" alt="logo" class="logoimg navbar-brand">

 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  	<div class="float-right">
  		
  		<ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Admin Profile| <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="school.php"> Register Student | </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="uploadresult.php">Upload Transcript |</a>
      </li>
      <li class="nav-item "> 
        <a class="nav-link" href="logout.php">Logout </a>
      </li>
      
    </ul>

  	</div>
    
  </div>
</nav>
	<!-- Cloing Navigation Bar -->


	<!-- Adding Carousel  -->
	   <div class="container">
	   	  <h1 class="text-center">Administrator Profile</h1>

	   	  <div class="row">

				 <?php
				 $sql = "SELECT * FROM co_admin WHERE  username = '$username' ";
				 $result = mysqli_query($conn, $sql);
				 
				 if (mysqli_num_rows($result) > 0) {
					 // output data of each row
					 while($row = mysqli_fetch_assoc($result)) {
					echo '	<div class="col-2 text-right">
						Name : 
					</div>
					<div class="col-10 text-left">
						'.$row["name"].' 
					</div>

					 <div class="col-2 text-right">
						Email : 
					</div>
					<div class="col-10 text-left">
					'.$row["email"].' 
					</div>
					 <div class="col-2 text-right">
						Phone : 
					</div>
					<div class="col-10 text-left">
						'.$row["phone"].' 
					</div>

					 
					 <div class="col-2 text-right">
						Username : 
					</div>
					<div class="col-10 text-left">
					'.$row["username"].'  
					</div> ';
					 }
				 } else {
					 echo "0 results";
				 }




				 $sql = "SELECT * FROM co_schools WHERE  school_id = '$schoolid' ";
				 $result = mysqli_query($conn, $sql);
				 
				 if (mysqli_num_rows($result) > 0) {
					 // output data of each row
					 while($row = mysqli_fetch_assoc($result)) {
					echo '	<div class="col-2 text-right">
						School Name : 
					</div>
					<div class="col-10 text-left">
						'.$row["name"].' 
					</div>

					 <div class="col-2 text-right">
						School Address : 
					</div>
					<div class="col-10 text-left">
					'.$row["address"].' 
					</div>
					 
';
					 }
				 } else {
					 echo "0 results";
				 }
				 
				 mysqli_close($conn);
				 
				 
				 ?>

	
	   	   
	   	    
	   	  </div>

	   	  
	   	 

	   </div>
	<!-- Closing Carousel -->






	<!-- Footer openings -->


<div class="footer">
  <p>&copy; 2018 eTranscript System</p>
</div>
	<!-- Footer closing -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>i