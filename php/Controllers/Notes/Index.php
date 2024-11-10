<?php 
$config = require ('config.php');
$db = new Database($config['database']);

$heading = 'My Notes';
$Notes = $db->query("SELECT * FROM `notes` WHERE user_id =1")->get();

require './veiws/Notes/Index.veiw.php'; 

?>