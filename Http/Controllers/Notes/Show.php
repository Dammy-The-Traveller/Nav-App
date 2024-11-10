<?php 
use core\App;
use core\Database;

$db = App::resolve(Database::class);
$currentUserid =2;
    $note = $db->query("SELECT * FROM `notes` WHERE id =:id", ['id'=> $_GET['id']])->findOrfail();
    authorize($note['user_id'] == $currentUserid);



    veiws('Notes/Show.veiw.php',[
        'heading' => 'Note',
        'note'=> $note
    ]); 

// dd($Notes);