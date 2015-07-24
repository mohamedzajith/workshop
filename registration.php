<?php
//sdfsfsfds
//sdfsdfsdf
/*
sdfsfsdfsf
sdfsdf
*/
require 'core.php';
require 'connect.php';

if(!loggedin()){
	if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_agian'])&&isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['age'])){
      $username=$_POST['username'];
	  $password=$_POST['password'];
	  $password_agian=$_POST['password_agian'];
	  $password_hase=md5($password);
	  $firstname=$_POST['firstname'];
	  $lastname=$_POST['lastname'];
	  $age=$_POST['age'];
	  
	  if(!empty($username)&&!empty($password)&&!empty($password_agian)&&!empty($firstname)&&!empty($lastname)&&!empty($age)){
	     if($password!=$password_agian){
		    echo "Password do not match";
		 }else{
		    $query="select `username` from ynotsadmin where `username`='$username'";
			$query_run=mysql_query($query);
			
			if(mysql_num_rows($query_run)==1){
			  echo "The username ".$username." already exists.";
			}else{
			  $query="insert into ynotsadmin values('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hase)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($lastname)."','".mysql_real_escape_string($age)."')";
			  if($query_run=mysql_query($query)){
			     header("Location: reg_success.php");
			  }else{
			     echo "Sorry we couldn't register you at this time. Try agian later.";
			  }
			}
		 }
	  }else{
	     echo "All field are required";
	  }
	}
?>
<form action="registration.php" method="post">
username:<br><input type="text" name="username" value="<?php if(isset($username)){echo $username;}  ?>" placeholder="jas" ><br><br>
password:<br><input type="password" name="password"><br><br>
password agian:<br><input type="password" name="password_agian"><br><br>
Firstname:<br><input type="text" name="firstname" value="<?php if(isset($firstname)){echo $firstname;}  ?>" ><br><br>
Lastname:<br><input type="text" name="lastname" value="<?php if(isset($lastname)){echo $lastname;}  ?>"><br><br>
Age:<br><input type="text" name="age" value="<?php if(isset($age)){echo $age;}  ?>"><br><br>
<br><input type="submit" value="Register">
</form>

<?php
}else if(loggedin()){
  echo "you're already registered and logged in.";
}

?>
