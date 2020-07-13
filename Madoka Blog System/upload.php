<?php
	include "config.php";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	// 允许上传的图片后缀
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);

	// 获取文件后缀名
	$extension = end($temp);     
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 1048576)   // 小于 1 mb
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "错误：: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			$name=$_POST["name"];
			
			$mess = "文件原名: " . $_FILES["file"]["name"] . "\\r"
			."文件命名·: " . $name . "\\r"
			."文件类型: " . $_FILES["file"]["type"] . "\\r"
			."文件大小: " . ($_FILES["file"]["size"] / 1024) . " kb\\r";
			//echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
			
			// 将文件上传到 upload 目录
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
			//echo "文件存储在: " . "upload/" . $_FILES["file"]["name"]. "<br>";
			
			$nickname=$_POST["nickname"];
			
			// 数据库保存名字添加用户标记
			$name=$nickname.$name;
			
			// 查询用户的等级
			$sql = "select lv from points where nickname = '$nickname'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$lv = $row["lv"];
				}
			} else {
				$lv = 1;
			}
			
			// 判断是否重名的全局变量
			$cmp = false;
			
			// 查询当前已上传的文件
			$quota = 0;
			
			$sql2 = "select path,name from uploads where nickname = '$nickname'";
			$result2 = $conn->query($sql2);
			
			if ($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {
					$quota += 1;
					// 如果存在重名就退出循环
					if(strcmp($name,$row["name"]) == 0){
						$cmp = true;
						break;
					}
				}
			} else {
				$quota = 0;
			}
			
			// 如果已上传的文件数量小于用户的等级或者存在重名的情况
			if($quota < $lv || $cmp == true){
				
				$path = "./upload/".$name.".jpg";
				
				// 如果存在重名就更新数据库
				if($cmp == true){
					$sql3 = "update uploads set path='$path' where nickname = '$nickname' and name = '$name'";
					if ($conn->query($sql3) === TRUE) {
						$mess .= "数据库更新完成\\r";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				// 否则插入数据库
				}else {
					$sql3 = "insert into uploads (path,name,nickname) values ('$path','$name','$nickname')";
					if ($conn->query($sql3) === TRUE) {
						$mess .= "数据库插入完成\\r";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				
				$conn->close();
				
				//	读取并创建上传图片的实例
				$src_path = 'upload/'.$_FILES["file"]["name"];
				$src = imagecreatefromstring(file_get_contents($src_path));
				 
				//	裁剪区域左上角的点的坐标
				$x = 0;
				$y = 0;

				//	裁剪区域的宽和高
				if(imagesx($src) <= imagesy($src)){
					$width = imagesx($src);
				}else{
					$width = imagesy($src);
				}
				$height = $width;
				
				//	裁剪后的新图片的宽和高
				if($width > 1000){
					$final_width = 1000;
				}else{
					$final_width = $width;
				}
				$final_height = round($final_width * $height / $width);
				
				//	将裁剪区域复制到新图片上，并根据源和目标的宽高进行缩放或者拉升
				$new_image = imagecreatetruecolor($final_width, $final_height);
				imagecopyresampled($new_image, $src, 0, 0, $x, $y, $final_width, $final_height, $width, $height);
				
				// 将裁剪后的新图片保存，并删除原图片
				imagejpeg($new_image,$path);
				imagedestroy($src);
				imagedestroy($new_image);
				unlink("upload/".$_FILES["file"]["name"]);
				echo "<script>alert('".$mess."图片上传成功');location.href='index.php';</script>";
			}else{
				echo "<script>alert('上传配额已满');location.href='index.php';</script>";
				unlink("upload/".$_FILES["file"]["name"]);
			}
		}
	}
	else
	{
		echo "<script>alert('不合法的文件格式，请检查上传文件的类型和大小');location.href='index.php';</script>";
		echo "非法的文件格式";
	}
?>