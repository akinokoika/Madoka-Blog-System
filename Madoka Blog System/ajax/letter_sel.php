<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
	$name = $_GET["name"];
	
	$sql = "select content from letter where name = '$name'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$content = $row["content"];
		}
	} else {
		$content = "";
	}
	
	echo json_encode($content,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>