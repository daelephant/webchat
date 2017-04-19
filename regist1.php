<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-04-19
 * Time: 11:20
 * Title:验证注册数据
 */
require_once "include/dbconn.php";
require_once "include/common.inc.php";
header("Content-type:text/html;chartset=utf-8");
//获取数据
$nickname = getAndJudge('nickname','nickname is not empty!');
$password = getAndJudge('password','password is not empty!');
$password2 = getAndJudge('password2','password is not value!');
if ($password==$password2){
    $password = md5($password);
}else{
    echo "<script type='text/javascript'>alert('password is wrong!');</script>";
}
$sex = $_POST['sex'];

$yyyy = $_POST['yyyy'];
$mm = $_POST['mm'];
$dd = $_POST['dd'];
$birthday = $yyyy.'-'.$mm.'-'.$dd;
$address = $_POST['address'];
$question = $_POST['question'];
$answer = $_POST['answer'];
 $age = intval(date("Y"))-intval($yyyy);
 $sql = "select * from user WHERE nickname='".$nickname."';";
 $res = mysql_query($sql,$link);
 $row = mysql_num_rows($res);
if ($row > 0) {
    echo "<script>alert('this username is used!';history.back());</script>";
}

//$sql = "insert into user (nickname,password,address,sex,age,birthday,reg_time,question,answer) values ('{$nickname}','{$password}','{$address}','{$sex}','{$age}','{$birthday}',now(),'{$question}','{$answer}');";
$sql = "insert into user (nickname,password,address,sex,age,birthday,reg_time,question,answer) VALUES
        ('{$nickname}','{$password}','{$address}','{$sex}','{$age}','{$birthday}',now(),'{$question}','{$answer}')";
//file_put_contents("mylog.log",$sql."\r\n"."filetime",FILE_APPEND);
//PHP_EOL是PHP5之后的预定义常量，换行符
$temp = "[" . date('Y-m-d H:i:s') ."] " . $sql . PHP_EOL;
file_put_contents("log.txt", $temp,FILE_APPEND);
$res = mysql_query($sql,$link);

if ($res) {
    echo "<script> alert('success!');</script>";
    echo "successful <p>quickly <a href='login.html' target='_blank'>sign in</a></p>";
} else {
    echo "<script> alert('sorry,fale');history.back();</script>";
}
