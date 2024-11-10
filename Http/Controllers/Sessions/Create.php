<?php 
use core\Session;
veiws('Sessions/Create.veiw.php',[
    'errors'=> Session::get('errors'),
]);