<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
    } 
    mysqli_set_charset($conn,"utf8");
	
    $nickname = $_GET["name"];
    $title = $_GET["title"];
	
	$sql = $sql = "select * from thumbs where nickname = '$nickname' and title = '$title'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$state = "已经点过赞";
		}
	} else {

        $sql2 = "insert into thumbs (title,nickname) values ('$title','$nickname')";
	 
		if ($conn->query($sql2) === TRUE) {

            $sql3 = $sql3 = "select thumbs from essay where title = '$title'";
            $result3 = $conn->query($sql3);
            
            if ($result3->num_rows > 0) {
                while($row3 = $result3->fetch_assoc()) {
                    $thumb = $row3["thumbs"];
                    $thumb += 1;

                    $sql4 = $sql4 = "update essay set thumbs='$thumb' where title = '$title'";
                    $result4 = $conn->query($sql4);

                    if ($conn->query($sql4) === TRUE) {
                        $state = "点赞成功";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }

		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
        }
	}
	
	echo json_encode($state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>