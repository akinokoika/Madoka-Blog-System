<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	class state {
		public $lv = "";
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
	
	echo json_encode($state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>