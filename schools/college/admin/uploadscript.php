<?php 
session_start(); 
if(isset( $_SESSION['school_id'])){     }
      else{
        header("Location: http://localhost/etransys/college_login.php");
        die();
      } 
$conn = mysqli_connect("127.0.0.1","root","","etransys_college");
if (mysqli_connect_errno())
  {echo "Failed to connect to MySQL: " . mysqli_connect_error();}
   ?>
   <?php 
  if(isset($_POST['submitresult'])){
    $matric = $_POST['matric_no'];
      $file = $_FILES['file'];
      $fileName = $_FILES['file']['name'];
      $fileTempName = $_FILES['file']['tmp_name'];
      $fileSize   =$_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType =$_FILES['file']['type'];
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array('pdf');

      if(in_array($fileActualExt,$allowed)){

                      if($fileError === 0){
                          $fileNameNew =  $matric."_".uniqid('',true).".".$fileActualExt;
                          $fileDestination =  '../../../uploads/'.$fileNameNew; 
                          

                          //update co_students table 
                          $sql = "UPDATE co_students SET transurl = '$fileNameNew' WHERE matric_no  = '$matric' "; 
                          $result  = mysqli_query($conn, $sql); 

                          if($result){
                            move_uploaded_file($fileTempName, $fileDestination); 
                          header("Location: uploadresult.php?statusFlag=success&message=Transcript was uploaded successfully"); 
                          die(); 

                          }
                          else{
                            header("Location: uploadresult.php?statusFlag=failed&message=database connection could not be establish, please try again"); 
                            die();
                          }








                      }
                      else{
                        header("Location: uploadresult.php?statusFlag=failed&message=Sorry file failed to upload, try again later"); 
                        die();
                      }

      }
      else{
          //throw  an incompatable error
          header("Location: uploadresult.php?statusFlag=failed&message=Sorry you can only upload Pdf files"); 
          die();
            }


  }





?>