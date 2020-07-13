<?php		
	include "../config.php";
	 
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	mysqli_set_charset($conn,"utf8");
	
	$nickname = $_GET["name"];
	
	$sql = "select touhoubg from theme where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
            $bg = $row["touhoubg"];
			if($bg==0){
                $bg_state = "bg1";
            }else{
                $bg_state = "bg2";
            }
		}
	} else {
		$bg_state = "bg1";
	}
	
	echo json_encode($bg_state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>