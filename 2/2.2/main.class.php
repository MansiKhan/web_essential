<?php 

    class main_class {
        protected $db;

        function __construct() {
            try{

                /*
                    
                    Task No 1

                */

                $this->db = new PDO('mysql:host=localhost;dbname=web_essential_mannual',"root", "", array(PDO::ATTR_PERSISTENT => true));
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);










                /*
                    
                    Task No 2

                */

                echo "<h2>Task No 2</h2>";

                $selectQuery = "SELECT * FROM `testtable`";

                $stmt = $this->db->query($selectQuery);

                while($row = $stmt->fetch(PDO::FETCH_OBJ)) {

                    echo "UserName: " . $row->username . " And Password:" . $row->password." <br />";
                }














                /*
                    
                    Task No 3 Bulk Insertion 

                */

                echo "<h2>Task No 3</h2>";

                // Data to be inserted .... 
                $records = array(
                    array("Username1","Password1"),
                    array("Username2","Password2"),
                    array("Username3","Password3"),
                    array("Username4","Password4"),
                    array("Username5","Password5"),
                    array("Username6","Password6"),
                    array("Username7","Password7"),
                    array("Username8","Password8"),
                    array("Username9","Password9"),
                    array("Username10","Password10"),
                    array("Username11","Password11"),
                    array("Username12","Password12"),
                    array("Username13","Password13"),
                    array("Username14","Password14"),
                    array("Username15","Password15"),
                    array("Username16","Password16"),
                    array("Username17","Password17"),
                    array("Username18","Password18"),
                    array("Username19","Password19"),
                    array("Username20","Password20"),
                    array("Username21","Password21"),
                    array("Username22","Password22"),
                    array("Username23","Password23"),
                    array("Username24","Password24"),
                    array("Username25","Password25"),
                    array("Username26","Password26"),
                    array("Username27","Password27"),
                    array("Username28","Password28"),
                    array("Username29","Password29"),
                    array("Username30","Password30"),
                    array("Username31","Password31"),
                    array("Username32","Password32"),
                    array("Username33","Password33"),
                    array("Username34","Password34"),
                    array("Username35","Password35"),
                    array("Username36","Password36"),
                    array("Username37","Password37"),
                    array("Username38","Password38"),
                    array("Username39","Password39"),
                    array("Username40","Password40"),
                    array("Username41","Password41"),
                    array("Username42","Password42"),
                    array("Username43","Password43"),
                    array("Username44","Password44"),
                    array("Username45","Password45"),
                    array("Username46","Password46"),
                    array("Username47","Password47"),
                    array("Username48","Password48"),
                    array("Username49","Password49"),
                    array("Username50","Password50"),
                    array("Username51","Password51"),
                    array("Username52","Password52"),
                    array("Username53","Password53"),
                    array("Username54","Password54"),
                    array("Username55","Password55"),
                    array("Username56","Password56"),
                    array("Username57","Password57"),
                    array("Username58","Password58"),
                    array("Username59","Password59"),
                    array("Username60","Password60"),
                    array("Username61","Password61"),
                    array("Username62","Password62"),
                    array("Username63","Password63"),
                    array("Username64","Password64"),
                    array("Username65","Password65"),
                    array("Username66","Password66"),
                    array("Username67","Password67"),
                    array("Username68","Password68"),
                    array("Username69","Password69"),
                    array("Username70","Password70"),
                    array("Username71","Password71"),
                    array("Username72","Password72"),
                    array("Username73","Password73"),
                    array("Username74","Password74"),
                    array("Username75","Password75"),
                    array("Username76","Password76"),
                    array("Username77","Password77"),
                    array("Username78","Password78"),
                    array("Username79","Password79"),
                    array("Username80","Password80"),
                    array("Username81","Password81"),
                    array("Username82","Password82"),
                    array("Username83","Password83"),
                    array("Username84","Password84"),
                    array("Username85","Password85"),
                    array("Username86","Password86"),
                    array("Username87","Password87"),
                    array("Username88","Password88"),
                    array("Username89","Password89"),
                    array("Username91","Password91"),
                    array("Username92","Password92"),
                    array("Username93","Password93"),
                    array("Username94","Password94"),
                    array("Username95","Password95"),
                    array("Username96","Password96"),
                    array("Username97","Password97"),
                    array("Username98","Password98"),
                    array("Username99","Password99"),
                    array("Username99","Password99"),
                    array("Username100","Password100"),
                );

                //PlaceHolder ... 
                for($i = 0; $i < count($records); $i++) {
                    $placeholder[] = ('(?,?)');
                }

                // making one dimensional array for execute function and also be converted to [] form 
                $recordsArray = array();
                foreach($records as $data) {
                    $recordsArray = array_merge($recordsArray,array_values($data));
                }

                $insertQuery = "INSERT INTO `testtable`(`username`,`password`) VALUES ".implode(',',$placeholder);                
                $stmt = $this->db->prepare($insertQuery);
                $stmt->execute($recordsArray);

                $lastIdQuery  = "SELECT `id` FROM `testtable` ORDER BY `id` DESC limit 1";
                $stmt = $this->db->query($lastIdQuery);
                $row = $stmt->fetch(PDO::FETCH_OBJ);

                echo "<h4>The Last Record Inserted Id is:".$row->id." </h4>";







                /*
                
                    Task no 3 Part 2

                */

                $updatelastInsertQuery = "UPDATE `testtable` SET `username`=? ,  `password`=? Where `id`=?";
                $stmt2 = $this->db->prepare($updatelastInsertQuery);
                $stmt2->execute(["Updated Username","Updated Password",$row->id]);
            }
            
            catch(PDOException $e) {
                print "Error!:" . $e->getMessage(). "<br />";
                die();
            }
        }
    }

    $obj1 = new main_class();

?>