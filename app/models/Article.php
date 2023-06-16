<?php

namespace App\Models;
use App\Models\Model;
use \PDO;

class Article extends Model
{
    public function createArticle($title, $content, $categoryId)
    {
        $stmt = $this->db->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
        $stmt->execute([$title, $content]);

        $lastInsertId = $this->db->lastInsertId();

        if(isset($categoryId) && $categoryId != ""){
            $stmt = $this->db->prepare("INSERT INTO article_has_category (article_id, category_id) VALUES (?, ?)");
            $stmt->execute([$lastInsertId, $categoryId]);

            return $lastInsertId;
        }else{
            return $lastInsertId;
        }
    }

    public function getAllArticles()
    {
        $stmt = $this->db->prepare("SELECT * FROM articles");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticlesByCategory($categoryId)
    {
        $stmt = $this->db->prepare("SELECT * FROM articles INNER JOIN article_has_category ON articles.id = article_has_category.article_id WHERE category_id = ?");
        $stmt->execute([$categoryId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}