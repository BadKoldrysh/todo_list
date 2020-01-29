<?php
declare(strict_types = 1);

namespace App;

class Database
{
    private $host;
    private $username;
    private $pass;
    private $connection;

    public function __construct($host, $username, $pass)
    {
        $this->host = $host;
        $this->username = $username;
        $this->pass = $pass;
    }

    public function connect()
    {
        $this->connection = new \mysqli($this->host, $this->username, $this->pass);
        
        // Check connection
        if ($this->connection->connect_error) {
            throw new Exception("Connection failed: " . $this->connection->connect_error);
        }

        echo "Connection successfully";
    }
}