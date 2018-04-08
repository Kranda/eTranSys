<?php
  require('assets/main/main.php');

  class page {
    function __construct() {
      $this->co = new mainDB('CO');
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
	<title>College Login Portal</title>
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
	   	  <h1 class="text-center">College / University Login </h1>
	   	  <p class="text-center">Provide Login Below. </p>

	   </div>
	<!-- Closing Carousel -->


  <?php 

      if(isset ($_GET['in'])){
           if($_GET['in']==="success"){
        echo "<p class='bg-success text-center'> Account was successfully created</p>";
      }
      else if($_GET['in']==="error"){
         echo "<p class='bg-warning'> Account was not successfully created</p>";
   }

      }

   
  
  ?>


<!-- This will add font awesome text, Bootstrap columns  and links  -->

<div class="container">
    <div class="row mt-4">

          <div class="col-6 mx-auto mt-4">
                <form method="POST" action="assets/main/query.php">

                  <input type="hidden" name="type" value="CO">


     <div class="form-group">
    <label for="collegeform">College</label>
    <select class="form-control" id="collegeform" name="school_id" required>
      <option value="">Select College...</option>
<?php
                  $stmt = $page->co->pdo->query("SELECT * FROM co_schools");
                  while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo '
                      <option value="'.$row->school_id.'">'.$row->name.'</option>
                    ';
                  }
                ?>


      
     </select>
  </div>


  <div class="form-group">
    <label for="roleform">Role</label>
    <select class="form-control" id="roleform" name="identity" required>
      <option value="">Select your identity...</option>
      <option value="admin">Adminstrator</option>
      <option value="tutor">Professor</option>
      <option value="student">Student</option>
     </select>
  </div>



        <div class="form-group">
          <label for="exampleInputEmail1">Username </label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username" required>
          
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        
        <input type="submit" name="login" value="Login" class="btn btn-primary">

         <p class="mt-5">Don't have an account yet?
         <a href="register.php">Sign up now</a> </p>

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