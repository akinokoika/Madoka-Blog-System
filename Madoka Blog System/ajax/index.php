<?php
date_default_timezone_set("Asia/Shanghai");
switch($_GET["action"]){
	case "now": {
		class now {
			public $year = "";
			public $month = "";
			public $day = "";
		}
		$now = new now();
		$now->year = date("Y");
		$now->month = date("m");
		$now->day = date("d");
		
		// 使用ajax返回json数据
		echo json_encode($now);
		break;
	}
}
?>