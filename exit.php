<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-04-21
 * Time: 11:48
 */
session_start();
unset($_SESSION['login_id']);
unset($_SESSION['f_login_id']);
unset($_SESSION['password']);
header("Location:index.php");