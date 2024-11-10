<?php 
$config = require ('config.php');
$db = new Database($config['database']);

$heading = ' Note';
$currentUserid =1;

$note = $db->query("SELECT * FROM `notes` WHERE id =:id", ['id'=> $_GET['id']])->findOrfail();



authorize($note['user_id'] == $currentUserid);


// dd($Notes);
require './veiws/Notes/Show.veiw.php'; 

?>