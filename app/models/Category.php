<?php

class Category extends Model
{
    public function createCategory($name)
    {
        // Prepare and execute the INSERT statement
        $stmt = $this->db->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->execute([$name]);

        return $this->db->lastInsertId();
    }

    public function getAllCategories()
    {
        // Prepare and execute the SELECT statement
        $stmt = $this->db->prepare("SELECT * FROM categories");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add other methods for updating, deleting, and retrieving single categories as needed
}
