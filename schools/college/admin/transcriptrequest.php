<?php 
session_start(); 
if(isset( $_SESSION['school_id'])){
      }
      else{
        header("Location: http://localhost/etransys/college_login.php");
        die();
      } 
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
	   	  <h1 class="text-center">Company Requests</h1> 

         <?php

         if (isset($_POST['approvelResult'])){
               $matricNumber = $_POST['matric_no'];
               $requestedCompany = $_POST['requested_by']; 

               //run  a query to check if the request has already been approved 
               $sql =  "SELECT  * FROM co_request WHERE studentid  = '$matricNumber' AND requestedby = '$requestedCompany' " ; 
               $result = mysqli_query($conn , $sql );  

               // check if result has record
                if (mysqli_num_rows($result) > 0) { 

                    //Now check if the result has already been approved 
                    $row = mysqli_fetch_assoc($result) ; 
                    $transcriptUrl = $row['transcripturl']; 
                    
                    if($transcriptUrl == null){
                        //now check if this students transcript has been uploaded in the first place 

                        $sql = "SELECT * FROM co_students WHERE matric_no = '$matricNumber' ";
                        $result = mysqli_query ($conn , $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result) ; 
                            $transcriptUrl = $row['transurl']; 

                             if ($transcriptUrl == null){
                                echo "<p class='text-center text-info'> Sorry you need to first upload the student transcript before granting access.</p>"; 
                             }
                             else{
                                 //grant request now 
                                $sql = "UPDATE co_request SET status='APPROVED' , transcripturl = '$transcriptUrl' WHERE studentid = '$matricNumber'  ";
                                $result = mysqli_query($conn , $sql);


                                if($result){
                                    echo "<p class='text-center text-success'> Transcript request has been approved successfully.$transcriptUrl  </p>"; 
              
                                }
                                else{
                                    echo "<p class='text-center text-info'> Sorry an error occurred, please try again later</p>"; 
              

                                }
                            }
                        } 
                        else{
                            echo "<p class='text-center text-info'> Sorry seems student record is no longer avalible in our database. $matricNumber</p>"; 
              
                        }
                    }
                    else{
                        echo "<p class='text-center text-info'> You have already granted access for this company </p>"; 
              
                    }
                   

                    
                  
                }
                else{
                    echo "<p class='text-center text-warning'> Sorry No student was found with this credentials </p>"; 
                }



         }         
         ?>
	  
    </div>

<!-- Upload Transccript -->
    <div class="container">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Course</th>
        <th> Requested By </th>
        <th> Status </th>
        <th> Approve </th>
        
       
      </tr>
    </thead>
    <tbody>
<?php 
$schoolid = $_SESSION['school_id'];
  //Pull out data  
$sql = "SELECT * FROM  co_request WHERE school_id like '%$schoolid%' ";
// The data returned is stored in the result variable
$result = mysqli_query($conn, $sql);

// check if result has record
if (mysqli_num_rows($result) > 0) {

  // loops through each row to populate the table
  while($row = mysqli_fetch_assoc($result)) {

    $studentid = $row['studentid'];
    $requestedby = $row['requestedby']; 
    $status = $row['status'];
    $changedStatus = "";
    if($status == 'DENIED'){
          $changedStatus = 'Pending';
           }
    else{
           $changedStatus = 'Approved';
          }
                        
   

      echo "<tr>
              <td>".$row['studentname']."</td>
              <td>".$row['studentid']."</td>
              <td>".$row['course']."</td>
              <td>".$row['requestedby']."</td>
              <td>".$changedStatus."</td>";
             

            // //   $matric = $row['matric_no'];

              echo "
              <td> 
                <form action='transcriptrequest.php' method='post'> 
                <div class='form-group row'>
                <input type='hidden' name= 'matric_no' value= '$studentid' />
                <input type='hidden' name = 'requested_by' value= '$requestedby' />
                  
                <div class='col-12 mt-3'>
                <button class='btn btn-success' name='approvelResult' type='submit'>Approve Request</button>
                </div> 
    
              </div>     
           </form>
           </td> ";
  }
}
else{
  echo "<p class='bg-warning text-center'> No student profile found. </p>";
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