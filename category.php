<select name="cat" class="form-control" >
<option value="">**Select Category**</option>

<?php
include("../connection/connection.php");
include("../connection/connection.php");
$s=mysql_query("select * from books_category");
while($c=mysql_fetch_array($s))
{
?>
  <option value="<?php echo $c['subjects']; ?>"><?php echo $c['subjects']; ?></option>
<?php
}
?>
  </select>

