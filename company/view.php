<?php 


session_start(); 

if(isset( $_SESSION['loggedincomp'])){
}
		else{
				header("Location: http://localhost/etransys/company.php");
		 	die();
		} 

$conn = mysqli_connect("127.0.0.1","root","","etransys_college");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }






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
		<img src="../images/logoets.png" alt="logo" class="logoimg navbar-brand">

 
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
      <a class="nav-link" href="request.php"> Request Transcript | </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="view.php"> View Transcipts | </a>
      </li>
    
      <li class="nav-item "> 
        <a class="nav-link" href="logout.php">Logout </a>
      </li>
      
    </ul>

  	</div>
    
  </div>
</nav>
	

  


	   <div class="container">
	   	  <h1 class="text-center">View Transcripts</h1>

             <div class="row">
                <div class="col-12 mx-auto">
      
                        
                </div>
             </div>

	   	  <div class="row"> 
             <div class="col-8 mx-auto">
             <table class="table">
             <thead>
               <tr>
                 <th scope="col">Status</th>
                 <th scope="col">Student Name</th>
                 <th scope="col">Student ID</th>
                 <th scope="col">Course</th>
                 <th scope="col">Download Transcript </th>
               </tr>
             </thead>
             <tbody>
                   
                     
                   <?php 
                   //retreiving information from the request database 
                   $requestedby = $_SESSION['companyname'];
                   $sql = "SELECT * FROM co_request WHERE status = 'APPROVED' AND requestedby = '$requestedby' "; 
                   $result =  mysqli_query($conn, $sql); 

                   if (mysqli_num_rows($result) > 0) {
                         //populate results

                   }
                   else{
                       echo "<h3 class='text-center text-warning'> No records avaliable </tr>";
                   }
                   
                   ?>







            
             </tbody>
           </table>

             </div>
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