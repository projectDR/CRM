<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25.05.17
 * Time: 18:49
 */
session_start();
$_SESSION = Array();
header("Location: /");
exit;
?>