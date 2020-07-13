<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
	<title>游客 index</title>
	<link href="../images/favicon.ico" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="../mdui/css/mdui.css">
    <link rel="stylesheet" type="text/css" href="../mdui/css/mdui.min.css">
    <script src="../mdui/js/mdui.js"></script>
    <script src="../mdui/js/mdui.min.js"></script>
	<style>
	.mdui-row > [class*="mdui-col-"] {
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #E8EAF6;
		border: 1px solid #C5CAE9;
		margin-bottom: 8px;
	}
	.mdui-row2 > [class*="mdui-col"] {
		padding-top: 10px;
		padding-bottom: 10px;
		border: 1px solid #C5CAE9;
		margin-top: 8px;
		margin-bottom: 8px;
	}
	</style>
</head>
</head>
<body>
当前状态： <?php echo "游客" ?>
<a style="margin-left: 20px;" href="login.html" >登录</a>
<img style="height:80px;width:100%" id="banner" src="../images/banner.png">
<div class="mdui-container">
	<div class="mdui-tab mdui-tab-full-width" id="tab" mdui-tab>
		<a href="#tab1-content" id="tab1" class="mdui-ripple mdui-tab-active">文章首页</a>
		<a href="#tab2-content" id="tab2" class="mdui-ripple" disabled>文章管理</a>
		<a href="#tab3-content" id="tab3" class="mdui-ripple" disabled>系统管理</a>
	</div>

	<div class="mdui-row mdui-p-a-2" id="tab1-content">
		<div class="mdui-col-xs-12">
			<div class="mdui-row-xs-2">
				<div class="mdui-col">
				<button class="mdui-btn mdui-btn-block mdui-color-red-accent mdui-ripple" disabled>点击查看当前用户的文章</button>
				</div>
				<div class="mdui-col">
				<button onclick="all_show()" class="mdui-btn mdui-btn-block mdui-color-red-accent mdui-ripple">点击查看所有文章</button>
				</div>
				<script>
				function all_show () {
					document.getElementById("all_content1").removeAttribute("hidden");
					document.getElementById("nick_content1").setAttribute("hidden",true);
				}
				</script>
			</div>
			<div class="mdui-row2" >
			<div class="mdui-col-xs-12 mdui-color-light-blue-100" >
				<div id="all_content1" hidden>
				<?php
					include "visitor.php";
				?>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="mdui-row mdui-p-a-2" id="tab2-content">
		<div class="mdui-col-xs-12">content</div>
	</div>
	<div class="mdui-row mdui-p-a-2" id="tab3-content">
		<div class="mdui-col-xs-12">content</div>
	</div>
</div>
</body>
</html>