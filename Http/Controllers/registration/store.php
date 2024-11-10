<?php 
use core\App;
use core\Database;
use core\Validator;
use core\Authenticator;

$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

//validate the form inputs.
$errors=[];
if(!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

if(!Validator::string($password,7,255)) {
    $errors["password"] = "Please provide a valid password of atleast 7 characters";
}

if(!empty($errors)) {
    return veiws('registration/Create.veiw.php', [
        'errors'=>$errors
    ]);
}


$db = App::resolve(Database::class);
//check if the account already exists
$user = $db->query("SELECT * FROM `users` WHERE email =:email", ['email'=> $email])->find();
// if yes, redirect to a login page.
// if not, save one to the database, and log the user in and redirect
if($user){
    //then someone with that email already exists and has an account
    // if yes, redirect to a login page
    header('location:/index.php/login.php');
    exit();
}else{
    // if not, save one to the database, and then log the user in, and redirect.
    $db->query('INSERT INTO `users`(email, password) VALUES (:email,:password)',[
        'email'=> $email,
        'password'=> password_hash ($password, PASSWORD_DEFAULT)
]);
}
// mark that the user has logged in,
//$_SESSION['loggedin'] = true;
// $_SESSION['user']=[
//     'email'=>$email,
// ];
$auths = new Authenticator();
$auths->login($user);
header('location:/index.php/login.php');
exit();
