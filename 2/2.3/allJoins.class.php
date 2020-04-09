<?php 

    class allJoins {

        protected $db;

        public function __construct() {

            try {
                $this->db  =  new PDO('mysql:host=localhost;dbname=web_essential_mannual','root','', array(PDO::ATTR_PERSISTENT => true));
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            catch(PDOException $e) {
                print "Error!:" .$e->getMessage(). "<br />";
                die();
            }
        }

        public function selectData($table) {
            $table = strtoupper($table);

            if ($table != "AUTHOR" && $table != "BOOK" ) {
                echo "<b>Error!:</b>  INCORRECT SELECT DATA PARAMETER!";
                die();
            }

            else {
                $table = strtolower($table);
                $query = "SELECT * FROM `$table`";
                try {
                    $stmt = $this->db->query($query);
                    return $stmt->fetchAll(PDO::FETCH_OBJ);
                }
                catch(PDOException $e) {
                    print "<b>Error!:</b>  " . $e->getMessage() . "<br />";
                    die();
                }
            }

        }

        public function innerJoin() {
            $query = "SELECT a.`aut_id` , b.`aut_id` , `b_id` , `price` , `category` , a.`name` AS `aName` , b.`name` AS `bName`, `cnic`, `gender`, `country`, `contact` FROM `author` AS `a` INNER JOIN `book` AS `b` ON a.aut_id=b.aut_id";
            try {
                $stmt = $this->db->query($query);
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $e) {
                print "<b>Error!:</b>  " . $e->getMessage() . "<br />";
                die();
            }
        }

        public function fullJoin() {
            $query = "SELECT a.`aut_id` , b.`aut_id` , `b_id` , `price` , `category` , a.`name` AS `aName` , b.`name` AS `bName`, `cnic`, `gender`, `country`, `contact` FROM `author` AS `a` LEFT JOIN `book` AS `b` ON a.aut_id=b.aut_id
                UNION
                SELECT a.`aut_id` , b.`aut_id` , `b_id` , `price` , `category` , a.`name` AS `aName` , b.`name` AS `bName`, `cnic`, `gender`, `country`, `contact` FROM `book` AS `b` LEFT JOIN  `author` AS `a` ON b.aut_id=a.aut_id
            ";
            try {
                $stmt = $this->db->query($query);
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $e) {
                print "<b>Error!:</b>  " . $e->getMessage() . "<br />";
                die();
            }
        }

        public function leftJoin() {
            $query = "SELECT a.`aut_id` , b.`aut_id` , `b_id` , `price` , `category` , a.`name` AS `aName` , b.`name` AS `bName`, `cnic`, `gender`, `country`, `contact` FROM `author` AS `a` LEFT JOIN `book` AS `b` ON a.aut_id=b.aut_id";
            try {
                $stmt = $this->db->query($query);
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $e) {
                print "<b>Error!:</b>  " . $e->getMessage() . "<br />";
                die();
            }
        }

        public function rightJoin() {
            $query = "SELECT a.`aut_id` , b.`aut_id` , `b_id` , `price` , `category` , a.`name` AS `aName` , b.`name` AS `bName`, `cnic`, `gender`, `country`, `contact` FROM `author` AS `a` RIGHT JOIN `book` AS `b` ON a.aut_id=b.aut_id";
            try {
                $stmt = $this->db->query($query);
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $e) {
                print "<b>Error!:</b>  " . $e->getMessage() . "<br />";
                die();
            }
        }

        public function __destruct() {
            $this->db = null;
        }
    }


    $obj = new allJoins();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOINS EXAMPLES</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <STYle>
    * {
        margin: 0;
        padding: 0;
    }
    body {
        background: #DDBDD8 ;
    }
    .header_row {
        background: #EEE8AA;
    }
    #header_txt {
        color: #556B2F;
        word-spacing: 10px;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    .table-overflow-div {
        width: 100%;
        overflow: auto;
    }
    </STYle>
</head>
<body>
    <div class="container-fluid">
        <div class="row py-3 header_row"> <!--- // Header ---->
            <h2 class="mx-auto" id="header_txt">Joins Examples</h2>
        </div> <!--- // Header End---->

        <div class="row mt-1"> <!---- // Tables ---->
            <div class="col-12 p-2 bg-dark">
                <h4 class="text-white" id="header_txt">left table</h4>
            </div>
        </div>
        <div class="row">
            <div class="table-overflow-div">
                <table class="table border-right">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Cnic</th>
                            <th>Gender</th>
                            <th>Country</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody class="table-active">
                        
                    <?php 
                        $rows = $obj->selectData("author");
                        $rowCount = 1;
                        foreach($rows as $row) {
                    ?>
                        <tr>
                            <td><?php echo $rowCount;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->cnic;?></td>
                            <td><?php echo $row->gender;?></td>
                            <td><?php echo $row->country;?></td>
                            <td><?php echo $row->contact;?></td>
                        </tr>
                    <?php
                        $rowCount++;
                            }
                    ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12 p-2 bg-dark">
                <h4 class="text-white" id="header_txt">Right table</h4>
            </div>
        </div>
        <div class="row">
            <div class="table-overflow-div">
                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Author name</th>
                        </tr>
                    </thead>
                    <tbody class="table-active">
                    <?php 
                        $rows = $obj->selectData("book");
                        $rowCount = 1;
                        foreach($rows as $row) {
                    ?>
                        <tr>
                            <td><?php echo $rowCount;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->category;?></td>
                            <td><?php echo $row->price;?></td>
                            <td><?php echo $row->aut_id;?></td>
                        </tr>
                    <?php
                        $rowCount++;
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div><!--- // Tables End-->
    </div>

    <div class="container-fluid mt-4"> <!---- Inner Join Section ---->
        <div class="row">
            <div class="col-8">
                <dl>  
                    <dt><h3>Inner Join</h3></dt>  
                    <dd>The INNER JOIN command returns rows that have matching values in both tables. The INNER JOIN result of the above table is following: </dd>    
                </dl>  
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8 offset-2">
                <div class="row bg-dark py-2">
                    <h4 class="mx-auto text-white" id="header_txt">Inner Join table</h4>
                </div>
                <div class="row">
                    <div class="table-overflow-div">
                        <table class="table">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Author Name</th>
                                    <th>Cnic</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>Author Contact</th>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="table-active">                               
                            <?php 
                                $rows = $obj->innerJoin();
                                $rowCount = 1;
                                foreach($rows as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $rowCount;?></td>
                                    <td><?php echo $row->aName;?></td>
                                    <td><?php echo $row->cnic;?></td>
                                    <td><?php echo $row->gender;?></td>
                                    <td><?php echo $row->country;?></td>
                                    <td><?php echo $row->contact;?></td>
                                    <td><?php echo $row->bName;?></td>
                                    <td><?php echo $row->category;?></td>
                                    <td><?php echo $row->price;?></td>
                                </tr>
                            <?php
                                $rowCount++;
                                    }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div> <!---- Inner Join Section End ---->

    <div class="container-fluid mt-4"> <!---- Full Join Section ---->
        <div class="row">
            <div class="col-8">
                <dl>  
                    <dt><h3>Full Join</h3></dt>  
                    <dd>A FULL JOIN returns all the rows from the joined tables, whether they are matched or not i.e. you can say a full join combines the functions of a LEFT JOIN and a RIGHT JOIN.
                     The INNER JOIN result of the above table is following: </dd>    
                </dl>  
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8 offset-2">
                <div class="row bg-dark py-2">
                    <h4 class="mx-auto text-white" id="header_txt">Full Join table</h4>
                </div>
                <div class="row py-2">
                    <div class="table-overflow-div">
                        <table class="table">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Author Name</th>
                                    <th>Cnic</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>Author Contact</th>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="table-active">
                            <?php 
                                $rows = $obj->fullJoin();
                                $rowCount = 1;
                                foreach($rows as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $rowCount;?></td>
                                    <td><?php echo $row->aName;?></td>
                                    <td><?php echo $row->cnic;?></td>
                                    <td><?php echo $row->gender;?></td>
                                    <td><?php echo $row->country;?></td>
                                    <td><?php echo $row->contact;?></td>
                                    <td><?php echo $row->bName;?></td>
                                    <td><?php echo $row->category;?></td>
                                    <td><?php echo $row->price;?></td>
                                </tr>
                            <?php
                                $rowCount++;
                                    }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div> <!---- Full Join Section End ---->

    <div class="container-fluid mt-4"> <!---- Left Join Section ---->
        <div class="row">
            <div class="col-8">
                <dl>  
                    <dt><h3>Left Join</h3></dt>  
                    <dd>The LEFT JOIN returns all records from the left table, and the matched records from the right table.
                     The INNER JOIN result of the above table is following: </dd>    
                </dl>  
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8 offset-2">
                <div class="row bg-dark py-2">
                    <h4 class="mx-auto text-white" id="header_txt">Left Join table</h4>
                </div>
                <div class="row py-2">
                    <div class="table-overflow-div">
                        <table class="table">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Author Name</th>
                                    <th>Cnic</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>Author Contact</th>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="table-active">
                                <tr>
                                <?php 
                                $rows = $obj->leftJoin();
                                $rowCount = 1;
                                foreach($rows as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $rowCount;?></td>
                                    <td><?php echo $row->aName;?></td>
                                    <td><?php echo $row->cnic;?></td>
                                    <td><?php echo $row->gender;?></td>
                                    <td><?php echo $row->country;?></td>
                                    <td><?php echo $row->contact;?></td>
                                    <td><?php echo $row->bName;?></td>
                                    <td><?php echo $row->category;?></td>
                                    <td><?php echo $row->price;?></td>
                                </tr>
                            <?php
                                $rowCount++;
                                    }
                            ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div> <!---- Left Join Section End ---->

    <div class="container-fluid mt-4"> <!---- Right Join Section ---->
        <div class="row">
            <div class="col-8">
                <dl>  
                    <dt><h3>Right Join</h3></dt>  
                    <dd>The RIGHT JOIN returns all records from the right table, and the matched records from the left table.
                     The INNER JOIN result of the above table is following: </dd>    
                </dl>  
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8 offset-2">
                <div class="row bg-dark py-2">
                    <h4 class="mx-auto text-white" id="header_txt">Right Join table</h4>
                </div>
                <div class="row py-2">
                    <div class="table-overflow-div">
                        <table class="table">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Author Name</th>
                                    <th>Cnic</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>Author Contact</th>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="table-active">
                                <tr>
                                <?php 
                                $rows = $obj->rightJoin();
                                $rowCount = 1;
                                foreach($rows as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $rowCount;?></td>
                                    <td><?php echo $row->aName;?></td>
                                    <td><?php echo $row->cnic;?></td>
                                    <td><?php echo $row->gender;?></td>
                                    <td><?php echo $row->country;?></td>
                                    <td><?php echo $row->contact;?></td>
                                    <td><?php echo $row->bName;?></td>
                                    <td><?php echo $row->category;?></td>
                                    <td><?php echo $row->price;?></td>
                                </tr>
                            <?php
                                $rowCount++;
                                    }
                            ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div> <!---- Right Join Section End ---->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>