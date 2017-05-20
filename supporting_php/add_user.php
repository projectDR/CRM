<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.05.17
 * Time: 17:14
 */

require_once ("../reg_auth/Authentication_class.php");

$type = $_POST["staff"] == "0" ? "false" : "true";
$au = new Authentication_class();

if ($au->verify_filling($_POST["fio"], $type, $_POST["login"], $_POST["passsword"]))
{
    $au->register();
    echo $_POST["fio"].$type.$_POST["login"].$_POST["passsword"];
    echo $au->check;
}
else
    echo "fail";

?>