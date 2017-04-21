<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
    <title>好友请求</title>
</head>

<body>
<?php

include "include/dbconn.php";

if(empty($_SESSION['password'])){
    header("Location:login.php");
    exit();
}else{
    $nickname = $_SESSION['nickname'];
    echo "<a href='index.php'>".$nickname." 的主页</a>";
    $sql = "select id from friend where f_nickname='{$nickname}' and fzt='0';";
    $res = mysql_query($sql,$link);
    $fnum = mysql_num_rows($res);
    if(mysql_num_rows($res)>0){
        echo "<span ><a href='qingqiu.php' style='color:#c00'>&nbsp;您有(".$fnum.")条好友请求</span></a> 在线 <a href='exit.php'>退出登陆</a>";
    }else{
        echo " 在线 <a href='exit.php'>退出登陆</a>";
    }
    mysql_free_result($res);

}
?>
<div id="message">
    <hr/>
    <p><span style="font-weight: bold">请求</span></p>
    <?php
    $sql = "select id,nickname,f_nickname from friend WHERE f_nickname='{$nickname}' AND fzt='0';";
    $res = mysql_query($sql,$link);
    if (mysql_num_rows($res)<1){
        echo "none request";
        exit();
    }
    while ($row = mysql_fetch_array($res)){
        echo "<p style='float:left;margin-left:30px;'><span style='color:#00a;font-weight:bold;'>";
        echo $row['nickname']."</span> 请求加为好友&nbsp;<a href='agreeqingqiu.php?f_nickname=";
        echo $row['nickname']."&id=".$row['id']."'>同意并添加</a>&nbsp;<a href='refuseqingqiu.php?id=".$row['id']."'>拒绝</a></p>";
    }
    mysql_free_result($res);

    ?>
</div>
</body>
</html>
