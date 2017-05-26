<!DOCTYPE html>
<html lang="ru">


<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/copyright.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/other_scripts.js"></script>
</head>

<body>
<?php include('header.php')?>
<form class = "form-horizontal">
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Логин</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "username" required>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Пароль</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "password" required>
        </div>
    </div>
</form>
</body>

<?php

/*$dbconnection = pg_connect("host=localhost port=5432 dbname=project_bd user=postgres password=Root123")
or die('Error: '.pg_last_error());

$query = 'SELECT department_name FROM department';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

/*echo "connect to db ";
$db = new DBWorking_class("host=localhost port=5432 dbname=project_bd user=postgres password=AgnusDei333");
echo "111";
$my_query = "select department_name from department";
$db_data = $db->query($my_query);
echo $my_query." ";
echo $db_data;
$i = 0;
foreach ($db_data as $value)
{
    echo "value # ".$i.": ".$value;
    $i++;
}*/

/*class MyClass
{
    var $dbconnection, $query, $result;


    function __construct($connectionString)
    {
        //$this->dbconnection = pg_connect("host=localhost port=5432 dbname=project_bd user=postgres password=Root123");
        $this->dbconnection = pg_connect($connectionString);
    }

    public function get_data($query)
    {
        /*$arr = array();
        $this->query = $query;
        $this->result = pg_query($this->dbconnection, $this->query);

        while ($line = pg_fetch_array($this->result,null, PGSQL_NUM))
        {
            array_push($arr,$line[0]);
        }
        return $arr;
        $arr = array();
        $this->query = $query;
        $this->result = pg_query($this->dbconnection, $this->query);

        while ($line = pg_fetch_array($this->result,null, PGSQL_NUM))
        {
            array_push($arr,$line[0]);
        }
        return $arr;;
    }
}*/

/*include "classes/DBWorking_class.php";
echo "before creation ";
$temp = new DBWorking_class("project_bd", "Root123");
echo " created ";
$myarr = $temp->query('SELECT department_name FROM department');
echo " array: ".$myarr[0].$myarr[1].$myarr[2]." query: ".$temp->query;*/

//include "applications_list.php";
/*$pass = "111";
$hash = password_hash($pass,PASSWORD_DEFAULT);
$ver = password_verify($pass, $hash);
echo "pass: ".$pass." hash: ".$hash." ver: ".$ver;*/

require_once ("../reg_auth/Authentication_class.php");

$au = new Authentication_class();
$result = $au->verify("name", "1111");
echo " ver: ".$result;

?>
</html>
