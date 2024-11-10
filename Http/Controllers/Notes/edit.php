<?php 
use core\App;
use core\Database;

$db = App::resolve(Database::class);



$currentUserid =2;

    $note = $db->query("SELECT * FROM `notes` WHERE id =:id", ['id'=> $_GET['id']])->findOrfail();
    authorize($note['user_id'] == $currentUserid);
    
veiws('Notes/edit.veiw.php',[
    'heading' => 'Edit your note',
    'errors'=>  [],
    'note'=> $note

]); 
 