<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-04-19
 * Time: 11:22
 * desc: 公共函数
 */
//接受表单判断是否为空，为空则返回
/**
 * @param $val
 * @param $str
 */
function getAndJudge($val, $str){
    if (empty($_POST[$val])){
        echo "<script type='text/javascript'>alert('$str');history.back();</script>";
        exit();
    }else{
        return $_POST[$val];
    }
}

//接受表单判断是否为空,
/**
 * @param $val
 * @param $str
 */
function getAndJudge($val, $str){
    if (empty($_POST[$val])){
        echo "<script type='text/javascript'>alert('$str');</script>";
        exit();
    }else{
        return $_POST[$val];
    }
}

/**
 *根据条件查找某个表的结果，唯一
 * @param $getval
 * @param $tiaojian
 * @param $val
 * @param $table
 */
function getResFromTable($getval,$tiaojian,$val,$table){
    include "dbconn.php";
    $sql = "select $getval from $table WHERE $tiaojian=$val;";
    $res = @mysql_query($sql,$link);
    $row = mysql_fetch_array($res);
    $getval = $row[$getval];
    mysql_free_result($res);
    return $getval;
}
