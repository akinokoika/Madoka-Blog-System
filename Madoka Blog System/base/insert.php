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
	$content=$_POST["content"];
	$time=$_POST["time"];
	
	// 查询今天是否发表过文章
	$date = date('Y-m-d',time());
	 
	$sql = "select * from essay where nickname = '$nickname' and date like '{$date}%'";
	$result = $conn->query($sql);
	
	// 今天发表过 0 次以上的文章
	if ($result->num_rows > 0) {
		$sql = "insert into essay (title,content,nickname,date) values ('$title','$content','$nickname',now())";
	 
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert('新文章提交成功');location.href='../index.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	// 今天第一次发表文章经验 + 5
	else {
		$sql2 = "insert into essay (title,content,nickname,date) values ('$title','$content','$nickname',now())";
		
		if ($conn->query($sql2) === TRUE) {
			
			$sql3 = "select experience from points where nickname = '$nickname'";
			$res3 = $conn->query($sql3);
			
			if ($res3->num_rows > 0) {
				while($row = $res3->fetch_assoc()) {
					$e = $row["experience"];
				}
			}
			$e += 5;
			
			$sql4 = "update points set experience = '$e' where nickname = '$nickname'";
			if ($conn->query($sql4) === TRUE) {
				echo "<script>alert('新文章提交成功，经验 + 5');location.href='../index.php';</script>";
			}
			
		} else {
			$cuser->state = "失败";
		}
	}
	
	$conn->close();
?>