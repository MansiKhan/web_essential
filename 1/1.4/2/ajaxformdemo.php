<?php 

    error_reporting(0);
    
    if (isset($_POST['cvForm'])) {

        $randomNumber = rand(1,2);

        if ($randomNumber == 1) {
            echo "OK";
        }

        else {
            echo "SOMETHING WENT WRONG";
        }

    }

?>