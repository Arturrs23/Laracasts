<?php

class Database
{
    // Property to hold the database connection
    public $connection;
    // Property to hold the statement to be executed
    public $statement;

    // Constructor to initialize the database connection with configuration, username and password
    public function __construct($config, $username = 'root', $password = '')
    {
        // Create the DSN string with the configuration parameters
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        // Create a new PDO instance with the DSN, username, password and default fetch mode as associative array
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    // Method to execute a query with optional parameters
    public function query($query, $params = [])
    {
        // Prepare the statement with the given query
        $this->statement = $this->connection->prepare($query);

        // Execute the statement with the given parameters
        $this->statement->execute($params);

        // Return the current instance for method chaining
        return $this;
    }

    // Method to get all results from the last executed statement
    public function get()
    {
        // Return all the results from the last executed statement
        return $this->statement->fetchAll();
    }

    // Method to get the first result from the last executed statement
    public function find()
    {
        // Return the first result from the last executed statement
        return $this->statement->fetch();
    }

    // Method to get the first result from the last executed statement or abort if no result found
    public function findOrFail()
    {
        // Get the first result from the last executed statement
        $result = $this->find();

        // If no result found, abort
        if (! $result) {
            abort();
        }

        // Return the result
        return $result;
    }
}