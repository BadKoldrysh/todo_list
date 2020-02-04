<?php
declare(strict_types = 1);

namespace App;

class Database
{
    private $host;
    private $username;
    private $pass;
    private $db;
    private $connection;

    public function __construct($host, $username, $pass, $db)
    {
        $this->host = $host;
        $this->username = $username;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function connect()
    {
        $this->connection = new \mysqli($this->host, $this->username, $this->pass, $this->db);
        
        // Check connection
        if ($this->connection->connect_error) {
            throw new Exception("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function select(string $table, ?array $columns = null)
    {
        $cols = !isset($columns) || empty($columns)
            ? '*'
            : implode($columns, ', ');

        $query = "SELECT " . $cols . " FROM " . $table;
        $res = $this->connection->query($query);
        $rows = [];
        for ($i = 0; $i < $res->num_rows; $i++) {
            $res->data_seek($i);
            $rows[] = $res->fetch_assoc();
        }
        return $rows;
    }

    public function insert(string $table, $values)
    {
        if (!isset($this->connection)) {
            throw new Exception("Error: database isn't connected.");
        }

        $query = "INSERT INTO " . $table . "(name) VALUES ('" . $values . "');";

        return $this->connection->query($query);
    }
}