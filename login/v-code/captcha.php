<?php
session_start();
require './class.php';
$_vc = new ValidateCode();  //实例化一个对象
$_vc->doimg();  
$_SESSION['authnum_session'] = $_vc->getCode();//验证码保存到SESSION中
?>
