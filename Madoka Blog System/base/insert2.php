<?php		
	date_default_timezone_set("Asia/Shanghai");
	include "../config.php";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	$nickname=$_POST["nickname"];
	$title=$_POST["title"];
	$comment=$_POST["comment"];

	$sql_ban = "select * from blackbox where nickname='$nickname'";
	$result_ban = $conn->query($sql_ban);
	
	if ($result_ban->num_rows > 0) {
		echo "<script>alert('您已被关进小黑屋，无法发表评论，请联系管理员了解更多信息');location.href='../index.php';</script>";
		exit();
	}
	
	// 查询今天是否发表过评论
	$date = date('Y-m-d',time());
	 
	$sql = "select * from comment where nickname = '$nickname' and date like '{$date}%'";
	$result = $conn->query($sql);
	
	// 今天发表过 2 次以上的评论
	if ($result->num_rows > 2) {
		$sql = "insert into comment (nickname,title,comment,date) values ('$nickname','$title','$comment',now())";
	 
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert('新评论提交成功');location.href='../index.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	// 今天前 3 次发表评论经验 + 1
	else {
		$sql2 = "insert into comment (nickname,title,comment,date) values ('$nickname','$title','$comment',now())";
		
		if ($conn->query($sql2) === TRUE) {
			
			$sql3 = "select experience from points where nickname = '$nickname'";
			$res3 = $conn->query($sql3);
			
			if ($res3->num_rows > 0) {
				while($row = $res3->fetch_assoc()) {
					$e = $row["experience"];
				}
			}
			$e += 1;
			
			$sql4 = "update points set experience = '$e' where nickname = '$nickname'";
			if ($conn->query($sql4) === TRUE) {
				echo "<script>alert('新评论提交成功，经验 + 1');location.href='../index.php';</script>";
			}
			
		} else {
			$cuser->state = "失败";
		}
	}
	
	$conn->close();
?>