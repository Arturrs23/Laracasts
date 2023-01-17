
<?php

class Database
{
    public $connection;
    // making PDO $statement obj public to fetch() it outside scope
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        // assigning PDO statement to database class and then calling retun $this obj
       $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);
        // return object itself - Database class
        return $this;
    }

    public function find()
    {
        // fetching the PDO statement
        return $this->statement->fetch();

    }
  
    public function findOrFail()
    {
       // calling find() method
       $result = $this->find();
       if(! $result){
        abort();
       }
       return $result;

    }
}