<?php 
    include_once("main.class.php");
    
    class set_data extends main_class {

        function set_data($db) {
            parent::__construct($db);
        }

        public function register_person($price, $name) {
            $checkName = parent::validate_pName($name);
    
            if (parent::validate_price($price) !== true) {
                echo "Price is Not Valid";
            }

            if ($checkName !== true) {
                echo $checkName;
            }

            else {
                echo "Person is registered.";
            }




        }
    }

    $person = new set_data("db"); // pass => db
    $person->register_person("23.3","Mansoor  Khan"); // pass => price , name
    
?>