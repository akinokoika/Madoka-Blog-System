<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
	$nickname = $_GET["name"];
	$card = $_GET["card"];
	
	$sql = $sql = "update userinfo set card='$card' where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
		$state = "卡片更新成功，刷新页面后可见";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	echo json_encode($state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>