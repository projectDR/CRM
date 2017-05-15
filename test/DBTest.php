<!DOCTYPE html>
<html lang="ru">
<button class="btn" type="button" onclick="myFunc()">Отправить заявку</button>

<script>
    function myFunc() {
        alert('Nekita pedar');
    }
</script>
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

?>
</html>
