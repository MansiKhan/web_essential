<?php 

    if (isset($_POST['name']) && $_POST['name'] == "file2.php") {

    }
    echo "Name is: " . $_POST['name'] . "<br />";
    echo "Size is: ". $_POST['size']." kb <br />";
    echo "Created By: ". $_POST['createdBy'];
?>