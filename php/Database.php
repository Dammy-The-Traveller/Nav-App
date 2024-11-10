<?php 
// connect to our mySql database

// class Person {
//     public $name;
//     public $age;



//     public function breathe(){
//         echo $this->name . ' is breathing';

//     }
// }

// $person = new Person();

// $person->name = 'John Doe';
// $person->age = 25;

// $person->breathe();

// $dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";
// $pdo = new PDO($dsn);
// $statement = $pdo->prepare("SELECT * FROM `post`");
// $statement->execute();

// $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

// foreach($posts as $post){
//     echo "<li>". $post['title']. "</li>";
// }


class Database{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password=""){

        
        
        $dsn = 'mysql:'.http_build_query($config, '', ';');
        // $dsn = "mysql:host={$config['host']}; port={$config['port']}; dbname={$config['dbname']}; charset={$config['charset']}";

        $this->connection = new PDO($dsn, $username, $password,[
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params=[]){
        $this->statement =  $this->connection->prepare($query);

      $this->statement->execute($params);
        return $this;
    }

    public function get(){
        return $this->statement->fetchAll();
    }


    public function find(){
  return $this->statement->fetch();
    }


    public function findOrfail(){
        $result = $this->find();
        if(!$result){
            abort(404);
        }
        return $result;
    }


}
?>