<?php 

session_start(); 

if(isset( $_SESSION['school_id'])){
       
      }
      else{
       
        header("Location: http://localhost/etransys/college_login.php");
        die();
    
      } 


// 		private $dbname = 'etransys_college';
$conn = mysqli_connect("127.0.0.1","root","","etransys_college");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$schoolid = $_SESSION['school_id'];
$username = $_SESSION['adminusername'];

// 
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
        <a class="nav-link" href="transcriptrequest.php">Transcript Requests |</a>
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
	   	  <h1 class="text-center">Upload Transcript</h1> 

         <?php
           if(isset($_GET['statusFlag'])){ 
             $statusFlag = $_GET['statusFlag'];

           
             if($statusFlag == "success" ){
              $message= $_GET['message'];
              echo "<p class='text-success text-center'>$message </p>"; 
            }

            else if($statusFlag == "failed" ){
              $message= $_GET['message'];
              echo "<p class='text-danger text-center'>$message </p>"; 
            }


           }
         
         ?>
	  
    </div>

<!-- Upload Transccript -->
    <div class="container">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Student ID</th>
        <th>Sex</th>
        <th> Email </th>
        <th> Phone </th>
        <th> Level </th>
        <th> Course </th>
        <th> Upload Transcript </th>
        <th> View Transcript </th>
       
      </tr>
    </thead>
    <tbody>
<?php 
$schoolid = $_SESSION['school_id'];
  //Pull out data  
$sql = "SELECT * FROM  co_students WHERE school_id like '%$schoolid%' ";
// The data returned is stored in the result variable
$result = mysqli_query($conn, $sql);

// check if result has record
if (mysqli_num_rows($result) > 0) {

  // loops through each row to populate the table
  while($row = mysqli_fetch_assoc($result)) {

      echo "<tr>
              <td>".$row['name']."</td>
              <td>".$row['matric_no']."</td>
              <td>".$row['sex']."</td>
              <td>".$row['email']."</td>
              <td>".$row['phone']."</td>
              <td>".$row['level']."</td>
              <td>".$row['programme']."</td> ";

              $matric = $row['matric_no'];

              echo "
              <td> 
                <form action='uploadscript.php' method='post' enctype='multipart/form-data'> 
                <div class='form-group row'>
                <input type='hidden' name= 'matric_no' value= '$matric' />
                   <div class='col-12'>
                   <input type='file' name='file'required/>
                  </div> 
                <div class='col-12 mt-3'>
                <button class='btn btn-success' name='submitresult' type='submit'>Upload</button>
                </div> 
    
              </div>




                  
                  
                  
                </form>
              </td> ";

                if ($row['transurl']===null){
                  echo "
                  <td> 
                  <a type='button' class='btn btn-light'  disabled>Empty Transcript</a>
                  </td>
                 ";
            

                }
                else{
                  $url = $row['transurl']; 
                  echo "
                  <td> 
                  <a type='button' class='btn btn-success' href='http://localhost/etransys/uploads/$url' >View Transcript</a>
                  </td>
                 ";

                }




  }
}
else{
  echo "<p class='bg-warning'> No student profile found. </p>";
}


?>





























      <!-- <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      -->
    </tbody>
  </table>     

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