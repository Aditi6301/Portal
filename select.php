<table border="2">
<tr>
<th>ID</th>
<th>Image</th>
</tr>
<?php
include "dbConn.php";
$select = $conn->prepare("SELECT * FROM listing ");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
while($data=$select->fetch()){
?><tr>
<td><?php echo $data['user_id']; ?></td>
<td><img src="uploads/<?php echo $data['image']; ?>" width="100" height="100"></td>
<?php
}?>
</tr></table>
<a href="tables2.php">Add new image</a>