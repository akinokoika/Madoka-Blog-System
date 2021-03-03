<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
    $list = array();
    $sql= "select nickname from user";

    $result = $conn->query($sql);
    $i = 0;
    while($row = mysqli_fetch_row($result))
    {
        $nickname = $row[0];
        $list[$i]["nickname"] = $nickname;

        $sql2 = "select * from blackbox where nickname='$nickname'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $list[$i]["state"] = "checked";
        } else {
            $list[$i]["state"] = "";
        }
        $i++;
    }
	
	echo json_encode($list,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>