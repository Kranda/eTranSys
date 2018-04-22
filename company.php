<?php 
session_start();  

$conn = mysqli_connect("127.0.0.1","root","","etransys_college");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


  if(isset($_POST['submit'])){
   
 

    $username  = $_POST['username']; 
    $password  = $_POST['password']; 
 

     $sql = "SELECT  * FROM co_company WHERE username = '$username' AND pwd = '$password' ";
     $result = mysqli_query($conn ,  $sql);
     $row = mysqli_num_rows($result); 
   
     if(mysqli_num_rows($result) === 1){
      echo "<p class='text-center bg-success'>
      Login successfully
        
       </p>";

       //store required fields into a session 
       $row=mysqli_fetch_assoc($result); 
     

       $_SESSION['username'] = $row['username'];
       $_SESSION['address'] = $row['ads'];
       $_SESSION['companyname'] =  $row['fname'];
       $_SESSION['website'] = $row['website'];
       $_SESSION['loggedincomp'] = 'yes';

       header("Location: http://localhost/etransys/company/index.php");
       die();

      

     
     }
     else{
      echo "<p class='text-center bg-warning'>
        Incorrect login details
            
         </p>";

     }









//     $sql = "INSERT INTO co_company ( fname , ads, website, username, pwd ) VALUES ('$name','$address','$website','$username','$pwd' ) ";
//     $result = mysqli_query($conn, $sql); 
 
//     if($result){
     
//   echo "<p class='text-center bg-success'>
// Account created successfully
  
//   </p>";
  
//      }
//      else{
//       echo mysqli_error($conn);
//       echo "<p class='text-center bg-warning'>
//       Sorry an error occurred, please try again later
      
//       </p>";
//      }

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

	   <div class="container">
	   	  <h1 class="text-center">Company </h1>
	   	  <p class="text-center">Please Login Below</p>

	   </div>

<div class="container">
    <div class="row mt-4">
                 
        <div class="col-6  mx-auto">
      
          <p>LOGIN</p>

          <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username *</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username"  name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password *</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

  <medium> Don't have an account? <a href="companyreg.php"> Create one</a></medium>
</form>


               
          
        </div>             
         
    </div>
</div>





<div class="footer">
  <p>&copy; 2018 eTranscript System </p>
</div>
	<!-- Footer closing -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>i