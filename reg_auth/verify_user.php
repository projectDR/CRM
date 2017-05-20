<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.05.17
 * Time: 20:27
 */
require_once ("../reg_auth/Authentication_class.php");

$au = new Authentication_class();
$result = $au->verify($_POST["login"], $_POST["password"]);
echo "из пхп ".$result;
?>