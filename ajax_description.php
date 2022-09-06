<html>
<head>
<style>
table {
	width: 100%;
	border-collapse: collapse;
}

table, td, th {
	border: 1px solid black;
	padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
include('connection.php');

$q = $_GET['q'];



$sql="SELECT product_name, product_price, product_description, product_rating  from product WHERE `categories`='$q'";
$result = mysqli_query($conn,$sql);
echo "<table>
<tr>
<th>NAME</th>
<th>PRICE</th>
<th>DESCRIPTION</th>
<th>RATING</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" . $row['product_name'] . "</td>";
	echo "<td>" . $row['product_price'] . "</td>";
	echo "<td>" . $row['product_description'] . "</td>";
	echo "<td>" . $row['product_rating'] . "</td>";
	
?>	<td> <a href="whistlist.php?product_id=<?php echo $product_details['product_id'];?>">like</a> </td> 
	<td>  <a href='#'>buy</a> </td>    <?php
	echo "</tr>";
}
echo "</table>";

?>
</body>
</html>
