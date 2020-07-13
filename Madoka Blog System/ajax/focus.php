<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	class cuser {
		public $state = "";
	}
	$cuser = new cuser();
	
	$name = $_GET["name"];
	$nickname = $_GET["nickname"];
	
	$sql = "select * from follow where name = '$name' and nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$cuser->state = "已经关注 ".$name;
		}
	} else {
		$sql2 = "insert into follow (name,nickname) values ('$name','$nickname')";
		
		if ($conn->query($sql2) === TRUE) {
			$cuser->state = $name." 关注成功";
		}
		else {
			$cuser->state = $name." 关注失败";
		}
	}
	
	echo json_encode($cuser,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>