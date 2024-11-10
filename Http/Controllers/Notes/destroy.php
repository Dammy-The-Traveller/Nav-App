<?php 
use core\App;
use core\Database;

$db = App::resolve(Database::class);

$currentUserid =2;


    $note = $db->query("SELECT * FROM `notes` WHERE id =:id", ['id'=> $_POST['id']])->findOrfail();
    authorize($note['user_id'] == $currentUserid);

    //IF A FORM WAS SUBMITTED THE DELETE THE CUURRENT NOTE
    $db->query("DELETE FROM `notes` WHERE id =:id", ['id'=> $_POST['id']]);
    header('location:/index.php/Notes.php');
   exit();


