<?php
	include "../config.php";
	
	$nickname=$_POST["nickname"];
	$pic=$_POST["pic"];
	$email=$_POST["email"];
	$bday=$_POST["bday"];
	$city=$_POST["city"];
	$sex=$_POST["sex"];
	$qq=intval($_POST["qq"]);
	$age=intval($_POST["age"]);
	$mess=$_POST["mess"];

	$card = "../images/bg10.jpg";
	 
	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8"); 
	
	$sql = "select * from userinfo where nickname = '$nickname'";
	$result = $conn->query($sql);
	 
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sql = "update userinfo set pic='$pic',email='$email',bday='$bday',city='$city',sex='$sex',qq=$qq,age=$age,mess='$mess' where nickname='$nickname' ";
			if ($conn->query($sql) === TRUE) {
				echo "<script>alert('个人信息修改成功');location.href='../index.php';</script>";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	} else {
		$sql = "insert into userinfo (nickname, pic, email, bday, city, sex, qq, age, mess, card) 
		values ('$nickname', '$pic', '$email', '$bday', '$city', '$sex', $qq, $age, '$mess', '$card')";
		 
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert('个人信息提交成功');location.href='../index.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	 
	$conn->close();
?>