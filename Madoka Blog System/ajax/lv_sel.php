<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	class state {
		public $lv = "";
		public $quota = 0;
	}
	$state = new state();
	
	$nickname = $_GET["name"];
	
	// 查询当前等级
	$sql = "select lv from points where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$state->lv = $row["lv"];
		}
	} else {
		$state->lv = 1;
	}
	
	// 查询当前已上传的文件数量
	
	$sql2 = "select path from uploads where nickname = '$nickname'";
	$result2 = $conn->query($sql2);
	
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
			$state->quota += 1;
		}
	} else {
		$state->quota = 0;
	}
	
	echo json_encode($state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>