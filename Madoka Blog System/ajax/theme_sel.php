<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
	$nickname = $_GET["name"];
	$theme;
	
	$sql = "select theme from theme where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$theme = $row["theme"];
		}
	} else {
		$theme = "默认";
	}
	
	echo json_encode($theme,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>