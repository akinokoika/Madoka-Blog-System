<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>info</title>
	<link rel="stylesheet" type="text/css" href="./mdui/css/mdui.css">
    <link rel="stylesheet" type="text/css" href="./mdui/css/mdui.min.css">
    <script src="./mdui/js/mdui.js"></script>
	<script src="./mdui/js/mdui.min.js"></script>
	<script>var $$ = mdui.JQ;</script>
	<style>
		.bg{
			height: 100%;
			width: 100%;
			background: url('./images/bg9.jpg') no-repeat;
			background-size: cover;
			position: absolute;
		}
		.touhou_bg{
			height: 100%;
			width: 100%;
			background: url('./images/touhou/bg_touhou.jpg') no-repeat;
			background-size: cover;
			position: absolute;
		}
		.touhou_bg2{
			height: 100%;
			width: 100%;
			background: url('./images/touhou/bg2_touhou.jpg') no-repeat;
			background-size: cover;
			position: absolute;
		}
	</style>
</head>
<body id="theme_body">
<div class="mdui-container">
	<div class="mdui-row mdui-p-a-2" id="tab3-content">
		<div class="mdui-col-xs-12">
			<div class="mdui-appbar">
			<div class="mdui-tab mdui-color-theme-300" mdui-tab>
				<a id="info_tab1" href="#example5-tab1" class="mdui-ripple mdui-ripple-white">个人首页</a>
				<a id="info_tab1" href="#example5-tab2" class="mdui-ripple mdui-ripple-white">个人相册</a>
				<a href="index.php" class="mdui-ripple mdui-ripple-white">返回首页</a>
			</div>
			</div>
			
			<div id="example5-tab1">
				<div id="info" hidden>
				<?php
				include "config.php";
				
				$nickname = $_REQUEST["name"];
				
				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("连接失败: " . $conn->connect_error);
				} 
				mysqli_set_charset($conn,"utf8");
				 
				$sql = "select nickname,pic,email,bday,city,sex,qq,age,mess from userinfo where nickname = '$nickname'";
				$result = $conn->query($sql);
				 
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo $row["nickname"]."，".$row["pic"]."，".$row["email"]."，".$row["bday"]."，".$row["city"]."，".$row["sex"]."，".$row["qq"]."，".$row["age"]."，".$row["mess"]."，info";
					}
				} else {
					echo "0 结果";
				}
				$conn->close();
				?>
				</div>
				<div id="info_user" hidden>
				<?php
				include "config.php";
				 
				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("连接失败: " . $conn->connect_error);
				} 
				mysqli_set_charset($conn,"utf8");
				
				$nickname = $_REQUEST["name"];
				
				$sql = "select username from user where nickname = '$nickname'";
				$result = $conn->query($sql);
				 
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo $row["username"];
					}
				} else {
					echo "0 结果";
				}
				$conn->close();
				?>
				</div>
				<div id="info_name" hidden>
				<?php echo $_REQUEST["nickname"];?>
				</div>
				
				<div class="mdui-card">
					<div class="mdui-card-header" style="cursor:pointer;">
					<img class="mdui-card-header-avatar" id="pic_info_show" src="./images/icon1.jpg"/>
					<div class="mdui-card-header-subtitle">昵称：</div>
					<div class="mdui-card-header-title" id="nickname_info_show"></div>
					</div>
					
					<div class="mdui-card-media" style="cursor:pointer;">
					<img id="card_pic_info_show" src="./images/bg10.jpg"/>
						<div class="mdui-card-media-covered">
							<div class="mdui-card-primary">
							<div class="mdui-card-primary-title" id="nickname_info_show2"></div>
							<div class="mdui-card-primary-subtitle" id="username_info_show"></div>
							</div>
						</div>
					</div>
					
					<div class="mdui-card-primary">
						<div class="mdui-card-primary-subtitle">邮箱：</div>
						<div class="mdui-card-primary-title" id="email_info_show"></div>
						<div class="mdui-card-primary-subtitle">生日：</div>
						<div class="mdui-card-primary-title" id="bday_info_show"></div>
						<div class="mdui-card-primary-subtitle">城市：</div>
						<div class="mdui-card-primary-title" id="city_info_show"></div>
						<div class="mdui-card-primary-subtitle">性别：</div>
						<div class="mdui-card-primary-title" id="sex_info_show"></div>
						<div class="mdui-card-primary-subtitle">QQ：</div>
						<div class="mdui-card-primary-title" id="qq_info_show"></div>
						<div class="mdui-card-primary-subtitle">年龄：</div>
						<div class="mdui-card-primary-title" id="age_info_show"></div>
					</div>
					
					<div class="mdui-card-content" id="mess_info_show"></div>
					
					<div class="mdui-card-actions">
					<button class="mdui-btn mdui-ripple" onclick="info_focus()">关注</button>
					<button class="mdui-btn mdui-ripple" onclick="letter()">私信</button>
					</div>
				</div>
			</div>
			<div id="example5-tab2" class="mdui-color-theme-50">
				<div class="mdui-row mdui-typo">
					<div class="mdui-col-xs-7" style="margin:10px 0 0 5px;padding:10px 15px">
						<div class="mdui-row-sm-3 mdui-row-md-4 mdui-row-lg-5 mdui-row-xl-6 mdui-grid-list">
						<?php
						include "config.php";
		 
						$conn = new mysqli($servername, $username, $password, $dbname);
						if ($conn->connect_error) {
							die("连接失败: " . $conn->connect_error);
						}
						mysqli_set_charset($conn,"utf8");
						
						$nickname=$_REQUEST["name"];
						
						$sql2 = "select path,name from uploads where nickname = '$nickname'";
						$result2 = $conn->query($sql2);
						
						if ($result2->num_rows > 0) {
							while($row = $result2->fetch_assoc()) {
								$put_name = str_replace($nickname,"",$row["name"]);
								echo "<div class='mdui-col'>
								<div class='mdui-grid-tile'>
									<a href='javascript:;'><img class='mdui-img-rounded' src='".$row["path"]."'/></a>
								</div>
								</div>";
							}
						} else {
							
						}
						
						$conn->close();
						
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	// 输出个人信息
		var info = document.getElementById("info").innerText;
		var info_user = document.getElementById("info_user").innerText;
		//alert(info);
		
		function getStr(string,str){
			var str_before = string.split(str)[0]; 
			var str_after = string.split(str)[1];
			//alert('前：'+str_before+' - 后：'+str_after); 
			return str_before;
		}
		function setinfo(id,info){
			document.getElementById(id).innerHTML = info;
		}
		
		if(info.search("0 结果")!=-1){
			document.getElementById("info_tab1").disabled=true;
		}else{
			document.getElementById("info_tab1").disabled="";
			
			var nickname_info = getStr(info,"，");
			info = info.replace(nickname_info+"，","");
			var pic_info =  getStr(info,"，");
			info = info.replace(pic_info+"，","");
			var email_info =  getStr(info,"，");
			info = info.replace(email_info+"，","");
			var bday_info =  getStr(info,"，");
			info = info.replace(bday_info+"，","");
			var city_info =  getStr(info,"，");
			info = info.replace(city_info+"，","");
			var sex_info =  getStr(info,"，");
			info = info.replace(sex_info+"，","");
			var qq_info =  getStr(info,"，");
			info = info.replace(qq_info+"，","");
			var age_info =  getStr(info,"，");
			info = info.replace(age_info+"，","");
			var mess_info =  getStr(info,"，");
			
			//alert(nickname_info);
			
			setinfo("username_info_show",info_user);
			
			setinfo("nickname_info_show",nickname_info);
			setinfo("nickname_info_show2",nickname_info);
			document.getElementById("pic_info_show").src = pic_info;
			//setinfo("pic_info_show",pic_info);
			setinfo("email_info_show",email_info);
			setinfo("bday_info_show",bday_info);
			setinfo("city_info_show",city_info);
			setinfo("sex_info_show",sex_info);
			setinfo("qq_info_show",qq_info);
			setinfo("age_info_show",age_info);
			setinfo("mess_info_show",mess_info);
		}
		
		function GetQueryString(name) {
			var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
			var r = window.location.search.substr(1).match(reg);
			if (r != null) return unescape(r[2]); return null;
		}
		
		function getUrlParam(key) {
			// 获取参数
			var url = window.location.search;
			// 正则筛选地址栏
			var reg = new RegExp("(^|&)" + key + "=([^&]*)(&|$)");
			// 匹配目标参数
			var result = url.substr(1).match(reg);
			//返回参数值
			return result ? decodeURIComponent(result[2]) : null;
		}

		function theme_ajax(){
			var xmlhttp = new XMLHttpRequest;
			var nickname = getUrlParam("nickname");
			xmlhttp.open("GET","./ajax/theme_sel.php?name="+nickname);
			xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xmlhttp.send();
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					var rst = JSON.parse(xmlhttp.responseText);
					if(rst == "粉色"){
						$$('#theme_body').addClass('bg');
					}
					if(rst == "东方系列"){
						var xmlhttp2 = new XMLHttpRequest;
						var nickname = getUrlParam("nickname");
						xmlhttp2.open("GET","./ajax/touhou_sel.php?name="+nickname);
						xmlhttp2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						xmlhttp2.send();
						xmlhttp2.onreadystatechange = function(){
							if(xmlhttp2.readyState == 4 && xmlhttp2.status == 200){
								var rst = JSON.parse(xmlhttp2.responseText);
								if(rst=="bg1"){
									$$('#theme_body').addClass('touhou_bg');
								}else{
									$$('#theme_body').addClass('touhou_bg2');
								}
							}
						}
					}
				}
			}
		}
		window.onload = theme_ajax();

		function set_theme(){
			var theme = getUrlParam("theme");
			document.getElementsByTagName("body")[0].classList.add("mdui-theme-primary-"+theme);
			document.getElementsByTagName("body")[0].classList.add("mdui-theme-accent-"+theme);
		}
		window.onload = set_theme();
		
		function info_focus(){
			var xmlhttp = new XMLHttpRequest;
			//var name = document.getElementById("nickname_info_show").innerText;
			//var nickname = document.getElementById("info_name").innerText;
			var name = getUrlParam("name");
			var nickname = getUrlParam("nickname");
			if(name == nickname){
				mdui.alert("不能关注自己");
			}else{
				xmlhttp.open("GET","./ajax/focus.php?name="+name+"&nickname="+nickname);
				xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xmlhttp.send();
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						var rst = JSON.parse(xmlhttp.responseText);
						if(rst.state.indexOf("已经关注") != -1){
							mdui.confirm(rst.state+'，是否取消关注？',nickname, function(){
								var xmlhttp2 = new XMLHttpRequest;
								xmlhttp2.open("GET","./ajax/focus_del.php?name="+name+"&nickname="+nickname);
								xmlhttp2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
								xmlhttp2.send();
								xmlhttp2.onreadystatechange = function(){
									if(xmlhttp2.readyState == 4 && xmlhttp2.status == 200){
										var rst = JSON.parse(xmlhttp2.responseText);
										mdui.alert(rst.state);
									}
								}
							});
						}else{
							mdui.alert(rst.state);
						}
					}
				}
			}
		}

		// 设置卡片的值
		function set_card_info(){
			var xmlhttp = new XMLHttpRequest;
			var name = getUrlParam("name");
			xmlhttp.open("GET","./ajax/card_sel.php?name="+name);
			xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xmlhttp.send();
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					var rst = JSON.parse(xmlhttp.responseText);
					$$('#card_pic_info_show').attr('src',rst);
				}
			}
		}
		window.onload = set_card_info();

		function letter(){
			var nickname = getUrlParam("nickname");
			var name = getUrlParam("name");
			// 获取body的主题类名
			var body_class = $$('#theme_body').attr('class');
			var theme = body_class.split("mdui-theme-primary-")[1].split(" ")[0];
			// 跳转页面
			window.location = "message.php?nickname="+nickname+"&theme="+theme+"&info=true"+"&name="+name;
		}
	</script>
</div>
</body>
</html>