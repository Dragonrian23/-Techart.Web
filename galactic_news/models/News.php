<?php

require_once 'Database.php';

class News {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getNewsPaginated($page = 1, $limit = 4) {
        $offset = ($page - 1) * $limit;
        
        $sql = "SELECT id, date, title, announce, image 
                FROM news 
                ORDER BY date DESC 
                LIMIT $offset, $limit";
        
        $params = [];
        
        $news = $this->db->fetchAll($sql, $params);
        
        $totalNews = $this->getTotalCount();
        $totalPages = ceil($totalNews / $limit);
        
        return [
            'news' => $news,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalNews' => $totalNews,
            'hasNext' => $page < $totalPages,
            'hasPrev' => $page > 1
        ];
    }

    public function getNewsById($id) {
        $sql = "SELECT id, date, title, announce, content, image 
                FROM news 
                WHERE id = :id";
        
        return $this->db->fetchOne($sql, ['id' => $id]);
    }

    public function getLatestNews() {
        $sql = "SELECT id, date, title, announce, image 
                FROM news 
                ORDER BY date DESC 
                LIMIT 1";
        
        return $this->db->fetchOne($sql);
    }

    public function getTotalCount() {
        $sql = "SELECT COUNT(*) as count FROM news";
        $result = $this->db->fetchOne($sql);
        return (int)$result['count'];
    }

    public function formatDate($date) {
        return date('d.m.Y', strtotime($date));
    }
} 