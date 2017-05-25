<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.05.17
 * Time: 13:29
 */

require_once ('../classes/DBWorking_class.php');
class Authentication_class
{
    var $username, $login, $type, $password, $pHash,
            $db, $check;

    function __construct()
    {

    }

    public function register()
    {
        $this->db = new DBWorking_class("project_bd", "Root123");
        $this->pHash = password_hash($this->password, PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO employee (employee_name, employee_type, nickname, password)
                          VALUES ($1,$2,$3,$4)", Array($this->username, $this->type, $this->login, $this->pHash));

        ////////////////////////////МОЖНО УБРАТЬ
        $this->check = "INSERT INTO employee (employee_name, employee_type, nickname, password)
                          VALUES ($1,$2,$3,$4)".$this->username.$this->type.$this->login.$this->pHash;
        ////////////////////////////////
    }

    public function verify($username, $password)
    {
        $this->db = new DBWorking_class("project_bd", "Root123");
        $result = $this->db->select("SELECT * FROM employee WHERE nickname=$1", Array($username));
        if(password_verify($password,$result[0][4]))
            return $result;
        else
            return null;
    }

    public function verify_filling($username, $type, $login, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->login = $login;
        $this->type = $type;

        $this->db = new DBWorking_class("project_bd", "Root123");
        $result = $this->db->select("SELECT * FROM employee WHERE nickname=$1", Array($login));
        /*if(!empty($result))
            return false;*/

        $pas_pattern = "^[A-z0-9.,!&$@\/*|+-]{3,}$"; //for password
        $lat_pattern = "^[A-z0-9]{3,}$"; //for login
        $rus_pattern = "^[А-я\s]{3,}$"; //rus names

        return empty($result) && !empty($this->username) && !empty($this->password) && !empty($this->login) &&
            mb_ereg_match($rus_pattern, $this->username) &&
            mb_ereg_match($lat_pattern, $this->login) &&
            mb_ereg_match($pas_pattern, $this->password);
    }
}