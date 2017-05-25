<!DOCTYPE html>
<html lang="ru">

<head>

</head>

<body>
<form method="post">
    <input type="text" placeholder="text here" name="text">
    <input type="text" placeholder="repeat" name="text1">
    <button type="submit">Button</button>
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
if(isset($_POST["text"]))
{
    $text = $_POST["text"];
    $text1 = $_POST["text1"];
    echo "field1: ".$text." field2: ".$text1." |||| ";
    if($text == $text1)
        echo "match true ";
    else
        echo "match false ";

    //here must be some templates
    //1 - to check is field's text in latin symbols
    //2 - is field filled with cyrillyc symbols
    //3 - is field matches password template: latin sym, numbers, spec sym
    $pas_pattern = "^[A-z0-9.,!&$@\/*|+-]{3,}$"; //for password
    $lat_pattern = "^[A-z0-9]{3,}$"; //for login
    $rus_pattern = "^[А-я\s]{3,}$"; //rus names
    $pattern = $rus_pattern;
    echo " || pattern: ".$pattern;
    if(mb_ereg_match($pattern,$text))
        echo " pattern match: true || ";
    else
        echo " pattern match: false || ";

    echo " after htmlspecialchars: ".htmlspecialchars($text)." || ";
}


?>
</html>
