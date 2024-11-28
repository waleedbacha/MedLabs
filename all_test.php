<?php include("include/head.php");?>
	  <?php include("include/menubar.php");?>
	<?php require("db/db.php");?>

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<h2 class="page-title" style="color:white;">All Test Price List</h2>
		<table id="myTable" class="table table-hover table-condensed table-striped  animated zoomIn">
	<thead>
	<tr style="color:white;">
		<th>S:NO</th>
		<th>TEST NAME</th>
		<th>TEST PRICE</th>
		</tr>
		</thead>
	<tbody>
<?php
	$sno=1;
	$sel=mysqli_query($con,"select * from main_cat");
	while($row=mysqli_fetch_array($sel)){
		$test_id=$row['cat_id'];
		$test_name=$row['cat_name'];
		$test_price=$row['price'];
		
		echo "<tr>";
			echo "<td class='tab-dat dt-col'>$sno</td>";
			echo "<td>$test_name</td>";
			echo "<td>$test_price</td>";
		echo "<tr>";
		$sno++;
	}
?>
</tbody>
		</table>
			
	</div>
</div>
</div>



<script>
$(document).ready(function(){

		$('#myTable').DataTable();
});
</script>