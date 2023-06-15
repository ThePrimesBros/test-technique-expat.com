<?php

class Article extends Model
{
    public function createArticle($title, $content, $categoryId)
    {
        // Prepare and execute the INSERT statement
        $stmt = $this->db->prepare("INSERT INTO articles (title, content, category_id) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $categoryId]);

        return $this->db->lastInsertId();
    }

    public function getAllArticles()
    {
        // Prepare and execute the SELECT statement
        $stmt = $this->db->prepare("SELECT * FROM articles");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticlesByCategory($categoryId)
    {
        // Prepare and execute the SELECT statement with a WHERE condition
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE category_id = ?");
        $stmt->execute([$categoryId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Add other methods for updating, deleting, and retrieving single articles as needed
}