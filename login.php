<?php
	ob_start();
	session_start();
	require("db/db.php");
	date_default_timezone_set("ASIA/KARACHI");
	$time=date('d/m/Y, h:i:s A');
	$u_name=mysqli_real_escape_string($con,$_POST['u_name']);
	$u_pass=mysqli_real_escape_string($con,$_POST['u_pass']);

	
	$a=("select * from users where u_name='$u_name' and u_pass='$u_pass' and status='1' limit 1");
	$result=mysqli_query($con,$a);
	$count=mysqli_num_rows($result);
	if($count>0){
		mysqli_real_escape_string($con,$_SESSION['u_name']=$u_name);
		mysqli_real_escape_string($con,$_SESSION['u_pass']=$u_pass);
		$check=mysqli_query($con,"select * from users where u_name='$u_name'");
		while($row=mysqli_fetch_array($check)){
		$u_role=$row['cat'];
		$u_id=$row['u_id'];
		}

				if($u_role=="admin"){
					mysqli_real_escape_string($con,$_SESSION['u_id']=$u_id);
					mysqli_real_escape_string($con,$_SESSION['u_name']=$u_name);
					mysqli_real_escape_string($con,$_SESSION['u_pass']=$u_pass);
					mysqli_real_escape_string($con,$_SESSION['u_role']=$u_role);
					header("Location:admin/index.php");
				}
				elseif($u_role=="Operator"){
					mysqli_real_escape_string($con,$_SESSION['u_id']=$u_id);
					mysqli_real_escape_string($con,$_SESSION['u_name']=$u_name);
					mysqli_real_escape_string($con,$_SESSION['u_pass']=$u_pass);
					mysqli_real_escape_string($con,$_SESSION['u_role']=$u_role);
					
					header("Location:op/index.php");
				}
				elseif($u_role=="Report"){
					mysqli_real_escape_string($con,$_SESSION['u_id']=$u_id);
					mysqli_real_escape_string($con,$_SESSION['u_name']=$u_name);
					mysqli_real_escape_string($con,$_SESSION['u_pass']=$u_pass);
					mysqli_real_escape_string($con,$_SESSION['u_role']=$u_role);
					
					header("Location:reports/index.php");
				}
				elseif($u_role=="screen"){
					mysqli_real_escape_string($con,$_SESSION['u_id']=$u_id);
					mysqli_real_escape_string($con,$_SESSION['u_name']=$u_name);
					mysqli_real_escape_string($con,$_SESSION['u_pass']=$u_pass);
					mysqli_real_escape_string($con,$_SESSION['u_role']=$u_role);
					
					header("Location:screen/");
				}
				
				
	}

else {
	?><script>alert('Invalid Username Or Password');</script><?php
	header("Refresh:0; url='login.html'");


}

?>