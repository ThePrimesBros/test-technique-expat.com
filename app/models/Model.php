<?php

class Model
{
    protected $db;

    public function __construct()
    {
        $host = 'your_database_host';
        $dbname = 'your_database_name';
        $username = 'your_database_username';
        $password = 'your_database_password';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle the database connection error
            die('Database connection error: ' . $e->getMessage());
        }
    }
}