<?php
	class user {
			public $name = "";
			public $pic = "";
			public $title = "";
			public $content = "";
		}
		
	$user = new user();
		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	$nickname;
	
	$sql = "select * from user order by id desc limit 1";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$user->name = $row["nickname"];
			//echo $row["id"].",".$row["username"].",".$row["nickname"];
			$nickname = $row["nickname"];
		}
	} else {
		echo "0 结果";
	}
	
	$sql = "select pic from userinfo where nickname = '$nickname'";
	$result = $conn->query($sql);
	 
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$user->pic = $row["pic"];
		}
	} else {
		$user->pic = "./images/icon1.jpg";
	}
	
	$sql = "select title,content from essay order by id desc limit 1";
	$result = $conn->query($sql);
	 
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$user->title = $row["title"];
			$user->content = $row["content"];
		}
	}
	
	echo json_encode($user,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>