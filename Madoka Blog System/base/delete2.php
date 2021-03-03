<?php
	include "../config.php";
	
	$comment=$_POST["comment"];
	 
	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	$sql = "delete from comment where comment='$comment'";
	 
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('评论删除成功');location.href='../index.php';</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	 
	$conn->close();
?>