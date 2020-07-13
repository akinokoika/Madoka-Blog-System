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
		}
	} else {
		$bg = 0;
    }
    
    if($bg == 0){
        $bg = 1;
        $state = "switch to bg2";
    }else{
        $bg = 0;
        $state = "switch to bg1";
    }
    
    $sql2 = "update theme set touhoubg ='$bg' where nickname = '$nickname'";
    $conn->query($sql2);
    
	if ($conn->query($sql2) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	echo json_encode($state,JSON_UNESCAPED_UNICODE);
	
	$conn->close();
?>