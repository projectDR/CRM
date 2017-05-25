<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.04.17
 * Time: 17:50
 */
class Application_class
{
    public  $username, $department, $position, $brtype, $urgency, $description;

    function __construct($data)
    {
        $this->username = isset($data[0]) ? $data[0] : "guest";
        $this->brtype = isset($data[1]) ? $data[1] : null;
        $this->position = isset($data[2]) ? $data[2] : null;
        $this->urgency = isset($data[3]) ? $data[3] : null;
        $this->description = isset($data[4]) ? $data[4] : "";
    }

    function validate()
    {
        $rus_pattern = "^[А-я\s]{3,}$";

        return (!empty($this->username) && !empty($this->department) && !empty($this->position) && !empty($this->brtype) &&
        !empty($this->urgency) && mb_ereg_match($rus_pattern, $this->username));
    }
}