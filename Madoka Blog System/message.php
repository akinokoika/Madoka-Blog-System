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
<body id="theme_body" class="">
<div class="mdui-container">
	<div class="mdui-row mdui-p-a-2" id="tab3-content">
		<div class="mdui-col-xs-12">

        <div class="mdui-appbar">
        <div class="mdui-toolbar mdui-color-theme">
            <a class="mdui-typo-title">消息</a>
            <div class="mdui-toolbar-spacer"></div>
        </div>
        <div class="mdui-tab mdui-color-theme-300" mdui-tab>
				<a id="info_tab1" href="#example5-tab1" class="mdui-ripple mdui-ripple-white">公告</a>
				<a id="info_tab2" href="#example5-tab2" class="mdui-ripple mdui-ripple-white">私信</a>
				<a href="index.php" class="mdui-ripple mdui-ripple-white">返回首页</a>
			</div>
        </div>
        
			<div id="example5-tab1" class="mdui-color-theme-50">
                <div class="mdui-row mdui-typo">
                    <div class="mdui-col-xs-12">
                        <ul class="mdui-list">
                            <?php
                            include "./config.php";
	 
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("连接失败: " . $conn->connect_error);
                            } 
                            mysqli_set_charset($conn,"utf8");
                            
                            $sql = "select title from message";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<li class='mdui-list-item mdui-ripple' onclick='announcement(this)'>".$row["title"]."</li>";
                                    echo "<hr />";
                                }
                            } else {
                                echo "<li class='mdui-list-item mdui-ripple'>没有公告</li>";
                            }
                            ?>
                        </ul>
                        <div class="mdui-dialog" id="dialog">
                            <div class="mdui-dialog-title" id="dialog_title"></div>
                            <div class="mdui-dialog-content" id="dialog_content"></div>
                            <div class="mdui-dialog-actions mdui-dialog-actions-stacked">
                            <button class="mdui-btn mdui-ripple mdui-text-center" mdui-dialog-confirm>确定</button>
                            </div>
                        </div>
                    </div> 	
                </div>
			</div>
			<div id="example5-tab2" class="mdui-color-theme-50">
				<div class="mdui-row mdui-typo">
                    <div class="mdui-col-xs-11" style="margin: 20px;">
                        <div class="mdui-row">
                            <div class="mdui-col-xs-12">
                                关注用户：<select id="focus_user" class="mdui-select" mdui-select>
                                <?php		
                                    include "./config.php";
                                    
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                        die("连接失败: " . $conn->connect_error);
                                    }
                                    mysqli_set_charset($conn,"utf8");

                                    $nickname=$_REQUEST["nickname"];
                                    
                                    $sql = "select * from follow where nickname = '$nickname'";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
                                        }
                                    } else {
                                        echo "<option value='-1'>没有关注任何用户</option>";
                                    }
                                    
                                    $conn->close();
                                ?>
                                </select>
                                <button onclick="put_letter()" style="margin-left: 5px;" class="mdui-btn mdui-ripple mdui-color-theme-accent">发送私信</button>
                            
                                <div class="mdui-dialog" id="dialog_letter">
                                    <div class="mdui-dialog-title">私信</div>
                                    <div class="mdui-dialog-content">
                                        <div class="mdui-textfield mdui-textfield-floating-label">
                                        <label class="mdui-textfield-label" id="dialog_letter_user"></label>
                                        <textarea id="letter_content" class="mdui-textfield-input" maxlength="300"></textarea>
                                        </div>
                                    </div>
                                    <div class="mdui-dialog-actions mdui-dialog-actions-stacked">
                                        <button class="mdui-btn mdui-ripple mdui-text-center" mdui-dialog-cancel>取消</button>
                                        <button onclick="put()" class="mdui-btn mdui-ripple mdui-text-center" mdui-dialog-confirm>发送</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="mdui-list" style="margin-top: 10px;">
                            <?php
                            include "./config.php";
	 
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("连接失败: " . $conn->connect_error);
                            } 
                            mysqli_set_charset($conn,"utf8");

                            $nickname = $_REQUEST["nickname"];
                            
                            $sql = "select * from letter where name = '$nickname'";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<li class='mdui-list-item mdui-ripple' onclick='show_letter(this)'><span class='name'>".$row["nickname"]."</span><small style='margin-left: 10px;''>".$row["time"]."</small></li>";
                                    echo "<hr />";
                                }
                            } else {
                                echo "<li class='mdui-list-item mdui-ripple'>没有私信</li>";
                            }
                            ?>
                        </ul>
                        <div class="mdui-dialog" id="dialog_show_letter">
                            <div class="mdui-dialog-title" id="dialog_show_letter_title"></div>
                            <div class="mdui-dialog-content" >
                                <div class="mdui-textfield">
                                <label class="mdui-textfield-label" id="dialog_show_letter_user"></label>
                                <textarea id="dialog_show_letter_content" class="mdui-textfield-input" readonly></textarea>
                                </div>
                            </div>
                            <div class="mdui-dialog-actions mdui-dialog-actions-stacked">
                                <button class="mdui-btn mdui-ripple mdui-text-center" mdui-dialog-confirm>确定</button>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<script>
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

        if(getUrlParam("info") == "true"){
            $$('#info_tab2').addClass('mdui-tab-active');
            $$('#focus_user').val(getUrlParam("name"));
        }

        // 设置主题
        function set_theme(){
            var theme = getUrlParam("theme");
            document.getElementsByTagName("body")[0].classList.add("mdui-theme-primary-"+theme);
            document.getElementsByTagName("body")[0].classList.add("mdui-theme-accent-"+theme);
        }
        window.onload = set_theme();

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

        function announcement(obj){
            var title =  $$(obj).text();
            $$.ajax({
                method: 'GET',
                url: './ajax/message_sel.php',
                data: {
                    title: title
                },
                success: function (data) {
                    var rst = JSON.parse(data);
                    var dialog = new mdui.Dialog('#dialog');
                    $$('#dialog_title').text(title);
                    $$('#dialog_content').text(rst);
                    dialog.open();
                }
            });
        }

        function put_letter(){
            var user = $$('#focus_user').val();
            if(user != "-1"){
                var dialog2 = new mdui.Dialog('#dialog_letter');
                dialog2.open();
                $$('#dialog_letter_user').text(user+"：");
            }
        }

        function put(){
            var content = $$('#letter_content').val();
            if(content == ""){
                mdui.alert("没有输入任何内容");
            }else{
                $$('#letter_content').val("");
                var name = $$('#focus_user').val();
                var nickname = getUrlParam("nickname");
                $$.ajax({
                    method: 'GET',
                    url: './ajax/letter_up.php',
                    data: {
                        content: content,
                        name: name,
                        nickname: nickname
                    },
                    success: function (data) {
                        var rst = JSON.parse(data);
                        mdui.alert(rst);
                    }
                });
            }
        }

        function show_letter(obj){
            var name =  getUrlParam("nickname");
            $$.ajax({
                method: 'GET',
                url: './ajax/letter_sel.php',
                data: {
                    name: name
                },
                success: function (data) {
                    var rst = JSON.parse(data);
                    var dialog_show_letter = new mdui.Dialog('#dialog_show_letter');
                    $$('#dialog_show_letter_user').text(name+"：");
                    $$('#dialog_show_letter_content').val(rst);
                    dialog_show_letter.open();
                }
            });
        }
	</script>
</div>
</body>
</html>