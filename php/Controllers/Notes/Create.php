<?php 
require 'Validator.php';
$config = require ('config.php');
$db = new Database($config['database']);
$heading = 'Create a note';

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $errors=[];

// if(strlen($_POST['body'])==0){
//     $errors['body']= 'A body is Required!';
// }


// if(strlen($_POST['body'])>1000){
//     $errors['body']= 'The  body can not be more than 1,000 characters.';
// }

// $validator =new Validator(); once we add static to the class we don't need these we just have to the call the class directly in the if statement

if(! validator::string($_POST['body'], 1, 1000)){
    $errors['body']= 'A body of no more than 1,000 characters is required.';
}

if(empty($errors)){
    $db->query('INSERT INTO `notes`(body, user_id) VALUES (:body,:user_id)',[
        'body'=> $_POST['body'],
        'user_id'=>1

]);
}



  
}
require './veiws/Notes/Create.veiw.php';
 ?>