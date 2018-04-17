<?php
  require('assets/main/main.php');

  class page {
    function __construct() {
      // $this->co = new mainDB('CO');
    }
  }
  $page = new page;
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
	<title>Company</title>
</head>
<body>
	<!-- Adding Navigation Bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<img src="images/logoets.png" alt="logo" class="logoimg navbar-brand">

 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  	<div class="float-right">
  		
  		<ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="school.php">School </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="company.php">Company</a>
      </li>
      <li class="nav-item "> 
        <a class="nav-link" href="about.php">About </a>
      </li>
      
    </ul>

  	</div>
    
    
  </div>
</nav>
	<!-- Cloing Navigation Bar -->


	<!-- Adding Carousel  -->
	   <div class="container">
	   	  <h1 class="text-center"> School </h1>
	   	  <p class="text-center">Access your school management system</p>

	   </div>
	<!-- Closing Carousel -->


<!-- This will add font awesome text, Bootstrap columns  and links  -->

<div class="container">
    <div class="row mt-4 mb-5">
          <div class="col-6 mx-auto ">
            <!-- This will hold the register form -->
            <p>REGISTER</p>

            <form method="POST" action="assets/main/query.php" enctype="multipart/form-data">


       
<!--   <div class="form-group">
    <label for="roleform">School type</label>
    <select class="form-control" id="school_type" name="school_type" required>
      <option value="">Select school type</option>
      <option value="college">College</option>
      
     </select>
  </div> 
 -->

  <input type="hidden" name="school_type" value="college">


  <div class="form-group">
    <label for="name">School Name * </label>
    <input type="text"  name="name"  class="form-control" id="name" aria-describedby="emailHelp" placeholder="School Name" required>
    
  </div>

 <div class="form-group">
    <label for="address">School Address *</label>
    <input type="text" name="address" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Address" required>
    
  </div>

   <div class="form-group">
    <label for="address">School Logo * </label>
    <input type="file" name="logo" accept="image/*" required class="form-control"  >
    
  </div>

    <div class="form-group">
    <label for="moto">Motto *</label>
    <input type="text" class="form-control" id="motto" aria-describedby="emailHelp" placeholder="School motto" name="motto" required>
    
  </div>

  <div class="form-group">
    <label for="adminname">Administrator name *</label>
    <input type="text"  class="form-control" id="adminname" aria-describedby="emailHelp" placeholder="Admin Name" name="admin_name" required>
    
  </div>  

  <div class="form-group">
    <label for="adminemail">Administrator email *</label>
    <input type="email" class="form-control" id="adminemail" name="admin_email" required placeholder="Adminstrator Email ">
  </div>


   <div class="form-group">
    <label for="phonenumber">Phone Number *</label>
    <input type="text" class="form-control" id="phonenumber"  placeholder="Administrator Phone number"  name="admin_phone" required>
    
  </div>

   <div class="form-group">
      <label for="username">Username *</label>
      <input type="text" class="form-control" id="username"  placeholder="Admin Username"  name="username" required>   
  </div>

   <div class="form-group">
    <label for="password">Password *</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  
  

  <input type="submit" class="btn btn-primary" name="registerSchool" value="Register"/>
</form>
            
          </div>
        
                  
         
    </div>
</div>



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