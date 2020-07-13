<?php 
session_start(); 
session_destroy();
echo json_encode("注销成功",JSON_UNESCAPED_UNICODE);
//echo "<script>alert('注销成功');location.href='index.php';</script>";
?> 