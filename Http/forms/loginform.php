<?php 
namespace Http\Forms;
use core\Validator;
use ValidationException;

class loginform{
    protected $errors =[];

    public function __construct(public array $attribute){
        if(!Validator::email($attribute['email'])) {
            $this->errors ['email'] = "Please provide a valid email address.";
         
        }
    
        if(!Validator::string($attribute['email'])) {
            $this->errors["password"] = "Please provide a valid password ";
        }
    }
    public static function validate($attribute){
     
     $instance = new static($attribute);

  return $instance->failed() ? $instance->throw():$instance;
  // it also this:
  //          if($instance->failed()){
   //           $instance->throw();   
    //        } 
    //    return $intance
    }

    public function throw(){
        \core\ValidationException::throw($this->errors, $this->attribute);
    }

    public function failed(){
        return count($this->errors);
    }
    public function errors(){
  return $this->errors;
    }

    public function error($field, $message){
$this->errors [$field] = $message;
return $this;
    }
}