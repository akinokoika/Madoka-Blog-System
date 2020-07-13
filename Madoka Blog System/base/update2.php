<?php
	include "../config.php";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	$nickname = $_POST["nickname"];
	$old_password = $_POST["old_password"];
	$new_password = $_POST["new_password"];
	
	$sql = "select password from user where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if(!password_verify($old_password,$row["password"])){
				echo "<script>alert('旧密码输入错误，修改失败');location.href='../index.php';</script>";
			}else{
				$encryption_pass = password_hash($new_password,PASSWORD_BCRYPT);
				$sql = "update user set password='$encryption_pass' where nickname = '$nickname'";
				
				if ($conn->query($sql) === TRUE) {
					echo "<script>alert('密码修改成功，下次登录请使用新密码');location.href='../index.php';</script>";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}
	}
	
	
	$conn->close();
?>