<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-04-19
 * Time: 11:23
 */
include "config/dbconfig.php";
$link = @mysql_connect($dbhost,$dbuser,$dbpassword);
mysql_select_db($dbname);
mysql_query("set names utf8");
