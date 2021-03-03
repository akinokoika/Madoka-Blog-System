<!--
github:https://github.com/akinokoika/Madoka-Blog-System.git
-->
<?php
session_start();
if (!$_SESSION['nickname']) {
    header("location:./base/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>index</title>
	<meta name="description" content="如果，我是说如果，有人跟你说能用魔法实现任何愿望，你会怎么做？" />
    <meta name="keywords" content="主页面，鹿目圆，博客，文章，已经没什么好害怕的了" />
    <meta content="如果有人说怀有希望是错误，我会无数次反驳不是这样的，不管到什么时候。" />
	<link href="./images/favicon.ico" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="./mdui/css/mdui.css">
    <link rel="stylesheet" type="text/css" href="./mdui/css/mdui.min.css">
    <script src="./mdui/js/mdui.js"></script>
	<script src="./mdui/js/mdui.min.js"></script>
	<script src="./js/translate.js"></script>
	<script>var $$ = mdui.JQ;</script>
	<style>
	.mdui-table th,
	.mdui-table td {
		padding: 1px 10px;
	}
	.mdui-table th:last-child,
	.mdui-table td:last-child {
		padding-right: 10px;
	}
	.mdui-table th:first-child,
	.mdui-table td:first-child {
		padding-left: 20px;
	}
	.mdui-table th:nth-child(2),
	.mdui-table td:nth-child(2) {
		padding-left: 10px;
	}
	.mdui-table th {
		line-height: 32px;
	}
	.mdui-table td {
		font-size: 14px;
		line-height: 24px;
	}
	.curDate{
		background-color:#90CAF9;
		font-weight: bold;
	}
	.curDate_check{
		background:url(./images/pick3.png) #90CAF9  left top no-repeat; 
		font-weight: bold;
	}
	.isDate2{
		background:url(./images/pick3.png) #ffffff  left top no-repeat; 
	}
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
	.bg{
		height: 100%;
		width: 100%;
		background: url('./images/bg9.jpg') no-repeat;
		background-size: cover;
		position: absolute;
	}
	.bg_drawer{
		background: url('./images/bg9.jpg') no-repeat;
		background-size: cover;
	}
	.flat{
		padding-left:3px;
	}
	.flat2{
		margin-left:2px;
	}
	.testfile {
		position: relative;
		display: inline-block;
		overflow: hidden;
		text-decoration: none;
		text-indent: 0;
	}
	.testfile input {
		position: absolute;
		right: 0;
		top: 0;
		opacity: 0;
	}
	.file_sub{
		margin-top:15px;
	}

	.mcont{
		margin:40px 0px; 
		position: relative;
	}
	.mcont ul{
		padding: 0;
		list-style: none;
		overflow: hidden; 
		width: 250px; 
		position: absolute; 
		left:0; top:-45px; 
		display:none;
	}
	.mcont li{
		display:inline; 
		cursor: pointer;
	}
	.m_bar{
		margin-bottom: 10px;
	}
	#div_content,#div_content2,#div_content3 {
		resize: vertical;
		overflow: auto;
		height:100px;
	}
	#div_content:empty:before,#div_content2:empty:before {
		content: attr(placeholder);
		color: #c0c0c0;
	}
	.content_limit_alert{
		color: #ff3c3c;
	}
	.theme_class{
		margin-left:10px;
		cursor:pointer;
	}
	.essay_pic{
		width: 18px;
		height: 18px;
		border-radius: 50%;
		margin: 0px 5px;
	}
	.thumbs_up_class{
		margin-right: 10px;
		cursor:pointer;
		float: right;
	}
	.essay_p{
		margin-right: 10px;
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
	.touhou_bg_drawer_1{
		background: url('./images/touhou/drawer1_touhou.jpg') no-repeat;
		background-size: cover;
		color: #ffffff;
	}
	.touhou_bg_drawer_2{
		background: url('./images/touhou/drawer2_touhou.jpg') no-repeat;
		background-size: cover;
		color: #ffffff;
	}
	.touhou_bg_drawer_3{
		background: url('./images/touhou/drawer3_touhou.jpg') no-repeat;
		background-size: cover;
		color: #ffffff;
	}
	.touhou_bg_drawer_4{
		background: url('./images/touhou/drawer4_touhou.jpg') no-repeat;
		background-size: cover;
		color: #ffffff;
	}
	.touhou_bg_drawer_5{
		background: url('./images/touhou/drawer5_touhou.jpg') no-repeat;
		background-size: cover;
		color: #ffffff;
	}
	.touhou_icon{
		width: 33px;
		height: 33px;
		border-radius: 50%;
		margin-bottom: 5px;
	}
	</style>
</head>
<body id="body_bg" class="mdui-theme-primary-blue mdui-theme-accent-blue mdui-drawer-body-left">

<div class="mdui-drawer" id="drawer">
	<div class="mdui-list">
		<div class="mdui-card-header" style="cursor:pointer;">
			<img class="mdui-card-header-avatar" id="pic_info_show_drawer" src="./images/icon1.jpg"/>
			<div class="mdui-card-header-subtitle" id="welcome">欢迎：</div>
			<div class="mdui-card-header-title mdui-typo" >
				<span id="nickname_info_show_drawer"></span>
				<small><span id="lv_info_show_drawer" class="mdui-text-color-theme"></span></small>
			</div>
		</div>
		<div class="mdui-card-content " id="mess_info_show_drawer"></div>
	</div>
	<div class="mdui-divider mdui-typo"></div>
	<ul class="mdui-list" id="list_sidebar">
		<li class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">beach_access</i>
			<div class="mdui-list-item-content" mdui-dialog="{target: '#theme_dialog'}">切换主题</div>
		</li>
		<li class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons" id="only_show_bg_icon">visibility</i>
			<div class="mdui-list-item-content" onclick="only_show_bg(this)">只看背景</div>
		</li>
		<li class="mdui-list-item mdui-ripple" id="touhou_switch_show_bg" hidden>
			<i class="mdui-list-item-icon mdui-icon material-icons">switch_camera</i>
			<div class="mdui-list-item-content" onclick="switch_show_bg()">切换背景</div>
		</li>
		<li class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">music_video</i>
			<div class="mdui-list-item-content" onclick="jump_page('video.html')">视频音乐</div>
		</li>
		<li class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">shopping_cart</i>
			<div class="mdui-list-item-content" onclick="jump_page('shopping.html')">商城</div>
		</li>
		<li class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">message</i>
			<div class="mdui-list-item-content" onclick="jump_page('message.php')">消息</div>
		</li>
		<li class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">directions_run</i>
			<div class="mdui-list-item-content" onclick="logout()">注销</div>
		</li>
		<li class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">language</i>
			<div class="mdui-list-item-content" mdui-dialog="{target: '#language_dialog'}">语言</div>
		</li>
		<li class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">close</i>
			<div class="mdui-list-item-content" mdui-drawer-close>关闭</div>
		</li>
	</ul>
</div>

<span id="welcome2">欢迎，<span class="admin_show" hidden>管理员：</span><span class="admin_hidden">当前状态：</span></span><span id="nickname"><?php echo $_SESSION['nickname'] ?></span>
<a id="logout_bg" onclick="logout()" class="theme_class">注销</a>
<a id="switch_bg" class="theme_class" mdui-dialog="{target: '#theme_dialog'}">切换主题</a>
<a id="show_bg" onclick="only_show_bg(this)" class="theme_class"  style="display:none" >只看背景</a>
<a id="drawer_btn" class="theme_class">侧边栏</a>
<span id="new_user_message" class="mdui-text-color-theme theme_class"></span>
<br/>
<img style="height:80px;width:100%" id="banner" src="./images/banner.png">

<div class="mdui-dialog" id="theme_dialog">
	<div class="mdui-dialog-content">
	<div class="mdui-dialog-title">主题</div>
		<form id="theme_tab">
			<label class="mdui-radio">
				<input type="radio" name="theme"/>
				<i class="mdui-radio-icon"></i>
				<span class="mdui-text-color-blue">默认</span>
			</label>
			<br/>
			<label class="mdui-radio">
				<input type="radio" name="theme"/>
				<i class="mdui-radio-icon"></i>
				<span class="mdui-text-color-pink">粉色</span>
			</label>
			<br/>
			<label class="mdui-radio">
				<input type="radio" name="theme"/>
				<i class="mdui-radio-icon"></i>
				<span class="mdui-text-color-red">东方系列</span>
			</label>
		</form>
	</div>
	<div class="mdui-dialog-actions">
		<button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确定</button>
	</div>
</div>
<div class="mdui-dialog" id="language_dialog">
	<div class="mdui-dialog-content">
	<div class="mdui-dialog-title">语言</div>
		<form id="language_tab">
			<label class="mdui-radio">
				<input type="radio" name="language"/>
				<i class="mdui-radio-icon"></i>
				<span class="mdui-text-color-theme Chinese" title="Chinese">中文</span>
			</label>
			<br/>
			<label class="mdui-radio">
				<input type="radio" name="language"/>
				<i class="mdui-radio-icon"></i>
				<span class="mdui-text-color-theme English" title="English">英语</span>
			</label>
		</form>
	</div>
	<div class="mdui-dialog-actions">
		<button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确定</button>
	</div>
</div>
<script>

// 跳转页面函数
function jump_page(url){
	var nickname = document.getElementById("nickname").innerHTML;
	// 获取body的主题类名
	var body_class = $$('#body_bg').attr('class');
	var theme = body_class.split("mdui-theme-primary-")[1].split(" ")[0];
	// 跳转页面
	window.location = url+"?nickname="+nickname+"&theme="+theme;
}

// 取得当前用户的等级
function get_lv_show(){
	var xmlhttp = new XMLHttpRequest;
	var nickname = document.getElementById("nickname").innerHTML;
	$$.ajax({
		method: 'GET',
		url: './ajax/lv_sel_show.php',
		data: {
			name: nickname
		},
		success: function (data) {
			var rst = JSON.parse(data);
			$$(lv_info_show_drawer).text("lv."+rst.lv);
		}
	});
}
window.onload = get_lv_show();

// 注销提示
function logout(){
	mdui.confirm('是否注销？','注销', function(){
		$$.ajax({
			method: 'GET',
			url: './base/logout.php',
			success: function (data) {
				var rst = JSON.parse(data);
				mdui.alert(rst);
				location.reload();
			}
		});
		//location.href = "logout.php";
	});
}

// 取得当前主题的名字
function get_theme_name(){
	var theme_input = $$('#theme_tab').find('input');
	for(var i=0;i<theme_input.length;i++){
		if($$(theme_input[i]).prop('checked')==true){
			var theme_sel = $$(theme_input[i]).nextAll('span').text();
			break;
		}
	}
	return theme_sel;
}

// 取得主题面板的主题名并更新主题
document.getElementById('theme_dialog').addEventListener('confirm.mdui.dialog', function () {
	var theme_sel = get_theme_name();
	var nickname = document.getElementById("nickname").innerHTML;
	$$.ajax({
		method: 'GET',
		url: './ajax/theme_up.php',
		data: {
			name: nickname,
			theme: theme_sel
		},
		success: function (data) {
			var rst = JSON.parse(data);
			mdui.alert(rst,function(){
				location.reload();
			});
		}
	});
});

// 设置主题面板的选中状态
function set_theme_tab(str){
	var theme_span = $$('#theme_tab').find('span');
	for(var i=0;i<theme_span.length;i++){
		if(theme_span[i].innerText == str){
			var theme_input = $$(theme_span[i]).prevAll('input');
			$$(theme_input).prop('checked', true);
			break;
		}
	}
}

// 初始化主题状态
function theme_ajax(){
	var nickname = document.getElementById("nickname").innerHTML;
	$$.ajax({
		method: 'GET',
		url: './ajax/theme_sel.php',
		data: {
			name: nickname
		},
		success: function (data) {
			var rst = JSON.parse(data);
			set_theme_tab(rst);
			if(rst != "默认"){
				$$('#banner').css('display', 'none');
				$$('#body_bg').removeClass('mdui-theme-primary-blue mdui-theme-accent-blue');
			}
			if(rst == "粉色"){
				$$('#show_bg').css('display', '');
				$$('#body_bg').addClass('bg');
				$$('#body_bg').addClass('mdui-theme-primary-pink mdui-theme-accent-pink');
				$$('#drawer').addClass('bg_drawer');
			}
			if(rst == "东方系列"){
				$$('#show_bg').css('display', '');

				var nickname = document.getElementById("nickname").innerHTML;
				$$.ajax({
					method: 'GET',
					url: './ajax/touhou_sel.php',
					data: {
						name: nickname
					},
					success: function (data) {
						var rst = JSON.parse(data);
						if(rst=="bg1"){
							$$('#body_bg').addClass('touhou_bg');
							$$('#body_bg').addClass('mdui-theme-primary-red mdui-theme-accent-red');
						}else{
							$$('#body_bg').addClass('touhou_bg2');
							$$('#body_bg').addClass('mdui-theme-primary-yellow mdui-theme-accent-yellow');
						}
					}
				});
				
				$$('#drawer').addClass('touhou_bg_drawer_1');
				$$('#touhou_switch_show_bg').prop('hidden', false);
			}
		}
	});
}
window.onload = theme_ajax();

// 切换背景
function only_show_bg(obj){
	if($$('#mdui_box').prop('hidden') == true){
		$$('#mdui_box').prop('hidden', false);
		$$(obj).text('只看背景');
		$$(only_show_bg_icon).text('visibility');
	}else{
		$$('#mdui_box').prop('hidden', true);
		$$(obj).text('返回首页');
		$$(only_show_bg_icon).text('visibility_off');
	}
}

// 判断是否购买过东方系列
function touhou_if_buy(){
	var nickname = document.getElementById("nickname").innerHTML;
	$$.ajax({
		method: 'GET',
		url: './ajax/touhou_if_buy.php',
		data: {
			name: nickname
		},
		success: function (data) {
			var rst = JSON.parse(data);
			if(rst == "没有购买东方系列"){
				var theme_span = $$('#theme_tab').find('span');
				for(var i=0;i<theme_span.length;i++){
					if(theme_span[i].innerText == "东方系列"){
						var theme_input = $$(theme_span[i]).prevAll('input');
						$$(theme_input.parent()).prop('hidden', true);
						$$(theme_input).prop('disabled', true);
						break;
					}
				}
			}
		}
	});
}
window.onload = touhou_if_buy();

// 东方系列的切换背景
function switch_show_bg(){
	var nickname = document.getElementById("nickname").innerHTML;
	$$.ajax({
		method: 'GET',
		url: './ajax/touhoubg_up.php',
		data: {
			name: nickname
		},
		success: function (data) {
			var rst = JSON.parse(data);
			if(rst == "switch to bg1"){
				$$('#body_bg').removeClass('touhou_bg2 mdui-theme-primary-yellow mdui-theme-accent-yellow');
				$$('#body_bg').addClass('touhou_bg mdui-theme-primary-red mdui-theme-accent-red');
			}else if(rst == "switch to bg2"){
				$$('#body_bg').removeClass('touhou_bg mdui-theme-primary-red mdui-theme-accent-red');
				$$('#body_bg').addClass('touhou_bg2 mdui-theme-primary-yellow mdui-theme-accent-yellow');
			}
		}
	});
}

// 侧边栏
var drawer = new mdui.Drawer('#drawer', {
	swipe : 'true'
});

// 东方系列的侧边栏设计
var drawer_id = document.getElementById('drawer');
drawer_id.addEventListener('closed.mdui.drawer', function () {
	var theme_sel = get_theme_name();
	if(theme_sel=="东方系列"){
		var drawer_class = $$('#drawer').attr('class');
		var num = drawer_class.split("touhou_bg_drawer_")[1].split(" ")[0];
		$$('#drawer').removeClass('touhou_bg_drawer_'+num);
		if(num=="5"){
			var t = 1;
		}else{
			var t = parseInt(num)+1;
		}
		$$('#drawer').addClass('touhou_bg_drawer_'+t.toString());
	}
});

document.getElementById('drawer_btn').addEventListener('click', function () {
	drawer.toggle();
});

// 判断当前的设备
function IsPC() {
	var userAgentInfo = navigator.userAgent;
	var Agents = ["Android", "iPhone","SymbianOS", "Windows Phone","iPad", "iPod"];
	var flag = true;
	for (var v = 0; v < Agents.length; v++) {
		if (userAgentInfo.indexOf(Agents[v]) > 0) {
			flag = false;
			break;
			}
		}
	return flag;
}
var device_state = IsPC();

// 响应式设计
if(device_state == false){
	$$('#switch_bg').prop('hidden', true);
	$$('#show_bg').prop('hidden', true);
	$$('#logout_bg').prop('hidden', true);
}else{
	drawer.close();
}

// 设置语言面板
function set_language_tab(str){
	var language_span = $$('#language_tab').find('span');
	for(var i=0;i<language_span.length;i++){
		if(language_span[i].title == str){
			var language_input = $$(language_span[i]).prevAll('input');
			$$(language_input).prop('checked', true);
			break;
		}
	}
}

// 初始化语言状态
function language_ajax(){
	$$.ajax({
		method: 'GET',
		url: './language/language.php',
		success: function (data) {
			var rst = JSON.parse(data);
			set_language_tab(rst);
			if(rst=="English"){
				eng_local_translate();
			}
		}
	});
}
window.onload = language_ajax();

// 取得当前语言的名字
function get_language_name(){
	var input = $$('#language_tab').find('input');
	for(var i=0;i<input.length;i++){
		if($$(input[i]).prop('checked')==true){
			var sel = $$(input[i]).nextAll('span').attr('title');
			break;
		}
	}
	return sel;
}

// 更新语言
document.getElementById('language_dialog').addEventListener('confirm.mdui.dialog', function () {
	var language = get_language_name();
	$$.ajax({
		method: 'GET',
		url: './language/language_set.php',
		data: {
			language: language
		},
		success: function (data) {
			var rst = JSON.parse(data);
			location.reload();
		}
	});
});

</script>

<div class="mdui-container" id="mdui_box">

<button id="back_top" style="z-index:1;" class="mdui-fab-hide mdui-fab mdui-fab-fixed mdui-color-theme-accent mdui-ripple">
	<i class="mdui-icon material-icons">arrow_upward</i>
</button>
<script>
	document.getElementById("back_top").onclick = function () {
		let scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
		//定义一个速度，即每隔30毫秒移动300px
		let speed = 300;
		back_top_myTimer = setInterval(function () {
			document.documentElement.scrollTop = document.documentElement.scrollTop - speed;
			//如果scroll的滚动值为0，也就是到达了页面顶部，需要停止定时器
			if(document.documentElement.scrollTop<=0){
				clearInterval(back_top_myTimer);
			}
		},30)
	}
</script>

	<div class="mdui-tab mdui-tab-full-width" id="tab" mdui-tab>
		<a href="#tab1-content" id="tab1" class="mdui-ripple mdui-tab-active">
			<label>文章首页</label>
		</a>
		<a href="#tab2-content" id="tab2" class="mdui-ripple">
			<label>文章管理</label>
		</a>
		<a href="#tab3-content" id="tab3" class="mdui-ripple">
			<label>系统管理</label>	
		</a>
	</div>
	<script>
		function theme_ajax2(){
			var nickname = document.getElementById("nickname").innerHTML;
			$$.ajax({
				method: 'GET',
				url: './ajax/theme_sel.php',
				data: {
					name: nickname
				},
				success: function (data) {
					var rst = JSON.parse(data);
					if(rst == "东方系列"){
						$$('#tab1').prepend('<img class="touhou_icon" src="./images/touhou/icon3_touhou.jpg"/>');
						$$('#tab2').prepend('<img class="touhou_icon" src="./images/touhou/icon1_touhou.jpg"/>');
						$$('#tab3').prepend('<img class="touhou_icon" src="./images/touhou/icon2_touhou.jpg"/>');
					}
				}
			});
		}
		window.onload = theme_ajax2();
	</script>

	<div class="mdui-row mdui-p-a-2" id="tab1-content">
		<div class="mdui-row">
			<div class="mdui-col-xs-6" id="cld" style="height:215px">
				<div id="cldFrame">
					<div id="cldBody" class="mdui-table-fluid">
						<table class="mdui-table mdui-table-hoverable"">
							<thead>
								<tr>
									<td colspan="7">
										<div id="top" style="font-size:16px;" class="mdui-typo">
											<span id="left"><i class="mdui-icon material-icons mdui-ripple">chevron_left</i></span>
											<span id="topDate"></span>
											<span id="right"><i class="mdui-icon material-icons mdui-ripple">chevron_right</i></span>
											<a onclick="daily_check_in()" class="mdui-float-right" style="cursor:pointer" id="sign_in_text">签到</a>
											<span onclick="p_daily_check_in()">
												<i class="mdui-icon material-icons mdui-ripple mdui-float-right" style="margin:3px 15px 0 0" mdui-tooltip="{content: '刷新日历效果'}">loop</i>
											</span>
										</div>
									</td>
								</tr>
								<tr id="week">
									<td>日</td>
									<td>一</td>
									<td>二</td>
									<td>三</td>
									<td>四</td>
									<td>五</td>
									<td>六</td>
								</tr>
							</thead>
							<tbody id="tbody">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<script>
			var cld = document.getElementById('cld');
			//获取div高度
			//console.log(window.getComputedStyle(cld).getPropertyValue('height'));
			
			// 日历函数
			function isLeap(year) {
				if((year%4==0 && year%100!=0) || year%400==0){
					return true;
				}
				else{
					return false; 
				}
			}
			var monthDay = [31,0,31,30,31,30,31,31,30,31,30,31];
			function whatDay(year, month, day=1) {
				var sum = 0;
				sum += (year-1)*365+Math.floor((year-1)/4)-Math.floor((year-1)/100)+Math.floor((year-1)/400)+day;
				for(var i=0; i<month-1; i++){
					sum += monthDay[i];
				}
				if(month > 2){
					if(isLeap(year)){ 
						sum += 29; 
					}
					else{
						 sum += 28; 
					}
				}
				return sum%7;//余数为0代表那天是周日，为1代表是周一
			}
			function showCld(year, month, firstDay){
				var i;
				var tagClass = "";
				var nowDate = new Date();
				
				var days;//从数组里取出该月的天数
				if(month == 2){
					if(isLeap(year)){
						days = 29;
					}
					else{
						days = 28;
					}
				}
				else{
					days = monthDay[month-1];
				}

				/*当前显示月份添加至顶部*/
				// 处理英语版本的显示
				if(get_language_name()!="Chinese"){
					var topdateHtml = year + "-" + month;
				}else{
					var topdateHtml = year + "年" + month + "月";
				}
				var topDate = document.getElementById('topDate');
				topDate.innerHTML = topdateHtml;    
				
				/*添加日期部分*/
				var tbodyHtml = '<tr>';
				for(i=0; i<firstDay; i++){//对1号前空白格的填充
					tbodyHtml += "<td></td>";
				}
				var changLine = firstDay;
				for(i=1; i<=days; i++){//每一个日期的填充
					if(year == nowDate.getFullYear() && month == nowDate.getMonth()+1 && i == nowDate.getDate()) {
						tagClass = "curDate";//当前日期对应格子
					} 
					else{ 
						tagClass = "isDate";//普通日期对应格子，设置class便于与空白格子区分开来
					}  
					tbodyHtml += "<td class=" + tagClass + ">" + i + "</td>";
					changLine = (changLine+1)%7;
					if(changLine == 0 && i != days){//是否换行填充的判断
						tbodyHtml += "</tr><tr>";
					} 
				}
				if(changLine!=0){//添加结束，对该行剩余位置的空白填充
					for (i=changLine; i<7; i++) {
						tbodyHtml += "<td></td>";
					}
				}//实际上不需要填充后方，但强迫症必须整整齐齐！   
				tbodyHtml +="</tr>";
				var tbody = document.getElementById('tbody');
				tbody.innerHTML = tbodyHtml;
			}
			var curDate = new Date();
			var curYear = curDate.getFullYear();
			var curMonth = curDate.getMonth() + 1;
			//showCld(curYear,curMonth,whatDay(curYear,curMonth));
			
			// 取得服务器的当前时间并生成日历
			function calendar_ajax(){
				$$.ajax({
					method: 'GET',
					url: './ajax/index.php',
					data: {
						action: "now"
					},
					success: function (data) {
						var rst = JSON.parse(data);
						showCld(rst.year,rst.month,whatDay(rst.year,rst.month));
					}
				});
			}
			
			window.onload = calendar_ajax();
			
			// 实现日历的翻页
			function nextMonth(){
				var topStr = document.getElementById("topDate").innerHTML;
				var pattern = /\d+/g;
				var listTemp = topStr.match(pattern);
				var year = Number(listTemp[0]);
				var month = Number(listTemp[1]);
				var nextMonth = month+1;
				if(nextMonth > 12){
					nextMonth = 1;
					year++;
				}
				document.getElementById('topDate').innerHTML = '';
				showCld(year, nextMonth, whatDay(year, nextMonth));
			}
			function preMonth(){
				var topStr = document.getElementById("topDate").innerHTML;
				var pattern = /\d+/g;
				var listTemp = topStr.match(pattern);
				var year = Number(listTemp[0]);
				var month = Number(listTemp[1]);
				var preMonth = month-1;
				if(preMonth < 1){
					preMonth = 12;
					year--;
				}
				document.getElementById('topDate').innerHTML = '';
				showCld(year, preMonth, whatDay(year, preMonth));
			}
			document.getElementById('right').onclick = function(){
				nextMonth();
				p_daily_check_in();
			}
			document.getElementById('left').onclick = function(){
				preMonth();
				p_daily_check_in();
			}
			
			// 签到
			function daily_check_in(){
				var nickname = document.getElementById("nickname").innerHTML;
				$$.ajax({
					method: 'GET',
					url: './ajax/checkin.php',
					data: {
						name: nickname
					},
					success: function (data) {
						var rst = JSON.parse(data);
						if(rst.state.indexOf("签到成功") != -1){
							var cur = document.getElementsByClassName("curDate")[0];
							cur.classList.add("curDate_check");
						}
						mdui.alert(rst.state);
					}
				});
			}
			
			// 日历签到
			function p_daily_check_in(){
				var nickname = document.getElementById("nickname").innerHTML;
				$$.ajax({
					method: 'GET',
					url: './ajax/p_checkin.php',
					data: {
						name: nickname
					},
					success: function (data) {
						var rst = JSON.parse(data);
						if(rst[0] != "没有签到"){
							for(var i = 0 ; i < rst.length; i++){
								// 取得签到的年月日
								var year = rst[i].split("-")[0];
								var month = rst[i].split("-")[1].replace("0","");
								var days = rst[i].split(" ")[0].split("-")[2];
								// 取得日历的年月日
								var topym = document.getElementById("topDate").innerText;
								if(topym.indexOf(year) != -1 && topym.indexOf(month) != -1){
									// 过去的签到效果
									var isDate = document.getElementsByClassName("isDate");
									for(var j = 0 ; j < isDate.length; j++){
										var isday = isDate[j].innerText;
										// 去除日期前面的零
										var t = days.replace(/\b(0+)/gi,"");
										if( t === isday ){
											isDate[j].classList.add("isDate2");
										}
									}
									// 今天的签到效果
									var cur = document.getElementsByClassName("curDate")[0];
									var curs = cur.innerText;
									if(days.indexOf(curs) != -1){
										cur.classList.add("curDate_check");
									}
								}
							}
						}
					}
				});
			}
			
			window.onload = p_daily_check_in();
			
			</script> 
			
			<div class="mdui-col-xs-6" style="height:215px">
				<div class="mdui-row" style="padding:1px 8px">
					<div class="mdui-col-xs-6 mdui-col-sm-6 mdui-color-white" style="height:190px">
						<p><strong name="strong_str" id="latest_post">最新发布的文章</strong></p>
						<div class="mdui-divider"></div>
						<div>
							<ul class="mdui-list mdui-list-dense">
								<li name="list_flat" class="mdui-list-item mdui-ripple">
								<div class="mdui-list-item-content">
								<div class="mdui-list-item-title" id="new_title"></div>
								<div class="mdui-list-item-text mdui-list-item-two-line" id="new_content"></div>
								</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="mdui-col-xs-6 mdui-col-sm-6 mdui-color-white" style="height:190px">
						<p><strong name="strong_str" id="registered_users">最新注册的用户</strong></p>
						<div class="mdui-divider"></div>
						<div>
							<ul class="mdui-list" style="padding-left:1px">
								<li name="list_flat" class="mdui-list-item mdui-ripple">
								<div id="img_flat" class="mdui-list-item-avatar"><img id="new_pic" src="./images/icon1.jpg" class=""/></div>
								<div id="right_flat" class="mdui-list-item-content">
								<div class="mdui-list-item-title" id="new_name"></div>
								</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<script>
			// 返回最新文章和最新用户
			function new_ajax2(url){
				$$.ajax({
					method: 'GET',
					url: './ajax/user.php',
					data: {
						name: nickname
					},
					success: function (data) {
						var rst = JSON.parse(data);
						$$('#new_name').text(rst.name);
						$$('#new_pic').attr('src', rst.pic);
						$$('#new_title').text(rst.title);
						$$('#new_content').html(rst.content);
					}
				});
			}
			window.onload = new_ajax2();
			
			//document.write("当前分辨率："+window.outerWidth);
			
			// 响应式设计
			if(window.outerWidth < 600 || device_state == false){
				document.getElementById("img_flat").hidden = true;
				var str = document.getElementsByName("strong_str");
				for(var i = 0 ; i < str.length; i++){
					var t = str[i].innerHTML.replace(str[i].innerHTML.substring(2,5),"");
					str[i].innerHTML = t;
				}
				var list = document.getElementsByName("list_flat");
				for(var i = 0 ; i < list.length; i++){
					list[i].classList.add("flat");
				}
				document.getElementById("right_flat").classList.add("flat2");
			}
			
			//document.write(device_state);
			
			</script>
		</div>
		<div class="mdui-col-xs-12">
			<div class="mdui-row-xs-2">
				<div class="mdui-col">
				<button onclick="nick_show()" id="view_current_user" class="mdui-btn mdui-btn-block mdui-color-red-accent mdui-ripple">查看当前用户的文章</button>
				</div>
				<div class="mdui-col">
				<button onclick="all_show()" id="view_all_user" class="mdui-btn mdui-btn-block mdui-color-red-accent mdui-ripple">查看所有文章</button>
				</div>
				<script>
				// 查看所有文章
				function all_show () {
					if($$('#all_content1').prop('hidden') === false){
						$$('#all_content1').prop('hidden', true);
						$$('#back_top').addClass('mdui-fab-hide');
					}else{
						$$('#all_content1').prop('hidden', false);
						if($$('#back_top').hasClass('mdui-fab-hide')){
							$$('#back_top').removeClass('mdui-fab-hide');
						}
					}
					$$('#nick_content1').prop('hidden', true);
				}
				// 查看当前用户的文章
				function nick_show () {
					if($$('#nick_content1').prop('hidden') === false){
						$$('#nick_content1').prop('hidden', true);
						$$('#back_top').addClass('mdui-fab-hide');
					}else{
						$$('#nick_content1').prop('hidden', false);
						if($$('#back_top').hasClass('mdui-fab-hide')){
							$$('#back_top').removeClass('mdui-fab-hide');
						}
					}
					$$('#all_content1').prop('hidden', true);
				}
				</script>
			</div>
			<div class="mdui-row2" >
			<div class="mdui-col-xs-12 mdui-color-light-blue-100" >
				<div id="all_content1" hidden>
				<?php
				include "config.php";

				// 获取用户的头像
				function get_user_pic($nickname){
					include "config.php";
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
						die("连接失败: " . $conn->connect_error);
					}
					mysqli_set_charset($conn,"utf8");
					
					$sql = "select pic from userinfo where nickname = '$nickname'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							return $row["pic"];
						}
					}else{
						return "./images/icon1.jpg";
					}
				}

				//
				function get_user_thumbs($nickname,$title){
					include "config.php";
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
						die("连接失败: " . $conn->connect_error);
					}
					mysqli_set_charset($conn,"utf8");
					
					$sql = "select * from thumbs where nickname = '$nickname' and title = '$title'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							return true;
						}
					}else{
						return false;
					}
				}
				 
				// 创建连接
				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("连接失败: " . $conn->connect_error);
				} 
				mysqli_set_charset($conn,"utf8");
				
				$essay_date = "date";
				$sql = "SELECT * FROM essay ORDER BY ".$essay_date." DESC";
				$result = $conn->query($sql);
				 
				if ($result->num_rows > 0) {
					// 输出数据
					while($row = $result->fetch_assoc()) {
						echo "<div class='mdui-list-item-content' style='margin-left:10px'>
							<div><p>
								<strong>标题: </strong>
								<span class='essay_p essay_p_title'>".$row["title"]."</span>
								<strong>作者: </strong>
								<img class='essay_pic' src='".get_user_pic($row["nickname"])."'/>
								<span class='essay_p'>".$row["nickname"]."</span>
								<strong>发帖时间：</strong>
								<span class='essay_p'>".$row["date"]."</span>
								<strong>点赞数：</strong>
								<span class='essay_p'>".$row["thumbs"]."</span>";
								
								if(get_user_thumbs($_SESSION['nickname'],$row["title"])){
									echo "
									<i onclick='thumbs_up_get(this)' class='mdui-text-color-theme-accent thumbs_up_class mdui-icon material-icons'>thumb_up</i>
									";
								}else{
									echo "
									<i onclick='thumbs_up_get(this)' class='thumbs_up_class mdui-icon material-icons'>thumb_up</i>
									";
								}

								echo "</p>
							</div>
							<div style='margin-top:30px;'>
								<p><strong>内容: </strong></p><p>".$row["content"]."</p>
							</div>
						
							<ul class='mdui-list' mdui-collapse='{accordion: true}'>
							<li class='mdui-collapse-item'>
							<div class='mdui-collapse-item-header mdui-list-item mdui-ripple'>
							<div class='mdui-list-item-content' style='font-size:14px;'>评论</div>
							<i class='mdui-collapse-item-arrow mdui-icon material-icons'>keyboard_arrow_down</i>
							</div>
							<ul class='mdui-collapse-item-body mdui-list mdui-list-dense'>
							";
						
						$title2 = $row["title"];
						 
						$sql2 = "SELECT * FROM comment where title='$title2' ";
						$res2 = $conn->query($sql2);
						 
						if ($res2->num_rows > 0) {
							while($row2 = $res2->fetch_assoc()) {
								echo "<li class='mdui-list-item mdui-ripple'>
								<img class='essay_pic' src='".get_user_pic($row2["nickname"])."'/>
								".$row2["nickname"]."：".$row2["comment"]."</li>";
							}
						} else {
							echo "<li class='mdui-list-item mdui-ripple'>没有评论</li>";
						}
				
						echo"</ul>
							</li>
							</ul>
							<div class='mdui-divider'></div>
						
							</div>";
					}
				} else {
					echo "<p>0 结果</p>";
				}
				$conn->close();
				?>
				</div>
			</div>
			</div>
			<div class="mdui-row2">
			<div class="mdui-col-xs-12 mdui-color-light-blue-100">
				<div id="nick_content1" hidden>
				<?php
				include "config.php";
				 
				// 创建连接
				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("连接失败: " . $conn->connect_error);
				}
				mysqli_set_charset($conn,"utf8");
				
				$nickname=$_SESSION['nickname'];
				
				$essay_date = "date";
				$sql = "SELECT * FROM essay where nickname='$nickname' ORDER BY ".$essay_date." DESC";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// 输出数据
					while($row = $result->fetch_assoc()) {
						echo "<div class='mdui-list-item-content' style='margin-left:10px'>
							<div><p>
								<strong>标题: </strong>
								<span class='essay_p essay_p_title'>".$row["title"]."</span>
								<strong>作者: </strong>
								<img class='essay_pic' src='".get_user_pic($row["nickname"])."'/>
								<span class='essay_p'>".$row["nickname"]."</span>
								<strong>发帖时间：</strong>
								<span class='essay_p'>".$row["date"]."</span>
								<strong>点赞数：</strong>
								<span class='essay_p'>".$row["thumbs"]."</span>";

								if(get_user_thumbs($_SESSION['nickname'],$row["title"])){
									echo "
									<i onclick='thumbs_up_get(this)' class='mdui-text-color-theme-accent thumbs_up_class mdui-icon material-icons'>thumb_up</i>
									";
								}else{
									echo "
									<i onclick='thumbs_up_get(this)' class='thumbs_up_class mdui-icon material-icons'>thumb_up</i>
									";
								}
								
								echo "</p>
							</div>
							<div style='margin-top:30px;'>
								<p><strong>内容: </strong></p><p>".$row["content"]."</p>
							</div>
						
							<ul class='mdui-list' mdui-collapse='{accordion: true}'>
							<li class='mdui-collapse-item'>
							<div class='mdui-collapse-item-header mdui-list-item mdui-ripple'>
							<div class='mdui-list-item-content' style='font-size:14px;'>评论</div>
							<i class='mdui-collapse-item-arrow mdui-icon material-icons'>keyboard_arrow_down</i>
							</div>
							<ul class='mdui-collapse-item-body mdui-list mdui-list-dense'>
							";
						
						$title2 = $row["title"];
						 
						$sql2 = "SELECT * FROM comment where title='$title2' ";
						$res2 = $conn->query($sql2);
						 
						if ($res2->num_rows > 0) {
							while($row2 = $res2->fetch_assoc()) {
								echo "<li class='mdui-list-item mdui-ripple'>
								<img class='essay_pic' src='".get_user_pic($row2["nickname"])."'/>
								".$row2["nickname"]."：".$row2["comment"]."</li>";
							}
						} else {
							echo "<li class='mdui-list-item mdui-ripple'>没有评论</li>";
						}
				
						echo"</ul>
							</li>
							</ul>
							<div class='mdui-divider'></div>
							</div>";
					}
				} else {
					echo "<p>没有发表过文章</p>";
				}
				$conn->close();
				?>
				</div>
			</div>
			</div>
			<script>
				function thumbs_up_get(obj){
					var xmlhttp = new XMLHttpRequest;
					var title = $$(obj).prevAll('.essay_p_title').text();
					var nickname = document.getElementById("nickname").innerHTML;
					xmlhttp.open("GET","./ajax/thumbs_up.php?name="+nickname+"&title="+title);
					xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
					xmlhttp.send();
					xmlhttp.onreadystatechange = function(){
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
							var rst = JSON.parse(xmlhttp.responseText);
							mdui.alert(rst);
							$$(obj).addClass('mdui-text-color-theme-accent');
						}
					}
				}
			</script>
		</div>
	</div>
	<div class="mdui-row mdui-p-a-2" id="tab2-content">
		<div class="mdui-col-xs-12">
			<div class="mdui-appbar">
			<div class="mdui-tab mdui-color-theme-300" mdui-tab>
				<a href="#example3-tab1" class="mdui-ripple mdui-ripple-white">文章添加</a>
				<a href="#example3-tab2" class="mdui-ripple mdui-ripple-white">文章修改</a>
				<a href="#example3-tab3" class="mdui-ripple mdui-ripple-white">文章删除</a>
				<a href="#example3-tab4" class="mdui-ripple mdui-ripple-white">文章搜索</a>
				<a href="#example3-tab5" class="mdui-ripple mdui-ripple-white">评论添加</a>
				<a href="#example3-tab6" class="mdui-ripple mdui-ripple-white">评论删除</a>
			</div>
			</div>
			
			<div id="example3-tab1">
				<form id="form1" action="./base/insert.php" method="post" onsubmit="return vetime()" >
					<div class="mdui-textfield mdui-textfield-floating-label">
						<label class="mdui-textfield-label">作者</label>
						<input id="author" class="mdui-textfield-input" name="nickname" type="text" readonly/>
						<div class="mdui-textfield-helper">只读字段</div>
					</div>
					<script>
						var nickname=document.getElementById("nickname").innerHTML;
						document.getElementById("author").value=nickname;
					</script>
					
					<div class="mdui-textfield mdui-textfield-floating-label">
						<label class="mdui-textfield-label">标题</label>
						<input class="mdui-textfield-input" id="essay_title" name="title" type="text" maxlength="20" required/>
						<div class="mdui-textfield-error">标题不能为空</div>
						<div class="mdui-textfield-helper" id="essay_time"></div>
					</div>

					<div id="meditor" class="mcont" class="mdui-textfield ">
						<div class="m_bar">
							<input id="insert_face" class="mdui-btn mdui-ripple mdui-color-indigo-accent" type="button" value="插入表情" />
							<input onclick="get_content(800)" class="mdui-btn mdui-ripple mdui-color-indigo-accent" type="button" value="保存" />
						</div>
						<label class="mdui-textfield-label">内容<span id="content_limit" style="margin-left:10px">0</span>/800</label>
						<div id="div_content" class="mdui-textfield-input" contenteditable="true"></div>
					</div>
					
					<div class="mdui-textfield">
						<label class="mdui-textfield-label">内容预览<small style="margin-left: 10px;">仅开发者可见</small></label>
						<textarea class="mdui-textfield-input" id="essay_put_content" name="content" type="text" readonly/></textarea>
					</div>

					<script>
						document.getElementById("div_content").innerHTML = "";

						// 统计表情的次数
						function getPlaceholderCount(strSource) {
							var str = strSource;
							var c = "<img src=\"./face/";
							var regex = new RegExp(c, 'g');
							var result = str.match(regex);
							var count = !result ? 0 : result.length;
							return count;
						}

						// 保存输入框的内容并统计字数和限制输入
						function get_content(limit_num){
							var content_limit =  document.getElementById("content_limit");
							var essay_put_content =  document.getElementById("essay_put_content");
							var content_length = $$("#div_content").text().length;
							var content_face_length = getPlaceholderCount($$("#div_content").html());
							content_length += content_face_length;
							var content = document.getElementById("div_content").innerHTML;
							if(content_length > limit_num){
								content_limit.innerText = content_length;
								$$('#content_limit').addClass('content_limit_alert');
								mdui.alert("超过字数限制");
							}else{
								if($$('#content_limit').hasClass('content_limit_alert')){
									$$('#content_limit').removeClass('content_limit_alert');
								}
								content_limit.innerText = content_length;
								essay_put_content.value = content;
							}
							
						}
						
						// 表情包
						var dataFace = [
							{name:"[流汗]",msrc:"./face/1.png"},
							{name:"[愤怒]",msrc:"./face/2.png"},
							{name:"[滑稽]",msrc:"./face/3.png"},
							{name:"[疑问]",msrc:"./face/4.png"},
							{name:"[惊讶]",msrc:"./face/5.png"},
							{name:"[墨镜]",msrc:"./face/6.png"},
							{name:"[点赞]",msrc:"./face/7.png"},
							{name:"[阴险]",msrc:"./face/8.png"},
							{name:"[无语]",msrc:"./face/9.png"},
							{name:"[喷水]",msrc:"./face/10.png"},
							{name:"[尴尬]",msrc:"./face/11.png"},
							{name:"[卖萌]",msrc:"./face/12.png"},
						];
					
						// 插入表情
						var editor = document.getElementById("meditor");
				
						var face_ul = document.createElement("ul");
						var ulHtml = "";
						for(var face_i = 0;face_i<dataFace.length;face_i++){
							ulHtml +="<li><img alt='"+dataFace[face_i].name+"' src='"+dataFace[face_i].msrc+"'  /></li>";
						}
						face_ul.innerHTML=ulHtml;
						editor.insertBefore(face_ul, editor.getElementsByTagName("div")[0]);
				
				
						document.getElementById("insert_face").onclick=function(){
							editor.getElementsByTagName("ul")[0].style.display = "block";
						}
						var div_content = document.getElementById("div_content");
						var lis = editor.getElementsByTagName("li");
						for(var face_i = 0;face_i<dataFace.length;face_i++){
							lis[face_i].onclick = new function(){
								var choose = lis[face_i];
								return function(){
									if(div_content.innerHTML == "<br>"){
										div_content.innerHTML = "";
									}
									editor.getElementsByTagName("ul")[0].style.display = "none";
									var value = choose.getElementsByTagName("img")[0].src;
									var t = "./face"+value.split("face")[1];
									div_content.innerHTML+="<img src='"+t+"'>";
									//div.value += "<img src='"+value+"'>";
								}
							}
						}
						
						// 标题输入提示时间
						document.getElementById("essay_title").onfocus = function(){
							var date = new Date();
							var mydate = date.toLocaleDateString();
							var mytime = date.toLocaleTimeString();
							document.getElementById("essay_time").innerText = mydate+mytime;
						}
						
						// 表单提交验证
						function vetime() {
							if($$("#essay_put_content").val() == ""){
								mdui.alert('没有保存任何内容，请重试');
								return false;
							}
							if($$("#essay_put_content").val() != $$("#div_content").html()){
								mdui.alert('保存内容不一致，请再次保存');
								return false;
							}
						}
					</script>
					
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="submit" value="提交">
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="reset" value="重置">
				</form>
			</div>
			<div id="example3-tab2">
				<form id="form2" action="./base/update.php" method="post" onsubmit="return verify_insert()">
					<ul class="admin_hidden"><li><small>只能修改<strong><span id="update_nickname_alert"></span></strong>的文章</small></li></ul>
					<script>
						var nickname=document.getElementById("nickname").innerHTML;
						document.getElementById("update_nickname_alert").innerText=nickname;
					</script>
					<p>标题：
					<select id="title_up" name="title" class="mdui-select" mdui-select>
					<option value="0">--请选择--</option>
					<?php
					include "config.php";
					$nickname=$_SESSION['nickname'];
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					mysqli_set_charset($conn,"utf8");

					$sql = "select * from admin where nickname='$nickname'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$sql= "select title from essay";
					} else {
						$sql= "select title from essay where nickname='$nickname'";
					}

					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0)
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<option value='$row[title]'>$row[title]</option>";
					} 
					$conn->close();
					?>
					</select>
					<input onclick="insert_get_content('user')" class="mdui-btn mdui-ripple mdui-color-indigo-accent admin_hidden" style="margin-left: 10px;" type="button" value="读取内容" readonly>
					<input onclick="insert_get_content('admin')" class="mdui-btn mdui-ripple mdui-color-indigo-accent admin_show" style="margin-left: 10px;" type="button" value="读取内容" readonly hidden>
					</p>
					
					<div id="meditor2" class="mcont" class="mdui-textfield ">
						<div class="m_bar">
							<input id="insert_face2" class="mdui-btn mdui-ripple mdui-color-indigo-accent" type="button" value="插入表情" />
							<input onclick="get_content2(800)" class="mdui-btn mdui-ripple mdui-color-indigo-accent" type="button" value="保存" />
						</div>
						<label class="mdui-textfield-label">内容<span id="content_limit2" style="margin-left:10px">0</span>/800</label>
						<div id="div_content2" class="mdui-textfield-input" contenteditable="true"></div>
					</div>
				
					<div class="mdui-textfield admin_show" hidden>
						<label class="mdui-textfield-label">内容预览<small style="margin-left: 10px;">仅开发者或管理员可见</small></label>
						<textarea class="mdui-textfield-input" id="insert_up_content" name="content" type="text" readonly/></textarea>
					</div>

					<script>
					document.getElementById("div_content2").innerHTML = "";

					// 保存输入框的内容并统计字数并限制输入
					function get_content2(limit_num){
						var content_limit2 =  document.getElementById("content_limit2");
						var insert_up_content =  document.getElementById("insert_up_content");
						var content_length = $$("#div_content2").text().length;
						var content_face_length = getPlaceholderCount($$("#div_content2").html());
						content_length += content_face_length;
						var content = document.getElementById("div_content2").innerHTML;
						if(content_length > limit_num){
							content_limit2.innerText = content_length;
							$$('#content_limit2').addClass('content_limit_alert');
							mdui.alert("超过字数限制");
						}else{
							if($$('#content_limit2').hasClass('content_limit_alert')){
								$$('#content_limit2').removeClass('content_limit_alert');
							}
							content_limit2.innerText = content_length;
							insert_up_content.value = content;
						}
						
					}
				
					var editor2 = document.getElementById("meditor2");
			
					var face_ul2 = document.createElement("ul");
					var ulHtml2 = "";
					for(var face_i2 = 0;face_i2<dataFace.length;face_i2++){
						ulHtml2 +="<li><img alt='"+dataFace[face_i2].name+"' src='"+dataFace[face_i2].msrc+"'  /></li>";
					}
					face_ul2.innerHTML=ulHtml2;
					editor2.insertBefore(face_ul2, editor2.getElementsByTagName("div")[0]);
			
					document.getElementById("insert_face2").onclick=function(){
						editor2.getElementsByTagName("ul")[0].style.display = "block";
					}
					var div_content2 = document.getElementById("div_content2");
					var lis2 = editor2.getElementsByTagName("li");
					for(var face_i2 = 0;face_i2<dataFace.length;face_i2++){
						lis2[face_i2].onclick = new function(){
							var choose2 = lis2[face_i2];
							return function(){
								if(div_content2.innerHTML == "<br>"){
									div_content2.innerHTML = "";
								}
								editor2.getElementsByTagName("ul")[0].style.display = "none";
								var value = choose2.getElementsByTagName("img")[0].src;
								var t = "./face"+value.split("face")[1];
								div_content2.innerHTML+="<img src='"+t+"'>";
								//div.value += "<img src='"+value+"'>";
							}
						}
					}

					// 用户或管理员进行文章修改读取内容
					function insert_get_content(sel){
						var xmlhttp = new XMLHttpRequest;
						var nickname = document.getElementById("nickname").innerHTML;
						var id = document.getElementById("title_up");
						var index = id.selectedIndex;
						var val = id.options[index].text;
						if(val == "--请选择--"){
							mdui.alert("请先选择标题");
							return;
						}
						switch(sel)
						{
							case "user":
								$$.ajax({
									method: 'GET',
									url: './ajax/title_up_content.php',
									data: {
										name: nickname,
										title: val
									},
									success: function (data) {
										var rst = JSON.parse(data);
										document.getElementById("div_content2").innerHTML = rst;
										document.getElementById("insert_up_content").value = rst;
									}
								});
								break;
							case "admin":
								$$.ajax({
									method: 'GET',
									url: './ajax/title_up_content_admin.php',
									data: {
										title: val
									},
									success: function (data) {
										var rst = JSON.parse(data);
										document.getElementById("div_content2").innerHTML = rst;
										document.getElementById("insert_up_content").value = rst;
									}
								});
								break;
						}
					}
					
					function verify_insert() {
						var id = document.getElementById("title_up");
						var index = id.selectedIndex;
						var val = id.options[index].text;
						if (val == "--请选择--") {
							mdui.alert('请先选择标题');
							return false;
						}
						if($$("#insert_up_content").val() == ""){
							mdui.alert('没有保存任何内容，请重试');
							return false;
						}
						if($$("#insert_up_content").val() != $$("#div_content2").html()){
							mdui.alert('保存内容不一致，请再次保存');
							return false;
						}
					}
					
					</script>
					
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="submit" value="提交">
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="reset" value="重置">
				</form>
			</div>
			<div id="example3-tab3">
				<form id="form3" action="./base/delete.php" method="post" onsubmit="return verify()">
					<ul class="admin_hidden"><li><small>只能删除<strong><span id="del_nickname_alert"></span></strong>的文章</small></li></ul>
					<script>
						var nickname=document.getElementById("nickname").innerHTML;
						document.getElementById("del_nickname_alert").innerText=nickname;
					</script>
					<p>标题：
					<select id="title_del" name="title" class="mdui-select" mdui-select>
					<option value="0">--请选择--</option>
					<?php
					include "config.php";
					$nickname=$_SESSION['nickname'];
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					mysqli_set_charset($conn,"utf8");

					$sql = "select * from admin where nickname='$nickname'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$sql= "select title from essay";
					} else {
						$sql= "select title from essay where nickname='$nickname'";
					}

					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0)
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<option value='$row[title]'>$row[title]</option>";//循环，拼凑下拉框选项
					} 
					$conn->close();
					?>
					</select>
					</p>
					
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="submit" value="提交">
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="reset" value="重置">
				</form>
			</div>
			<div id="example3-tab4">
			<div class="mdui-row" style="margin-left:10px;margin-top:10px;">
				<div id="example3-tab4_col" class="mdui-col-xs-2">
					<div class="mdui-textfield-expandable">
						<button onclick="search_get_content()" class="mdui-btn mdui-btn-raised mdui-color-theme-a400" style="margin-left:10px">确定</button>
					</div>
				</div>
				<div id="example3-tab4_col2" class="mdui-col-xs-9">
					<div class="mdui-textfield mdui-textfield-expandable">
					<button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
					<input id="example3-tab4_finds-btn" class="mdui-textfield-input" type="text" placeholder="输入文章标题查找内容"/>
					<button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">close</i></button>
					</div>
				</div>
				<div id="div_content3" class="mdui-textfield-input"></div>
				<script>
				if(window.outerWidth < 600 || device_state == false){
					$$('#example3-tab4_col').removeClass('mdui-col-xs-2')
					$$('#example3-tab4_col2').removeClass('mdui-col-xs-9')
					$$('#example3-tab4_col').addClass('mdui-col-xs-5')
					$$('#example3-tab4_col2').addClass('mdui-col-xs-6')
				}
				// 输入标题读取内容
				function search_get_content(){
						var xmlhttp = new XMLHttpRequest;
						var nickname = document.getElementById("nickname").innerHTML;
						var val = document.getElementById("example3-tab4_finds-btn").value;
						if(val == ""){
							mdui.alert("请先输入标题");
							return;
						}
						xmlhttp.open("GET","./ajax/title_up_content.php?name="+nickname+"&title="+val);
						xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						xmlhttp.send();
						xmlhttp.onreadystatechange = function(){
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
								var rst = JSON.parse(xmlhttp.responseText);
								if(rst == "0"){
									mdui.alert("没有找到标题是 "+val+" 的内容");
								}else{
									document.getElementById("div_content3").innerHTML = rst;
								}
							}
						}
					}
				</script>
			</div>
			</div>
			<div id="example3-tab5">
				<form id="form3_4" action="./base/insert2.php" method="post" onsubmit="return verify()">
					<p>标题：
					<select id="comment_up" name="title" class="mdui-select" mdui-select>
					<option value="0">--请选择--</option>
					<?php
					include "config.php";
					$nickname=$_SESSION['nickname'];
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					mysqli_set_charset($conn,"utf8");
					$sql= "select title from essay";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0)
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<option value='$row[title]'>$row[title]</option>";//循环，拼凑下拉框选项
					} 
					$conn->close();
					?>
					</select>
					</p>
					
					<div class="mdui-textfield mdui-textfield-floating-label">
						<label class="mdui-textfield-label">评论</label>
						<textarea class="mdui-textfield-input" name="comment" type="text" maxlength="100" required/></textarea>
						<div class="mdui-textfield-error">评论不能为空</div>
					</div>
					
					<div class="mdui-textfield mdui-textfield-floating-label">
						<label class="mdui-textfield-label">作者</label>
						<input id="author2" class="mdui-textfield-input" name="nickname" type="text" readonly/>
						<div class="mdui-textfield-helper">只读字段</div>
					</div>
					
					
					<div><p>是否匿名：
					<label class="mdui-switch">
						<input id="switch_name_id" onblur="switch_name()" type="checkbox"/>
						<i class="mdui-switch-icon"></i>
					</label></p>
					</div>
					
					<script>
					// 实现匿名功能
					var anonymous_nickname = document.getElementById("nickname").innerHTML;
					var anonymous_author2 = document.getElementById("author2");
					anonymous_author2.value = anonymous_nickname;
					
					function switch_name(){
						var name_id = document.getElementById("switch_name_id");
						if(name_id.checked == true){
							anonymous_author2.value = "匿名";
						}
						else if(name_id.checked != true){
							anonymous_author2.value = anonymous_nickname;
						}
					}
					</script>
					
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="submit" value="提交">
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="reset" value="重置">
				</form>
			</div>
			<div id="example3-tab6">
				<form id="form3_5" action="./base/delete2.php" method="post" onsubmit="return verify()">
					<ul class="admin_hidden"><li><small>只能删除<strong><span id="del2_nickname_alert"></span></strong>的文章的评论</small></li></ul>
					<script>
						var nickname=document.getElementById("nickname").innerHTML;
						document.getElementById("del2_nickname_alert").innerText=nickname;
					</script>
					<p>评论：
					<select id="comment_del" name="comment" class="mdui-select" mdui-select>
					<option value="0">--请选择--</option>
					<?php
					include "config.php";
					$nickname=$_SESSION['nickname'];
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					mysqli_set_charset($conn,"utf8");

					$sql = "select * from admin where nickname='$nickname'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$sql= "select title from essay";
					} else {
						$sql= "select title from essay where nickname='$nickname'";
					}

					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0)
					while($row = mysqli_fetch_assoc($result))
					{
						$title3 = $row["title"];
						$sql3= "select * from comment where title='$title3'";
						$res3 = mysqli_query($conn, $sql3);
						if (mysqli_num_rows($res3) > 0)
						while($row3 = mysqli_fetch_assoc($res3))
						{
							echo "<option value='$row3[comment]'>$row3[title]，$row3[nickname]：$row3[comment]</option>";
						}
					}
					$conn->close();
					?>
					</select>
					</p>
					
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="submit" value="提交">
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="reset" value="重置">
				</form>
			</div>
			<script>
			// 验证是否输入标题
			function getval(id){
				var id = document.getElementById(id);
				var index = id.selectedIndex;
				var val = id.options[index].text;
				return val;
			}
				
			function verify() {
				if (getval("title_up") == "--请选择--"&&getval("title_del") == "--请选择--"&&getval("comment_up") == "--请选择--"&&getval("comment_del") == "--请选择--") {
					mdui.alert('请先选择标题');
					return false;
				}
			}
			</script>
		</div>
	</div>
	<div class="mdui-row mdui-p-a-2" id="tab3-content">
		<div class="mdui-col-xs-12">
			<div class="mdui-appbar">
			<div class="mdui-tab mdui-color-theme-300" mdui-tab>
				<a id="info_tab1" href="#example5-tab0" class="mdui-ripple mdui-ripple-white">个人首页</a>
				<a href="#example5-tab1" class="mdui-ripple mdui-ripple-white">个人信息设置</a>
				<a href="#example5-tab2" class="mdui-ripple mdui-ripple-white">个人相册</a>
				<a href="#example5-tab3" class="mdui-ripple mdui-ripple-white">关注用户</a>
				<a id="info_tab2" href="#example5-tab4" class="mdui-ripple mdui-ripple-white">朋友圈</a>
				<a href="#example5-tab5" class="mdui-ripple mdui-ripple-white">经验积分</a>
				<a href="#example5-tab6" class="mdui-ripple mdui-ripple-white">修改密码</a>
				<a href="#example5-tab7" class="mdui-ripple mdui-ripple-white admin_show" hidden>小黑屋</a>
			</div>
			</div>
			
			<div id="example5-tab0">
				<div id="info" hidden>
				<?php
				include "config.php";
				
				$nickname = $_SESSION['nickname'];
				 
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
				
				$nickname = $_SESSION['nickname'];
				
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
				
				<div class="mdui-card">
					<div class="mdui-card-header" style="cursor:pointer;">
					<img class="mdui-card-header-avatar" id="pic_info_show" src="./images/icon1.jpg"/>
					<div class="mdui-card-header-subtitle">欢迎：</div>
					<div class="mdui-card-header-title" id="nickname_info_show"></div>
					</div>
					
					<div class="mdui-card-media" style="cursor:pointer;">
						<img id="card_pic_info_show" src="./images/bg10.jpg"/>
						<div class="mdui-card-menu">
							<button class="mdui-btn mdui-btn-icon mdui-text-color-theme">
							<i mdui-dialog="{target: '#card_pic_dialog'}" class="mdui-icon material-icons">swap_horiz</i>
							</button>
						</div>
						<div class="mdui-card-media-covered">
							<div class="mdui-card-primary">
							<div class="mdui-card-primary-title" id="nickname_info_show2"></div>
							<div class="mdui-card-primary-subtitle" id="username_info_show"></div>
							</div>
						</div>
					</div>

					<div class="mdui-dialog" id="card_pic_dialog">
						<div class="mdui-dialog-content">
						<div class="mdui-dialog-title">头像卡片</div>
							<form id="card_pic_tab">
								<label class="mdui-radio">
									<input type="radio" name="card"/>
									<i class="mdui-radio-icon"></i>
									<span class="mdui-text-color-theme">默认</span>
								</label>
								<br/>
								<label class="mdui-radio">
									<input type="radio" name="card"/>
									<i class="mdui-radio-icon"></i>
									<span class="mdui-text-color-theme">东方系列</span>
								</label>
							</form>
						</div>
						<div class="mdui-dialog-actions">
							<button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
							<button class="mdui-btn mdui-ripple" mdui-dialog-confirm>确定</button>
						</div>
					</div>

					<script>
						// 设置面板的选中状态
						function set_tab_checked(id,str){
							var tab = $$(id).find('span');
							for(var i=0;i<tab.length;i++){
								if(tab[i].innerText == str){
									var input = $$(tab[i]).prevAll('input');
									$$(input).prop('checked', true);
									break;
								}
							}
						}
						// 取得面板的选中值
						function get_tab_val(id){
							var input = $$(id).find('input');
							for(var i=0;i<input.length;i++){
								if($$(input[i]).prop('checked')==true){
									var sel = $$(input[i]).nextAll('span').text();
									break;
								}
							}
							return sel;
						}
						// 设置面板的隐藏和锁定状态
						function set_tab_hidden(id,str){
							var theme_span = $$(id).find('span');
							for(var i=0;i<theme_span.length;i++){
								if(theme_span[i].innerText == str){
									var theme_input = $$(theme_span[i]).prevAll('input');
									$$(theme_input.parent()).prop('hidden', true);
									$$(theme_input).prop('disabled', true);
									break;
								}
							}
						}

						// 设置卡片的值
						function set_card_info(){
							var xmlhttp = new XMLHttpRequest;
							var nickname = document.getElementById("nickname").innerHTML;
							xmlhttp.open("GET","./ajax/card_sel.php?name="+nickname);
							xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
							xmlhttp.send();
							xmlhttp.onreadystatechange = function(){
								if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
									var rst = JSON.parse(xmlhttp.responseText);
									$$('#card_pic_info_show').attr('src',rst);
									if(rst=="./images/bg10.jpg"){
										set_tab_checked("#card_pic_tab","默认");
									}
									if(rst=="./images/touhou/card_touhou.jpg"){
										set_tab_checked("#card_pic_tab","东方系列");
									}
								}
							}
						}
						window.onload = set_card_info();

						// 更新卡片的值
						document.getElementById('card_pic_dialog').addEventListener('confirm.mdui.dialog', function () {
							var card_pic_sel = get_tab_val("#card_pic_tab");
							if(card_pic_sel == "默认"){
								var card = "./images/bg10.jpg";
							}
							if(card_pic_sel == "东方系列"){
								var card = "./images/touhou/card_touhou.jpg";
							}
							var xmlhttp = new XMLHttpRequest;
							var nickname = document.getElementById("nickname").innerHTML;
							xmlhttp.open("GET","./ajax/card_up.php?name="+nickname+"&card="+card);
							xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
							xmlhttp.send();
							xmlhttp.onreadystatechange = function(){
								if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
									var rst = JSON.parse(xmlhttp.responseText);
									mdui.alert(rst);
								}
							}
						});

						// 判断是否购买过东方系列
						function touhou_if_buy_card(){
							var xmlhttp = new XMLHttpRequest;
							var nickname = document.getElementById("nickname").innerHTML;
							xmlhttp.open("GET","./ajax/touhou_if_buy.php?name="+nickname);
							xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
							xmlhttp.send();
							xmlhttp.onreadystatechange = function(){
								if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
									var rst = JSON.parse(xmlhttp.responseText);
									if(rst == "没有购买东方系列"){
										set_tab_hidden("#card_pic_tab","东方系列");
									}
								}
							}
						}
						window.onload = touhou_if_buy_card();
					</script>
					
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
					<button class="mdui-btn mdui-ripple" onclick="info_btn(1)">关注</button>
					<button class="mdui-btn mdui-ripple" onclick="info_btn(2)">私信</button>
					<button class="mdui-btn mdui-btn-icon mdui-float-right"><i class="mdui-icon material-icons">share</i></button>
					</div>
				</div>
				
			</div>
			
			<div id="example5-tab1" >
				<form id="form4" action="./base/insertinfo.php" method="post" onsubmit="return verify_pic()">
					<div class="mdui-textfield mdui-textfield-floating-label">
						<label class="mdui-textfield-label">昵称</label>
						<input id="nicknameinfo" class="mdui-textfield-input" name="nickname" type="text" readonly/>
						<div class="mdui-textfield-helper">只读字段</div>
					</div>
					<script>
						var nickname=document.getElementById("nickname").innerHTML;
						document.getElementById("nicknameinfo").value=nickname;
					</script>
					<div class="mdui-textfield mdui-textfield-floating-label" hidden>
						<label class="mdui-textfield-label">头像</label>
						<input id="pic3" class="mdui-textfield-input" name="pic" type="text" readonly/>
						<div class="mdui-textfield-helper">只读字段</div>
					</div>
					<p>请选择头像：
					<select id="pic2" class="mdui-select" name="pic_sel" onchange="document.images['idface'].src=options[selectedIndex].value;" mdui-select>
					<option value="./images/icon1.jpg" >头像01</option>
					<option value="./images/icon2.jpg" >头像02</option>
					<option value="./images/icon3.jpg" >头像03</option>
					<option value="./images/icon4.jpg" >头像04</option>
					<option value="./images/icon5.jpg" >头像05</option>
					</select>
					<input onclick="set_pic_sel()" class="mdui-btn mdui-color-theme-accent mdui-ripple" style="width: 30px;" value="保存">
					<div>
						头像预览：<img src="./images/icon1.jpg" id="idface">
					</div>
					</p>
					<script>
						// 保存默认头像修改
						function set_pic_sel(){
							$$('#pic3').val($$('#pic2').val());
						}
					</script>
					
					<div class="mdui-row">
						<div class="mdui-col-xs-10" style="border-style: none">
							<div class="mdui-textfield mdui-textfield-floating-label">
								<label class="mdui-textfield-label">邮箱</label>
								<input id="email2" class="mdui-textfield-input" name="email" type="email" required/>
								<div class="mdui-textfield-error">邮箱格式错误</div>
								<div class="mdui-textfield-helper">必填项，请输入合法的邮箱</div>
							</div>
						</div>
						<div class="mdui-col-xs-2 mdui-typo" style="border-style: none">
							<a style="margin-top: 40px;cursor: pointer;">验证邮箱</a>
						</div>
					</div>
					
					<div class="mdui-textfield">
						<label class="mdui-textfield-label">生日</label>
						<input id="bday2" class="mdui-textfield-input" name="bday" type="date" required/>
						<div class="mdui-textfield-helper">使用浏览器支持的日期选择器进行输入</div>
					</div>
					
					<div class="mdui-textfield mdui-textfield-floating-label">
					<label class="mdui-textfield-label">城市：</label>
						<input id="city2" value="未知" name="city" class="mdui-textfield-input" type="text"/>
					</div>
					
					<div style="margin-top:30px">
					<p>性别：
					<select id="sex2" name="sex" class="mdui-select" mdui-select>
						<option value="男">男</option>
						<option value="女">女</option>
					</select>
					</p>
					</div>
					
					<div class="mdui-textfield mdui-textfield-floating-label">
					<label class="mdui-textfield-label">QQ：</label>
						<input id="qq2" name="qq" class="mdui-textfield-input" type="text" pattern="^[1-9][0-9]{4,12}$" required/>
						<div class="mdui-textfield-error">不能以0开头，只能是数字0到9，长度在4到12之间</div>
						<div class="mdui-textfield-helper">必填项，请输入合法的QQ号码</div>
					</div>
					
					<div class="mdui-textfield mdui-textfield-floating-label">
					<label class="mdui-textfield-label">年龄：</label>
						<input id="age2" name="age" class="mdui-textfield-input" type="text" pattern="^(?:[1-9][0-9]?|1[01][0-9]|120)$" required/>
						<div class="mdui-textfield-error">不能以0开头，只能是数字0到9，范围在1到120之间</div>
						<div class="mdui-textfield-helper">必填项，请输入合法的年龄</div>
					</div>
					
					<div class="mdui-textfield mdui-textfield-floating-label">
						<label class="mdui-textfield-label">个人介绍</label>
						<textarea id="mess2" class="mdui-textfield-input" name="mess" type="text" maxlength="128" required/></textarea>
						<div class="mdui-textfield-error">不能为空</div>
					</div>
					
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="submit" value="提交">
				<input class="mdui-btn mdui-color-red-accent mdui-ripple" type="reset" value="重置">
				</form>
				<script>
					function verify_pic(){
						if($$('#pic3').val()==""){
							mdui.alert("请先保存头像");
							return false;
						}
					}
				</script>
				
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
				function setinfo2(id,info){
					document.getElementById(id).value = info;
				}
				
				if(info.search("0 结果")!=-1){
					document.getElementById("info_tab1").disabled = true;
					document.getElementById("info_tab2").disabled = true;
					document.getElementById("new_user_message").innerText = "还没有设置个人信息，部分功能不可用";
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
					
					setinfo2("pic3",pic_info);
					setinfo2("email2",email_info);
					setinfo2("bday2",bday_info);
					setinfo2("city2",city_info);
					setinfo2("sex2",sex_info);
					setinfo2("qq2",qq_info);
					setinfo2("age2",age_info);
					setinfo2("mess2",mess_info);
					
					setinfo("nickname_info_show_drawer",nickname_info);
					document.getElementById("pic_info_show_drawer").src = pic_info;
					setinfo("mess_info_show_drawer",mess_info);
				}
				
				function info_btn(val){
					switch(val){
						case 1:
							mdui.alert("不能关注自己");
							break;
						case 2:
							mdui.alert("不能私信自己");
							break;
						default:
							mdui.alert("错误");
							break;
					}
				}
			</script>
		
		<div id="example5-tab2" >
			<div class="mdui-row mdui-typo">
				<div class="mdui-col-xs-4" style="margin:10px;padding-left:10px">
					<form action="upload.php" method="post" enctype="multipart/form-data">
						<div class="mdui-textfield mdui-textfield-floating-label" hidden>
							<label class="mdui-textfield-label">昵称</label>
							<input id="upload_user" class="mdui-textfield-input" name="nickname" type="text" readonly/>
							<div class="mdui-textfield-helper">只读字段</div>
							<script>
								var nickname=document.getElementById("nickname").innerHTML;
								document.getElementById("upload_user").value=nickname;
							</script>
						</div>
						<div class="mdui-textfield" style="padding:1px 0 16px 0">
							<label class="mdui-textfield-label">图片命名</label>
							<input class="mdui-textfield-input" name="name" type="text" required/>
						</div>
						<p>上传提示：
							<small><ul>
								<li>上传后将从图片的左上角裁剪 1 : 1 保存</li>
								<li>上传的重名图片将会覆盖之前的图片</li>
								<li>上传的图片大小限制在标准的 1 mb</li>
								<li>更新的图片在相册存在缓存延迟</li>
								<li>上传的图片配额：
									<a href="javascript:;" onclick="lv_show()">点击获取</a>
									<span id="lv_now" style="margin-left:10px"></span>
								</li>
							</ul></small>
						</p>
						<script>
						// 取得当前用户的图片配额和等级
						function lv_show(){
							var xmlhttp = new XMLHttpRequest;
							var nickname = document.getElementById("nickname").innerHTML;
							xmlhttp.open("GET","./ajax/lv_sel.php?name="+nickname);
							xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
							xmlhttp.send();
							xmlhttp.onreadystatechange = function(){
								if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
									var rst = JSON.parse(xmlhttp.responseText);
									document.getElementById("lv_now").innerText = rst.quota+"/"+rst.lv;
								}
							}
						}
						</script>
						<label for="file">上传图片：</label>
						<a class="testfile mdui-btn mdui-btn-raised mdui-ripple">选择文件
							<input style="cursor:pointer" type="file" name="file" id="file">
						</a>
						<input id="file_sub" class="mdui-btn mdui-btn-raised mdui-ripple" style="margin-left:5px" type="submit" name="submit" value="上传">
						<div style="margin-top:20px">图片预览：<output id="filesinfo"></output></div>
					</form>
					<script>
					// 响应式设计
					if(device_state == false){
						var file_sub = document.getElementById("file_sub");
						file_sub.classList.add("file_sub");
					}
					</script>
				</div >
				<div class="mdui-col-xs-7" style="margin:10px 0 0 5px;padding:10px 15px">
					<div class="mdui-row-sm-3 mdui-row-md-4 mdui-row-lg-5 mdui-row-xl-6 mdui-grid-list">
					<?php
					include "config.php";
	 
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
						die("连接失败: " . $conn->connect_error);
					}
					mysqli_set_charset($conn,"utf8");
					
					$nickname=$_SESSION['nickname'];
					
					$sql2 = "select path,name from uploads where nickname = '$nickname'";
					$result2 = $conn->query($sql2);
					
					if ($result2->num_rows > 0) {
						while($row = $result2->fetch_assoc()) {
							$put_name = str_replace($nickname,"",$row["name"]);
							echo "<div class='mdui-col'>
							<div class='mdui-grid-tile'>
								<a href='javascript:;' onclick='setbg_test(this)'><img class='mdui-img-rounded' src='".$row["path"]."'/></a>
								<div class='mdui-grid-tile-actions'>
									<div class='mdui-grid-tile-text'>
										<div class='mdui-grid-tile-title'>".$put_name."</div>
									</div>
									<div class='mdui-grid-tile-buttons'>
										<button onclick='getpath_test(this)' class='mdui-btn mdui-btn-icon'><i class='mdui-icon material-icons'>delete_sweep</i></button>
									</div>
								</div>
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
			
			<script>
				function setbg_test(obj){
					mdui.confirm('是否设置这个图片为新的头像？', function(){
						var t = $$(obj).children();
						var path = $$(t[0]).attr('src');
						var xmlhttp = new XMLHttpRequest;
						var nickname = document.getElementById("nickname").innerHTML;
						xmlhttp.open("GET","./ajax/file_setbg.php?nickname="+nickname+"&path="+path);
						xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						xmlhttp.send();
						xmlhttp.onreadystatechange = function(){
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
								var rst = JSON.parse(xmlhttp.responseText);
								mdui.alert(rst.state,function(){
									location.reload();
								});
							}
						}
					});
				}
				// 实现图片删除
				function getpath_test(obj){
					mdui.confirm('是否删除这个图片？', function(){
						var t = $$(obj).closest('.mdui-grid-tile-actions').prev().children();
						var path = $$(t[0]).attr('src');
						var xmlhttp = new XMLHttpRequest;
						var nickname = document.getElementById("nickname").innerHTML;
						xmlhttp.open("GET","./ajax/file_del.php?nickname="+nickname+"&path="+path);
						xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						xmlhttp.send();
						xmlhttp.onreadystatechange = function(){
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
								var rst = JSON.parse(xmlhttp.responseText);
								mdui.alert(rst.state);
							}
						}
					});
				}
			
				// 实现上传图片预览
				function fileSelect(evt) {
					if (window.File && window.FileReader && window.FileList && window.Blob) {
						var files = evt.target.files;
				 
						var result = '';
						var file;
						for (var i = 0; file = files[i]; i++) {
							// 如果上传文件不是图片
							if (!file.type.match('image.*')) {
								continue;
							}
				 
							reader = new FileReader();
							reader.onload = (function (tFile) {
								return function (evt) {
									// 如果已经存在 fileshow 则从 filesinfo 中移除
									if(document.getElementById("fileshow")) {
										document.getElementById('filesinfo').removeChild(document.getElementById("fileshow"));
									}
									var div = document.createElement('div');
									div.id = "fileshow";
									div.innerHTML = '<img style="width:100px; margin:10px;" src="' + evt.target.result + '" />';
									document.getElementById('filesinfo').appendChild(div);
								};
							}(file));
							reader.readAsDataURL(file);
						}
					} else {
						alert("浏览器不支持");
					}
				}
			 
			document.getElementById('file').addEventListener('change', fileSelect, false);
			</script>
		</div>
				
		<div id="example5-tab3">
			<div>
				<ul class="mdui-list">
				<?php
					include "config.php";
					
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
						die("连接失败: " . $conn->connect_error);
					}
					mysqli_set_charset($conn,"utf8");
					
					$nickname = $_SESSION['nickname'];
										
					$sql = "select * from follow where nickname = '$nickname'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$follow_name = $row["name"];

							$sql2 = "select nickname,pic,mess from userinfo where nickname = '$follow_name'";
							$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
								while($row2 = $result2->fetch_assoc()) {
									echo "
										<li class='mdui-list-item mdui-ripple'>
											<div class='mdui-list-item-avatar'>
												<img src='".$row2["pic"]."'/>
											</div>
											<div class='mdui-list-item-content'>
												<div class='mdui-list-item-title find-nickname-list'>".$row2["nickname"]."</div>
												<div class='mdui-list-item-text mdui-list-item-one-line'>".$row2["mess"]."</div>
											</div>
											<i onclick='get_name_test(this)' class='mdui-list-item-icon mdui-icon material-icons'>arrow_forward</i>
										</li>
									";
								}
							}
						}
					} else {
						echo "<li>没有关注任何用户</li>";
					}
					
					$conn->close();
				?>
				</ul>
			</div>
		</div>
			
		<div id="example5-tab4">
			<div class="mdui-typo">
				<blockquote>
				<p>友谊之光像磷火，当四周漆黑之际最为显露。</p>
				<footer> —— 奥利弗·克伦威尔</footer>
				<footer><em>提示：只能搜索到已设置个人信息的用户</em></footer>
				</blockquote>
			</div>
			<div class="mdui-row" style="margin-left:10px;margin-top:10px;">
				<div id="tab3_col" class="mdui-col-xs-2">
					<div class="mdui-textfield-expandable">
						<button id="find-nickname-btn" class="mdui-btn mdui-btn-raised mdui-color-theme-a400" style="margin-left:10px">确定</button>
					</div>
				</div>
				<div id="tab3_col2" class="mdui-col-xs-9">
					<div class="mdui-textfield mdui-textfield-expandable">
					<button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
					<input id="finds-btn" class="mdui-textfield-input" type="text" placeholder="输入昵称查找用户"/>
					<button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">close</i></button>
					</div>
				</div>
				<script>
				if(window.outerWidth < 600 || device_state == false){
					var tab3_col = document.getElementById("tab3_col");
					var tab3_col2 = document.getElementById("tab3_col2");
					tab3_col.classList.remove("mdui-col-xs-2");
					tab3_col2.classList.remove("mdui-col-xs-9");
					tab3_col.classList.add("mdui-col-xs-5");
					tab3_col2.classList.add("mdui-col-xs-6");
				}
				</script>
			</div>
			<div>
			<?php
				include "config.php";
				 
				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("连接失败: " . $conn->connect_error);
				} 
				mysqli_set_charset($conn,"utf8");
				 
				$sql = "select nickname,pic,mess from userinfo";
				$result = $conn->query($sql);
				 
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo "<ul class='mdui-list'>";
						echo "<div class='find-box-list' hidden>
							<li class='mdui-list-item mdui-ripple '>
								<div class='mdui-list-item-avatar'>
									<img src='".$row["pic"]."'/></div>
									<div class='mdui-list-item-content'>
									<div class='mdui-list-item-title find-nickname-list'>".$row["nickname"]."</div>
									<div class='mdui-list-item-text mdui-list-item-one-line'>".$row["mess"]."</div>
								</div>
								<i onclick='get_name_test(this)' class='mdui-list-item-icon mdui-icon material-icons'>arrow_forward</i>
							</li>
							</div>
							";
						echo "</ul>";
					}
				} else {
					echo "0 结果";
				}
				$conn->close();
			?>
			</div>
			
			<script>
			// 打开选择的用户的个人信息
			function get_name_test(obj){
				var nickname = document.getElementById("nickname").innerHTML;
				// 取得发送的用户名
				var t = $$(obj).prev().find('.find-nickname-list');
				var name = t[0].innerText;
				// 获取body的主题类名
				var body_class = $$('#body_bg').attr('class');
				var theme = body_class.split("mdui-theme-primary-")[1].split(" ")[0];
				// 跳转页面
				window.location = "info.php?name="+name+"&nickname="+nickname+"&theme="+theme;
			}
			
			// 实现在find-box-list中查找finds-btn输入的昵称
			// 通过改变box的hidden显示出来
			document.getElementById("find-nickname-btn").onclick = function(){
				var list = document.getElementsByClassName("find-nickname-list");
				var box = document.getElementsByClassName("find-box-list");
				var finds = document.getElementById("finds-btn");
				var extend = false;
				if(finds.value!=""){
					for (var i = 0; i < list.length; i++){
						if(finds.value==list[i].innerText){
							box[i].hidden="";
							for(var j = 0; j < box.length; j++){
								if(box[j]!=box[i]){
									box[j].hidden=true;
								}
							}
							extend = true;
							break;
						}
					}
					if(extend==false){
						mdui.alert("没有找到："+finds.value);
					}
				}else{
					mdui.alert("没有输入昵称");
				}
			}
		</script>
		</div>

		<div id="example5-tab5">
			<div class="mdui-typo">
				<ul class="mdui-list">
					<div style="padding-left:10px">当前等级：<strong>LV.<span id="experience_lv"></span></strong></div>
					<div class="mdui-row">
						<div class="mdui-col-xs-9">
							<div class="mdui-progress">
								<div class="mdui-progress-determinate" id="lv_progress" style="width: 0%;"></div>
							</div>
						</div>
						<span id="experience_int2" style="margin-left:20px"></span>
						<span>/</span>
						<span id="experience_lv2"></span>
						
					</div>
					
					<button class="mdui-btn mdui-ripple" mdui-dialog="{target: '#example-3-level'}">查看等级列表</button>
					
					<div class="mdui-dialog" id="example-3-level">
						<div class="mdui-dialog-content">
						<div class="mdui-dialog-title">等级与经验表</div>
							<ul class="mdui-list">
							<li class="mdui-list-item mdui-ripple">LV.1<span style="margin-left:20px">需要 0 经验</span></li>
							<li class="mdui-list-item mdui-ripple">LV.2<span id ="lv2" style="margin-left:20px">需要 20 经验</span></li>
							<li class="mdui-list-item mdui-ripple">LV.3<span id ="lv3" style="margin-left:20px">需要 50 经验</span></li>
							<li class="mdui-list-item mdui-ripple">LV.4<span id ="lv4" style="margin-left:20px">需要 90 经验</span></li>
							<li class="mdui-list-item mdui-ripple">LV.5<span id ="lv5" style="margin-left:20px">需要 140 经验</span></li>
							<li class="mdui-list-item mdui-ripple">LV.6<span id ="lv6" style="margin-left:20px">需要 200 经验</span></li>
							<li class="mdui-list-item mdui-ripple">LV.7<span id ="lv7" style="margin-left:20px">需要 270 经验</span></li>
							<li class="mdui-list-item mdui-ripple">LV.8<span id ="lv8" style="margin-left:20px">需要 350 经验</span></li>
							<li class="mdui-list-item mdui-ripple">LV.9<span id ="lv9" style="margin-left:20px">需要 440 经验</span></li>
							</ul>
						</div>
						<div class="mdui-dialog-actions">
							<button class="mdui-btn mdui-ripple" mdui-dialog-close>关闭</button>
						</div>
					</div>
			
					
					<li class="mdui-list-item mdui-ripple" onclick="experience_show()">
					<i class="mdui-list-item-icon mdui-icon material-icons">monetization_on</i>
						<div class="mdui-list-item-content">当前经验：
							<span id="experience_int"></span>
						</div>
					</li>
						<ul>
							<li>每日签到 + 3 经验</li>
							<li>发表文章 + 5 经验<small style="margin-left:5px">每天仅限 1 次</small></li>
							<li>发表评论 + 1 经验<small style="margin-left:5px">每天仅限 3 次</small></li>
						</ul>
					<hr/>
					<li class="mdui-list-item mdui-ripple" onclick="points_show()">
					<i class="mdui-list-item-icon mdui-icon material-icons">monetization_on</i>
						<div class="mdui-list-item-content">当前积分：
							<span id="points_int"></span>
						</div>
					</li>
					<script>
					// 动态取得所需等级值
					function get_lv(id){
						return document.getElementById(id).innerText.split(" ")[1];
					}
					// 小数转百分比
					function toPercent(point){
						var str=Number(point*100).toFixed(1);
						str += "%";
						return str;
					}
					// 取得当前用户的积分
					function points_show(){
						var xmlhttp = new XMLHttpRequest;
						var nickname = document.getElementById("nickname").innerHTML;
						xmlhttp.open("GET","./ajax/points_sel.php?name="+nickname);
						xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						xmlhttp.send();
						xmlhttp.onreadystatechange = function(){
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
								var rst = JSON.parse(xmlhttp.responseText);
								document.getElementById("points_int").innerText = rst;
							}
						}
					}
					// 取得用户的经验并更新等级和进度条
					function experience_show(){
						var xmlhttp = new XMLHttpRequest;
						var nickname = document.getElementById("nickname").innerHTML;
						xmlhttp.open("GET","./ajax/experience_sel.php?name="+nickname);
						xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						xmlhttp.send();
						xmlhttp.onreadystatechange = function(){
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
								var rst = JSON.parse(xmlhttp.responseText);
								document.getElementById("experience_int").innerText = rst;
								document.getElementById("experience_int2").innerText = rst;
								if(parseInt(rst) < parseInt(get_lv("lv2"))){
									document.getElementById("experience_lv").innerText = "1";
									document.getElementById("experience_lv2").innerText = get_lv("lv2");
									document.getElementById("lv_progress").style.width = toPercent(parseInt(rst)/parseInt(get_lv("lv2")));
									update_lv(1);
								}else if(parseInt(rst) < parseInt(get_lv("lv3"))){
									document.getElementById("experience_lv").innerText = "2";
									document.getElementById("experience_lv2").innerText = get_lv("lv3");
									document.getElementById("lv_progress").style.width = toPercent(parseInt(rst)/parseInt(get_lv("lv3")));
									update_lv(2);
								}else if(parseInt(rst) < parseInt(get_lv("lv4"))){
									document.getElementById("experience_lv").innerText = "3";
									document.getElementById("experience_lv2").innerText = get_lv("lv4");
									document.getElementById("lv_progress").style.width = toPercent(parseInt(rst)/parseInt(get_lv("lv4")));
									update_lv(3);
								}else if(parseInt(rst) < parseInt(get_lv("lv5"))){
									document.getElementById("experience_lv").innerText = "4";
									document.getElementById("experience_lv2").innerText = get_lv("lv5");
									document.getElementById("lv_progress").style.width = toPercent(parseInt(rst)/parseInt(get_lv("lv5")));
									update_lv(4);
								}else if(parseInt(rst) < parseInt(get_lv("lv6"))){
									document.getElementById("experience_lv").innerText = "5";
									document.getElementById("experience_lv2").innerText = get_lv("lv6");
									document.getElementById("lv_progress").style.width = toPercent(parseInt(rst)/parseInt(get_lv("lv6")));
									update_lv(5);
								}else if(parseInt(rst) < parseInt(get_lv("lv7"))){
									document.getElementById("experience_lv").innerText = "6";
									document.getElementById("experience_lv2").innerText = get_lv("lv7");
									document.getElementById("lv_progress").style.width = toPercent(parseInt(rst)/parseInt(get_lv("lv7")));
									update_lv(6);
								}else if(parseInt(rst) < parseInt(get_lv("lv8"))){
									document.getElementById("experience_lv").innerText = "7";
									document.getElementById("experience_lv2").innerText = get_lv("lv8");
									document.getElementById("lv_progress").style.width = toPercent(parseInt(rst)/parseInt(get_lv("lv8")));
									update_lv(7);
								}else if(parseInt(rst) < parseInt(get_lv("lv9"))){
									document.getElementById("experience_lv").innerText = "8";
									document.getElementById("experience_lv2").innerText = get_lv("lv9");
									document.getElementById("lv_progress").style.width = toPercent(parseInt(rst)/parseInt(get_lv("lv8")));
									update_lv(8);
								}else{
									document.getElementById("experience_lv").innerText = "9";
									document.getElementById("experience_lv2").innerText = "MAX";
									document.getElementById("lv_progress").style.width = "100%";
									update_lv(9);
								}
							}
						}
					}
					// 更新数据库的等级
					function update_lv(lv){
						var xmlhttp = new XMLHttpRequest;
						var nickname = document.getElementById("nickname").innerHTML;
						xmlhttp.open("GET","./ajax/update_lv.php?name="+nickname+"&lv="+lv);
						xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						xmlhttp.send();
					}
					</script>
						<ul>
							<li>每日签到 + 3 积分</li>
						</ul>
				</ul>
			</div>
		</div>
		<div id="example5-tab6">
			<form id="form5_6" action="./base/update2.php" method="post" onsubmit="return test_same()">
				<div class="mdui-textfield mdui-textfield-floating-label">
					<label class="mdui-textfield-label">昵称</label>
					<input id="author_user" class="mdui-textfield-input" name="nickname" type="text" readonly/>
					<div class="mdui-textfield-helper">只读字段</div>
				</div>
				<script>
					var nickname=document.getElementById("nickname").innerHTML;
					document.getElementById("author_user").value=nickname;
				</script>
				<div class="mdui-textfield mdui-textfield-floating-label">
					<label class="mdui-textfield-label">旧密码</label>
					<input class="mdui-textfield-input" id="old_password" name="old_password" type="password" required//>
					<div class="mdui-textfield-error">密码不能为空</div>
				</div>
				<div class="mdui-textfield mdui-textfield-floating-label">
					<label class="mdui-textfield-label">新密码</label>
					<input class="mdui-textfield-input" id="new_password" name="new_password" type="password" required/>
					<div class="mdui-textfield-error">密码不能为空</div>
					<div class="mdui-textfield-helper">新密码不能和旧密码一样</div>
				</div>
				
				<input class="mdui-btn mdui-ripple mdui-color-theme-accent" type="submit" value="提交">
				<input class="mdui-btn mdui-ripple mdui-color-theme-accent" type="reset" value="重置">
			</form>
			<script>
			function test_same(){
				if(document.getElementById("old_password").value == document.getElementById("new_password").value){
					mdui.alert("新密码不能和旧密码一样");
					return false;
				}
			}
			</script>
		</div>
		<div id="example5-tab7">
			<div class="mdui-list" id="user_ban_list">
				<label class="mdui-list-item mdui-ripple">
					<div class="mdui-list-item-content"><small>用户名</small></div>
					<label class="mdui-list-item">
						<div class="mdui-list-item-content" mdui-tooltip="{content: '禁止用户发表文章和评论'}"><small>ban</small></div>
					</label>
				</label>
			</div>
			<script>
				function admin_read_user(){
					var xmlhttp = new XMLHttpRequest;
					$$.ajax({
						method: 'GET',
						url: './ajax/admin_read_user.php',
						data: {
						},
						success: function (data) {
							var rst = JSON.parse(data);
							for(i = 0; i<rst.length; i++){
								str = '<label class="mdui-list-item mdui-ripple"><div class="mdui-list-item-content">'+rst[i]["nickname"]+'</div><label class="mdui-switch" onclick="admin_ban(this)"><input type="checkbox"'+rst[i]["state"]+'/><i class="mdui-switch-icon"></i></label></label>';
								$$("#user_ban_list").append(str);
							}
						}
					});
				}
				window.onload = admin_read_user();

				function admin_ban(obj)
				{
					var admin_name = document.getElementById("nickname").innerHTML;
					var nickname = $$(obj).prev().text();
					var sel = $$(obj).children('input').prop('checked');
					if(sel == true){
						var t = 1;
					}
					else{
						var t = 0;
					}
					$$.ajax({
						method: 'GET',
						url: './ajax/admin_ban.php',
						data: {
							admin_name: admin_name,
							nickname: nickname,
							sel: t
						},
						success: function (data) {
							var rst = JSON.parse(data);
							alert(rst);
						}
					});
				}
			</script>
		</div>
	</div>
	<script>
	// 更新图片缓存
	/*
	if(window.applicationCache.status == window.applicationCache.UPDATEREADY){
		window.applicationCache.update();
	}
	*/

	// 判断是否是管理员
	function admin_judge(){
		var xmlhttp = new XMLHttpRequest;
		var nickname = document.getElementById("nickname").innerHTML;
		$$.ajax({
			method: 'GET',
			url: './ajax/admin_judge.php',
			data: {
				nickname: nickname
			},
			success: function (data) {
				var rst = JSON.parse(data);
				if(rst == 1){
					$$('.admin_hidden').prop('hidden', true);
					$$('.admin_show').prop('hidden', false);
				}
			}
		});
	}
	window.onload = admin_judge();
	</script>
</div>
</body>
</html>