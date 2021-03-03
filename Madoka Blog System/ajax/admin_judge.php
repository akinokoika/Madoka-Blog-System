<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
	$nickname = $_GET["nickname"];
	
	$sql = "select * from admin where nickname='$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		$admin = 1;
	} else {
		$admin = 0;
	}
	
	echo json_encode($admin,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>