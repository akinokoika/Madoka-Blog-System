<?php
$languages = parse_ini_file("language.ini");
$language =  $languages["language"];
echo json_encode($language,JSON_UNESCAPED_UNICODE);
?>