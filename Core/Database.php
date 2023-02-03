<?php

namespace Core;

use PDO;

class Database
{
    // Property to hold PDO connection object
    public $connection;

    // Property to hold current statement object
    public $statement;

    // Constructor to setup PDO connection
    public function __construct($config, $username = 'root', $password = '')
    {
        // Build the Data Source Name string
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        // Create the PDO connection object
        $this->connection = new PDO($dsn, $username, $password, [
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    // Method to prepare and execute a query
    public function query($query, $params = [])
    {
        // Prepare the statement object
        $this->statement = $this->connection->prepare($query);

        // Execute the prepared statement
        $this->statement->execute($params);

        // Return the current instance of this class
        return $this;
    }

    // Method to fetch all results from the statement
    public function get()
    {
        // Return all results
        return $this->statement->fetchAll();
    }

    // Method to fetch a single row from the statement
    public function find()
    {
        // Return a single row
        return $this->statement->fetch();
    }

    // Method to fetch a single row from the statement or throw an exception
    public function findOrFail()
    {
        // Get a single row from the statement
        $result = $this->find();

        // If result is empty, throw an exception
        if (! $result) {
            abort();
        }

        // Return the result
        return $result;
    }
}
