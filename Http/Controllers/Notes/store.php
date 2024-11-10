<?php 
use core\App;
use core\Database;
use core\Validator;

$db = App::resolve(Database::class);

$errors=[];

//   var_dump($_SERVER);
// die();
// if(strlen($_POST['body'])==0){
//     $errors['body']= 'A body is Required!';
// }


// if(strlen($_POST['body'])>1000){
//     $errors['body']= 'The  body can not be more than 1,000 characters.';
// }

// $validator =new Validator(); once we add static to the class we don't need these we just have to the call the class directly in the if statement

if(! Validator::string($_POST['body'], 1, 1000)){
    $errors['body']= 'A body of no more than 1,000 characters is required.';
}

if(!empty($errors)){
   return veiws('Notes/Create.veiw.php',[
        'heading' => 'Create a note',
        'errors'=>  $errors
    ]); 

}

//empty- if we have no errors we should proceed to insert in the database
//empty-!isset($var) || $var == false,Returns true if var does not exist or has a value that is empty or equal to zero, aka falsey, see conversion to boolean . Otherwise returns false

$db->query('INSERT INTO `notes`(`body`, `user_id`) VALUES (:body,:user_id)',[
    'body'=> $_POST['body'],
    'user_id'=> 2,
]);

header('location:/index.php/Notes.php');
exit();

