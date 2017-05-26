<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.05.17
 * Time: 20:27
 */
session_start();
require_once ("../reg_auth/Authentication_class.php");

$login = $_POST["login"];
$password = $_POST["password"];
$au = new Authentication_class();
$result = $au->verify($login, $password);
if($result !== null)
{
    $_SESSION["fio"] = $result[0][1];
    $_SESSION["login"] = $login;
    $_SESSION["type"] = $result[0][2];
}
else
    echo "Верификация пошла не так";
echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>