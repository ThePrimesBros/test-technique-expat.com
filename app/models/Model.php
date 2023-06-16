<?php

namespace App\Models;
use \PDO;

class Model
{
    protected $db;

    public function __construct()
    {
        $host = 'db';
        $dbname = 'expat_test';
        $username = 'test';
        $password = 'test';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection error: ' . $e->getMessage());
        }
    }
}