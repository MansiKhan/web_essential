<?php

class main_class {
    protected $db;


    public function __construct($db) {
        $this->db = $db;
    }

    protected function validate_price($price):bool {
        if (is_numeric($price) && $price >= 0) {
            return true;
        }

        else {
            return false;
        }  
    }

    public function validate_pName($pName) {
        if (preg_match("/^[A-Za-z]+([\ A-Za-z]+)$/",$pName) == true) {
            return true;
        }

        else {
            return "Name is not Valid.";
        }
    }
}
?>