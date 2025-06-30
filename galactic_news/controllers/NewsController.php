<?php

require_once '../models/News.php';

class NewsController {
    private $newsModel;

    public function __construct() {
        $this->newsModel = new News();
    }

    public function index() {
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        
        $data = $this->newsModel->getNewsPaginated($page, 4);
        
        $latestNews = $this->newsModel->getLatestNews();
        
        $news = $data['news'];
        $currentPage = $data['currentPage'];
        $totalPages = $data['totalPages'];
        $hasNext = $data['hasNext'];
        $hasPrev = $data['hasPrev'];
        
        include '../views/news_list.php';
    }

    public function show() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        if (!$id) {
            header('Location: index.php');
            exit;
        }
        
        $news = $this->newsModel->getNewsById($id);
        
        if (!$news) {
            header('Location: index.php');
            exit;
        }
        
        include '../views/news_detail.php';
    }
} 