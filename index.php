<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>cars</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>


<?php
session_start();
header("Content-Type:text/html;charset=UTF-8");
require_once("config.php");
require_once("classes/ACore.php");
require_once("classes/ACore_Admin.php");

if(isset($_GET['option'])) {                         
    $class = trim(strip_tags($_GET['option'])); 
}
else {
    $class = 'main';   
}

if (file_exists("classes/".$class.".php")) { 
    include("classes/".$class.".php");   
    if(class_exists($class)) { 
       
        $obj = new $class; 
        $obj->get_body();
    }
    else {
        exit("<p>Неправильные  данные для входа</p>"); 
    }
}
else {
    exit("<p>Неправильный адрес</p>"); 
}

?>