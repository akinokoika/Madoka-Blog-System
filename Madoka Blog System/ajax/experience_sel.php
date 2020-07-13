<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
	$nickname = $_GET["name"];
	$experience;
	
	$sql = "select experience from points where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$experience = $row["experience"];
		}
	} else {
		$experience = 0;
	}
	
	echo json_encode($experience,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>