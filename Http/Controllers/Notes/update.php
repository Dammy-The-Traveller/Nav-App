<?php 
use core\App;
use core\Database;
use core\Validator;
$db = App::resolve(Database::class);



$currentUserid =2;

// find the corresponding note
    $note = $db->query("SELECT * FROM `notes` WHERE id =:id", ['id'=> $_POST['id']])->findOrfail();

// authorize that the current user can edit the note
    authorize($note['user_id'] == $currentUserid);
// validate the form
    $errors=[];
    
    
    if(! Validator::string($_POST['body'], 1, 1000)){
        $errors['body']= 'A body of no more than 1,000 characters is required.';
    }

    // if no validation errors, update the record in the notes database table

    if(count($errors)){
        return veiws('Notes/edit.veiw.php',[
            'heading' => 'Edit your note',
            'errors'=>  [],
            'note'=> $note
        
        ]); 
    }
 
    $db->query('UPDATE `notes` SET body =:body WHERE id=:id', [
        'id'=> $_POST['id'],
        'body'=> $_POST['body'],
    ]);

   

    // REDIRECT THE USER
    
    header('location:/index.php/Notes.php');
    exit();