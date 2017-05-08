<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.04.17
 * Time: 17:50
 */
class Application
{
    var $username, $department, $position, $brtype, $urgensy, $description;

    function __construct($data)
    {
        $this->username = isset($data["username"]) ? $data["username"] : "guest";
        $this->department = isset($data["department"]) ? $data["department"] : "guest";
        $this->position = isset($data["position"]) ? $data["position"] : "guest";
        $this->brtype = isset($data["brtype"]) ? $data["brtype"] : null;
        $this->urgensy = isset($data["urgency"]) ? $data["urgency"] : null;
        $this->description = isset($data["description"]) ? $data["description"] : null;
    }

    function validate()
    {
        !empty($this->username) && !empty($this->department) && !empty($this->position) && !empty($this->brtype) &&
        !empty($this->urgensy) && !empty($this->description);
    }
}