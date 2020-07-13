<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
    } 
    mysqli_set_charset($conn,"utf8");
	
    $nickname = $_GET["name"];
    $need_points = intval($_GET["points"]);

    // 查找积分
    $sql = "select points from points where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$points = $row["points"];
		}
	} else {
		$points = 0;
    }
    
    if($points >= $need_points){
        // 只能查找和购买东方主题，其他购买主题不支持
        $sql3 = "select touhou from theme where nickname = '$nickname'";
        $result3 = $conn->query($sql3);
        
        if ($result3->num_rows > 0) {
            while($row3 = $result3->fetch_assoc()) {
                $touhou = $row3["touhou"];
                if($touhou == 0){
                    $touhou += 1;

                    $sql4 = "update theme set touhou='$touhou' where nickname = '$nickname'";

                    if ($conn->query($sql4) === TRUE) {
                        $state = "购买成功";

                        $count = $points - $need_points;
                        $sql5 = "update points set points='$count' where nickname = '$nickname'";
                        $conn->query($sql5);
                        
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }else{
                    $state = "已经买过这个主题";
                }
            }
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $state = "积分不够";
    }

	echo json_encode($state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>