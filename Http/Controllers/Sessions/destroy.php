<?php 
use core\Authenticator;
$auths = new Authenticator();
$auths->logout();
header("location:/");
exit();