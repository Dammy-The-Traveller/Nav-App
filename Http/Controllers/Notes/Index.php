<?php 
use core\App;
use core\Database;

$db = App::resolve(Database::class);


$Notes = $db->query("SELECT * FROM `notes` WHERE user_id =2")->get();

 

veiws('Notes/index.veiw.php',[
    'heading' => 'My Notes',
    'Notes'=>$Notes
]); 
