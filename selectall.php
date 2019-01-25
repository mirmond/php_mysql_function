<html>
<body>
<?php
$conn = mysqli_connect(
	'localhost',	// DBserver ip
	'mysqluser',	// DBUser
	'passwd',		// DBUser passwd
	'database');	// database
$table = Array('BookTable','UserTable','BuyApplyTable','LoanRecord','History'); //database table
for ($i = 0, $size = sizeof($table); $i<$size; ++$i){
	$sql = "SELECT * FROM {$table[$i]}";
	$result = mysqli_query($conn, $sql);
	echo "<table border='1'>";
	echo "<caption>{$sql}</caption>";
	$filds = mysqli_query($conn,"desc {$table[$i]}");
	while($fild = mysqli_fetch_array($filds)){
		echo "<th>{$fild[0]}</th>";
	}
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		for ($j=0; $j<mysqli_num_fields($result); $j++){
			echo "<td>{$row[$j]}</td>";
		}
		echo "</tr>";
	}
	echo "</table><hr>";
}
?>
</body>
</html>
