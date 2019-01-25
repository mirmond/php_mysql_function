<html>
<body>
<?php
$conn = mysqli_connect(
	'localhost',	// DBserver ip
	'mysqluser',	// DBUser
	'passwd',		// DBUser passwd
	'database');	// database
$table = Array('BookTable','UserTable','BuyApplyTable','LoanRecord','History'); //database table
for($i=0,$size=sizeof($table); $i<$size;++$i){
	echo "<table border='1'>";
	$sql = "desc ${table[$i]}";
	echo "<caption>{$sql}</caption>";
	$result = mysqli_query($conn, $sql);
	echo "<th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		for($j=0; $j<mysqli_num_fields($result); $j++){
			echo "<td>{$row[$j]}</td>";
		}
		echo "</tr>";
	}
	echo "</table><hr>";
}
?>
</body>
</html>
