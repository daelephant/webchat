<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-04-19
 * Time: 16:50
 */
session_start();
require_once "include/dbconn.php";
require_once "include/common.inc.php";
header("Content-type:text/html; charset=utf-8");
//$nickname = $_POST['loginid'];
@$nickname = getAndJudge(loginid,'nickname is not empty!');
//$password = $_POST['password'];
//$password = md5($_POST['password']);
@$password = getAndJudge(password,'password is not empty!');

$password = md5($password);


$sql = "select * from user WHERE nickname='{$nickname}' and password='{$password}'";
$temp = "[".date('Y-m-d H:i:s')."]".$sql.PHP_EOL;
file_put_contents("log.txt",$temp,FILE_APPEND);
$res = mysql_query($sql,$link);
@$res = mysql_num_rows($res);
//var_dump($res);exit;
if (!$res) {
    echo "<script> alert('user or pass is wrong!');history.back();</script>";
    //echo "success";exit;
    exit();
}else{
    echo "<script> alert('success!go to index1!');</script>";

    $_SESSION['nickname'] = $nickname;
    $_SESSION['password'] = $password;
    echo "<script>location.href='index.php';</script>";
    //header("Location:index.php");
    //!!!用header奇怪的现象：跳过alert直接跳转；所以不推荐header跳转；

}


