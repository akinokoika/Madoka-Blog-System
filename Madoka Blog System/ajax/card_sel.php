<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	$nickname = $_GET["name"];
	
	$sql = "select card from userinfo where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$card = $row["card"];
		}
	} else {
		$card = "./images/bg10.jpg";
	}
	
	echo json_encode($card,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>