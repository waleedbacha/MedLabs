<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MedLabS</title>
    <?php include("include/head.php");?>
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 60%;  
  border-radius: 30%; 
  border: 10px solid lightgray;
  
  body{
				
				background-color:#071952;
				color:white;
				background-repeat:no-repeat;
				background-size:100%;
				

			}
			input[type="text"],input[type="password"]{
				background-color:transparent;
				color:white;
				
			}
			.input-group-addon{
				background-color:#000;
				color:#fff;				
			}
			.footer{
				color:#000;
			}
}
</style>  </head>
  <body class="bg-primary">
<div class="container-fluid">
<div class="table-reponsive">
<?php include("include/menubar.php");?>

<img src="images/banner2.png"  id="hide_upd">

<br><br><br>
 <div class="row">
  <div class="col-sm-12">
<div class="container-flude">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fm">
    <div class="input-group input-group-lg">
      <input type="number" min='0' maxlength="25" name="id" class="form-control txb" placeholder="Search Test Records / Information by Typing M.R.No / Lab No..." autofocus>
      <span class="input-group-btn">
        <button class="btn btn-danger" name="btn" type="submit">
		<span class="glyphicon glyphicon-search"></span> 
		<span class="hidden-xs">Search Test Report Result</span></button>
      </span>
    </div>
  </div>
  </form> 
</div>

</div>
</div>
	
<?php ob_start();

	require("db/db.php");?>
	
<script src="../js/jquery.js"></script>
	
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/adminstyle.css">
	
<?php
if(isset($_POST['btn']))
{ ?>
<script>
$('document').ready(function(){	
	$('#hide_upd').hide();
});
</script>
<?php
$id = "";
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $id = test_input($_POST["id"]);
}

$check=mysqli_query($con,"select * from patients where pat_id='$id'");
if(mysqli_num_rows($check)==0)
{
?><script>alert('Record Not Found for this M.R.No./ Lab No Please Type Correct M.R.No to Search...');</script><?php
header("Refresh:0; url='index.php'");
exit();
}
?>

		<div id="content">	
<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			
					<h2 class="page-title">Patient Records.</h2>
				
				<div class="panel-body">
	
				<table class="table table-bordered">
				<thead>
	<tr  class="dt-col">
		<td>Patient Id</td>
		<td>Patient Name</td>
		<td>Address</td>
		<td>Refer by</td>
		<td>Date</td>
		
	</tr>
	</thead>
	<tbody>
		<?php
		$sel=mysqli_query($con,"select * from patients,doctors where pat_id='$id' and patients.dr_id=doctors.dr_id");
	while($row=mysqli_fetch_array($sel)){
		
		$pat_id=$row['pat_id'];
		$pat_name=$row['pat_name'];
		$address=$row['pat_address'];
		$dr=$row['dr_name'];
		$date=$row['dated'];
		
}		
		?>
			<tr>
				<td ><?php echo $pat_id;?></td>
				<td><?php echo $pat_name;?></td>
				<td><?php echo $address;?></td>
				<td><?php echo $dr;?></td>
				<td><?php echo $date;?></td>
			</tr>
			</tbody>
		</table>
						
</div>	
</div>	
</div>
<?php require("print_report.php");?>

<?php } ?>

	
	
 <div class="row animated fadeInLeft" id="about">
 
 
 </div>
 
 

      
		
    <?php// include("include/slide3.php");?>
	<br>
	<br>
	<br>
	<br>
<?php require("footer.php");?>
  
</div>
</div>
  </body>
</html>

