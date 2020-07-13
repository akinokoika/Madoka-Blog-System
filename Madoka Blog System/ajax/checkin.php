<?php
	date_default_timezone_set("Asia/Shanghai");
	include "../config.php";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	// 创建状态类
	class cuser {
		public $state = "";
	}
	$cuser = new cuser();
	
	// 当前用户
	$nickname = $_GET["name"];
	// 当前时间
	$date = date('Y-m-d',time());
	 
	// 查询今天是否签到
	$sql = "select * from checkin where nickname = '$nickname' and ctime like '{$date}%'";
	$result = $conn->query($sql);
	
	// 如果已经签到
	if ($result->num_rows > 0) {
		$cuser->state = "今天已经签到";
	}
	// 如果没有签到
	else {
		$sql2 = "insert into checkin (nickname,ctime) values ('$nickname',now())";
		
		if ($conn->query($sql2) === TRUE) {
			$cuser->state = "签到成功";
			
			// 取得积分
			$sql3 = "select points,experience from points where nickname = '$nickname'";
			$res3 = $conn->query($sql3);
			
			if ($res3->num_rows > 0) {
				while($row = $res3->fetch_assoc()) {
					$p = $row["points"];
					$e = $row["experience"];
				}
			}
			// 积分 + 3
			$p += 3;
			$e += 3;
			
			// 修改积分
			$sql4 = "update points set points = '$p',experience = '$e' where nickname = '$nickname'";
			if ($conn->query($sql4) === TRUE) {
				$cuser->state = "签到成功，积分 + 3，经验 + 3";
			}
			
		} else {
			$cuser->state = "签到失败";
		}
	}
	
	echo json_encode($cuser,JSON_UNESCAPED_UNICODE) ;
	
	$conn->close();
?>