<?php 
use core\Authenticator;
use Http\Forms\Loginform;
 
$form = Loginform::validate($attributes =[
    "email"=>  trim($_POST["email"]),
    "password"=> trim($_POST["password"]),
]);


$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);


if (!$signedIn) {
   $form->error(
    'email', 'No matching account found for that email address and password.'
)->throw();
}

redirect('/');




//$email = trim($_POST["email"]);
// $password = trim($_POST["password"]);

//validate the form inputs.
// $form = new Loginform();

// if($form->validate($email, $password)){
    
//     if((new Authenticator)->attempt($email, $password)) {
//    redirect("/");
// }
// $form->error("email", 'No matching account found for that email address and password.');
// }


// Session::flash('errors',$form->errors());

// return redirect('/index.php/login.php');
// return veiws('Sessions/Create.veiw.php', [
//     'errors'=> $form->errors()
// ]);


// $form = new Loginform();
// if(!$form->validate($email, $password)){
//     if(!empty($errors)) {
//     return veiws('Sessions/Create.veiw.php', [
//         'errors'=>$form->errors()
//     ]);
// }
// }


// $db = App::resolve(Database::class);
// $user = $db->query("SELECT * FROM `users` WHERE email =:email", ['email'=> $email])->find();
// if($user) {
//    if(password_verify($password,$user['password'])){
//     login(
//         [
//             'email'=> $email,
//         ]
//         );
//         header('location:/');
//         exit();
//    }
// }

// return veiws('Sessions/Create.veiw.php', [
//     'errors'=>[
//         'email'=> 'No matching account for the email address and password'
//     ]
//]);
