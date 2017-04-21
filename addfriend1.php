<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-04-21
 * Time: 11:16
 */
header("Content-type:text/html;charset=utf-8");
require_once "include/dbconn.php";
require_once "include/common.inc.php";
session_start();
if (empty($_SESSION['password'])){
    echo "<a href='login.html'>登录</a> <a href='regist.php' target='_blank'>注册</a> ";
    exit();
}
$nickname = $_SESSION['nickname'];
$f_nickname = $_GET['f_nickname'];
 //判断id是否存在
$sql = "select id from user WHERE nickname='$f_nickname';";
$res = mysql_query($sql,$link);
if (mysql_num_rows($res)<1){
    echo "<script type='text/javascript'>alert('不存在该用户');location.href='addfriend.php';</script>";exit();
}

//判断是否加过该好友

$sql = "select nickname from friend WHERE f_nickname='{$f_nickname}' and nickname='{$nickname}';";

$res = mysql_query($sql,$link);

if (mysql_num_rows($res)>0){
    echo "<script>alert('已经添加');location.href='addfriend.php';</script>";exit();
}


$sql = "insert into friend (nickname, f_nickname) VALUES ('{$nickname}','{$f_nickname}');";
$res = mysql_query($sql,$link);
if($res){
    echo "<script>alert('success,waiting for confirm');location.href='addfriend.php';</script>";
}




