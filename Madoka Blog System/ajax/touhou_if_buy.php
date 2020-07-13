<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
    } 
    mysqli_set_charset($conn,"utf8");
	
    $nickname = $_GET["name"];

	// 只能查找和购买东方主题，其他购买主题不支持
	$sql3 = $sql3 = "select touhou from theme where nickname = '$nickname'";
    $result3 = $conn->query($sql3);
    
    if ($result3->num_rows > 0) {
        while($row3 = $result3->fetch_assoc()) {
            $touhou = $row3["touhou"];
            if($touhou == 0){
                $state = "没有购买东方系列";
            }else{
                $state = "已经购买东方系列";
            }
        }
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	
	echo json_encode($state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>