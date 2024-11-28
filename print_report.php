
<?php

require("db/db.php");
if(isset($_POST['btn']))
{ 
$pat_id=$id;

$sel=mysqli_query($con,"select * from patients,doctors where patients.dr_id=doctors.dr_id and patients.pat_id=$pat_id");
			while($row=mysqli_fetch_assoc($sel))
			{
				$name=$row['pat_name'];
				$pat_address=$row['pat_address'];
				$mobile=$row['mobile'];
				$dated=$row['dated'];
				$age=$row['age'];
				$gender=$row['gender'];
				$father=$row['father'];
				$specimen=$row['specimen'];
				$address=$row['pat_address'];
				$doctor=$row['dr_name'];
				$barcode=$row['barcode'];
			}
	
?>
<style>
#left
{
	width:50%;
	height:100px;
	float:left;
	
	background-size: 50% 100%;
	background-repeat: no-repeat;
	
}
#right
{
	width:50%;
	height:100px;
	float:right;
	text-align:center;
}
@media print {
  div {
    break-inside: avoid;
  }
}


</style>


	<?php
	

$pp=mysqli_query($con,"select * from patient_test,sub_cat,main_cat,reports 
			where
			patient_test.test_id=sub_cat.cat_id and 
			main_cat.cat_id=sub_cat.cat_id and 
			reports.pat_id='$pat_id' and 
			reports.sub_cat_id=sub_cat.sub_cat_id 
			group by main_cat.cat_id
			");

if(mysqli_num_rows($pp)==0){
	echo "<h1 align='center'>No Test Report found for this Patient.</center></h1>";
}
else{
	?>
	
	
		
	<?php
		
		while($row2=mysqli_fetch_array($pp)){
		
		$cat_name=$row2['cat_name'];
		$cat_id=$row2['cat_id'];
		?>
		<div class="container">
		<table class="table table-bordered" width="50%">
			<thead> 
			<tr>
				<th style="text-transform:uppercase;" colspan="4"><?php echo $cat_name;?> REPORT</th>					
			</tr>
			 
			
			 
			  <tr style="background:lightblue;">
			  <th>Tests</th><th>Normal Range</th><th>Unit</th><th>Result</th>
			  </tr>
			  </thead><tbody>
			<?php
			$pp2=mysqli_query($con,"select * from sub_cat,reports 
			where
			reports.pat_id='$pat_id' and 
			reports.cat_id='$cat_id' and 
			reports.sub_cat_id=sub_cat.sub_cat_id 
		
			");
			 
		while($rr=mysqli_fetch_array($pp2))
		{
			$sub_name=$rr['sub_name'];
			$remarks=$rr['remarks'];
			$normal_range=$rr['normal_range'];
			if($remarks!=''){
		?>
			
			
		
	<tr>
		<td><?php echo $sub_name;?></td>
		<td><?php echo $normal_range;?></td>
		<td>Unit</td>
		<td><?php echo $remarks;?></td>
	</tr>
			  
			  <?php }?>
		
		<?php } ?>
		</tbody>
		</table></div>
		<br>
		<?php
		
	}
	?>
			
<?php 
}}

?>
