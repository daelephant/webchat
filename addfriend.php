<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>web聊天_添加好友</title>
</head>
<body>
<P><a href="index.php">返回主页</a></P>
<hr />
<p>最新注册：</p>
<?php
    require_once "include/dbconn.php";
    $sql = "select nickname from user order by reg_time DESC limit 0,10;";
    $res = mysql_query($sql,$link);
    while ($row = mysql_fetch_array($res)) {
        echo "<li>".$row['nickname']."&nbsp;|&nbsp;<a href='addfriend1.php?f_nickname=".$row['nickname']."'>添加好友</a></li> ";
    }
    mysql_free_result($res);


?>
</body>
</html>
