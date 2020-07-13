<?php
    include "../config.php";
        
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
	mysqli_set_charset($conn,"utf8");
        
    $sql = "SELECT * FROM essay";
    $result = $conn->query($sql);
        
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            echo "<p>标题: ".$row["title"]."&nbsp;&nbsp;&nbsp;&nbsp;作者: ".$row["nickname"]."</p><p>内容: ".$row["content"]."</p><div class='mdui-divider'></div>";
        }
    } else {
        echo "<p>0 结果</p>";
    }
    $conn->close();
?>