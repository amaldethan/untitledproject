<?php 

session_start();
$idArr = array();
include("../dbconfig.php");
if(isset($_POST['delete'])){
        $idArr = $_POST['checked_id'];
        foreach($idArr as $id){

                mysqli_query($conn, 'DELETE FROM tests WHERE pack_id = "'.$id.'"');
                mysqli_query($conn, 'DELETE FROM tpack WHERE id="'.$id.'"');
                            
                
            }
                
                //mysqli_query($conn, 'ALTER TABLE questions drop `id`');
                //mysqli_query($conn, 'ALTER TABLE questions ADD `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;');

        header('Location: testpack.php');
    }


?>