<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");

	$content = $_GET["content"];
	$name = $_GET["name"];
    $nickname = $_GET["nickname"];
	
	$sql = "insert into letter (content,name,nickname,time) values ('$content','$name','$nickname',now())";
	 
	if ($conn->query($sql) === TRUE) {
		$state = "私信发送成功";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	echo json_encode($state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>