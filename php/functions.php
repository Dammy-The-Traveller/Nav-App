<?php 
function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
   
}

function uRLIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status =Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}
?>