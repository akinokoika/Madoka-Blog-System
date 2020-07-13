<?php
$language = $_GET["language"];
$state = file_put_contents("language.ini","language = '$language'");
echo json_encode($state,JSON_UNESCAPED_UNICODE);
?>