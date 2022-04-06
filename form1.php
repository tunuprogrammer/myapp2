<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		fieldset
		{ 
          width: 900px ;
          height:600px;
          /*align-content: center;*/
		}
	</style>
        <title>REGISTRATION FORM</title>
</head>
<body>
 <form action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
  <fieldset> 
     <legend><h1>PERSONAL DETAILS</h1></legend>
     <label>Firstname: </label>
     <input type="text" name="fname"><br><br>
      <label>Lastname: </label>
     <input type="text" name="lname"><br><br>
     <label>Gender: </label>
     <input type="radio" name="gender" value="F">Female
     <input type="radio" name="gender" value="M">Male<br><br>
     <label>Date of Birth</label>
     <input type="date" name="DOB"><br><br>
     <label>Place of birth:</label>
     <select name="POB">
          <option>Morogoro</option>
          <option>Arusha</option>
          <option>kagera</option>f
          <option>moshi</option>
          <option>mbeya</option>
     </select><br><br>
     <label>Email:</label>
     <input type="email" name="email"><br><br>
     <label>Password:</label>
     <input type="password" name="password1"><br><br>
     Confirm password:<input type="password2" name="password2"><br><br>
     Upload photo:<input type="file" name="photo"><br><br>
     <input type="submit" name="submit" value="SUBMIT"><tr>
     <input type="reset" name="Reset" value="RESET"><br>
     <!-- <button>SUBMIT HERE</button> -->
</fieldset>	
</form>

<!-- ///////PHP CODES/////////// -->
<?php
$db=mysqli_connect('localhost','root','','treasure1');
// if($db)
// {
//      echo"connected";
// }
// else{
//      echo "not connected";
// }
if(isset($_POST['submit']))
{
   $firstname=$_POST['fname'];
   $lastname=$_POST['lname'];
   $gender=$_POST['gender'];
   $date_of_birth=$_POST['DOB'];
   $place_of_birth=$_POST['POB'];
   $email=$_POST['email'];
   $password1=$_POST['password1'];
   $password2=$_POST['password2'];

   $sql="INSERT INTO treasure1(fname,lname,gender,DOB,POB,email,password1) values('$firstname','$lastname','$gender','$date_of_birth','$place_of_birth','$email',SHA('$password1'))";
   if($password1==$password2)
   {
     mysqli_query($db,$sql);
     echo "CONGRATULATION $firstname YOU HAVE SUCCESSFULL REGISTERED!!";
   }
   else
   {
     echo "SORRY!!! password doesnt match". mysqli_error($db);
   }
}
 mysqli_close($db);
?>



</body>
</html>

