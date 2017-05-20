<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.04.17
 * Time: 14:10
 */
class DBWorking_class
{
    private $dbconnection, $query, $result;

    function __construct($dbname, $password)
    {
        $this->dbconnection =
            pg_connect("host=localhost port=5432 dbname=".$dbname." user=postgres password=".$password);
        //$this->dbconnection = pg_connect($connectionString);
    }

    /*public function select($query)
    {
        $arr = array();
        $this->query = $query;
        $this->result = pg_query($this->dbconnection, $this->query);

        while ($line = pg_fetch_array($this->result,null, PGSQL_NUM))
        {
            array_push($arr,$line);
        }
        return $arr;
    }*/

    public function select($query, $params)
    {
        $arr = array();
        $this->query = $query;
        $this->result = pg_query_params($this->dbconnection, $query, $params);

        while ($line = pg_fetch_array($this->result,null, PGSQL_NUM))
        {
            array_push($arr,$line);
        }
        return $arr;
    }

    /*public function query($query)
    {
        $this->query = $query;
        pg_query($this->dbconnection, $this->query);
    }*/

    public function query($query, $params)
    {
        $this->query = $query;
        pg_query_params($this->dbconnection, $this->query, $params);
    }

    public static function test_msg()
    {
        return ("Congratulation you've got message from DBWorking_class");
    }
}

?>