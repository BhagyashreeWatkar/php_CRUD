<?php
 include 'server.php';

 if(isset($_GET['edit']))
 {
 	$id=$_GET['edit'];
    $edit_state = true;
 	$rec = mysqli_query($db,"select * from info where id=$id");
 	$record = mysqli_fetch_array($rec);
 	$name=$record['name'];
 	$address=$record['address'];
 	$id=$record['id'];
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>address</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row=mysqli_fetch_array($results))
		 {
		?>
			<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
			
			<td><a href="server.php?del=<?php echo $row['id'];?>">Delete</a></td>
			</tr>
		<?php } ?>
		
	</tbody>
</table>

<form method="post" action="server.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<label>Name</label>
	<input type="text" name="name" value="<?php echo $name ?>"><br><br>
	<label>Address</label>
	<input type="text" name="address" value ="<?php echo $address; ?>"><br>
	<?php if($edit_state==false): ?>
	<button type="submit" name="save" class="btn">Save</button>
	<?php else: ?>
		<button type="submit" name="update" class="btn">Update</button>
	<?php endif ?>
</form>
</body>
</html>