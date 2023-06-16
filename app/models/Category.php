<?php

namespace App\Models;
use \PDO;

class Category extends Model
{
    public function createCategory($name)
    {
        $stmt = $this->db->prepare("INSERT INTO category (name) VALUES (?)");
        $stmt->execute([$name]);

        return $this->db->lastInsertId();
    }

    public function getAllCategory()
    {
        $stmt = $this->db->prepare("SELECT * FROM category");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
