<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
    $admin_name = $_GET["admin_name"];
	$nickname = $_GET["nickname"];
    $sel = $_GET["sel"];

    $sql = "select * from admin where nickname='$admin_name'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {

        if($sel == 1)
        {
            $sql = "select * from blackbox where nickname='$nickname'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {

            } else {
                
                $sql = "insert into blackbox (nickname) values ('$nickname')";
                if ($conn->query($sql) === TRUE) {
                    $state = $nickname." 已关进小黑屋";
                } else {
                    $state = "失败";
                }
            }   
        }
        if($sel == 0)
        {
            $sql = "select * from blackbox where nickname='$nickname'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                
                $sql = "delete from blackbox where nickname='$nickname'";
                if ($conn->query($sql) === TRUE) {
                    $state = $nickname." 已经恢复正常";
                } else {
                    $state = "失败";
                }
            } else {
                
            }
        }

	} else {
		$state = "您不是管理员，已拒绝操作";
	}

	echo json_encode($state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>