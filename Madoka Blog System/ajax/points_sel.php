<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
	$nickname = $_GET["name"];
	$points;
	
	$sql = "select points from points where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$points = $row["points"];
		}
	} else {
		$points = 0;
	}
	
	echo json_encode($points,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>