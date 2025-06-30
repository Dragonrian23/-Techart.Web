<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news['title']); ?> - Галактический вестник</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <style>
        .article-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .article-header {
            margin-bottom: 2rem;
            
        }
        
        .article-title {
            font-size: 2.8rem;
            color:rgb(0,0,0) ;
            margin-bottom: 0.5rem;
            line-height: 1.2;
            font-weight: 700;
        }
        
        .article-meta {
        background-color:rgb(240, 240, 240);
    
        color:RGBA(0,0,0,0.6);
        font-size:0.7rem;
        margin-bottom:1rem;
        margin-top:1rem;
        border-radius:30px;
        padding:0.5rem 0.5rem;
        background-size:contain;
        display:inline-block;
        }
        
        .article-main {
            display: flex;
            gap: 3rem;
            align-items: flex-start;
        }
        
        .article-text-section {
            flex: 1;
            max-width: 60%;
        }
        
        .article-announce {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1.5rem;
            line-height: 1.6;
            color: rgb(132,24,68);
        }
        
        .article-text {
            font-size: 1rem;
            color: #333;
            line-height: 1.7;
            text-align: justify;
            white-space: pre-line;
        }
        
        .article-image-section {
            flex: 0 0 40%;
            max-width: 40%;
        }
        
        .article-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            display: block;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: rgb(132,24,68);
            background-color: white;
            border: 2px solid rgb(132,24,68);
            border-radius: 30px;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            margin-top: 1rem;
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.02rem;
            
        }
        
        .back-link:hover {
            color: white;
            background-color: rgb(132,24,68);
        }
        
        
                 .header {
             border-bottom: 1px solid black;
         }
         
         .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: 12.2rem;
            padding-bottom: 0.5rem;
            margin-top: 1rem;
        }
        
        .logo-image {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
        
        .logo-text {
            font-size: 1.7rem;   
            font-weight: bold;
            color: rgb(99,82,136);
            letter-spacing: 0.3rem;
            line-height: 1.2;
        }
        
        .breadcrumb-container {
            max-width: 1200px;
            margin-left: 10rem;
            margin-top: 3rem;
            padding: 1rem 2rem;
        }
        
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #666;
        }
        
        .breadcrumb-link {
            color: rgb(0,0,0);
            text-decoration: none;
            font-weight: 500;
        }
        
        .breadcrumb-link:hover {
            color:rgb(132,24,68);
        }
        
        .breadcrumb-separator {
            color: #999;
            margin: 0 0.3rem;
        }
        
        .breadcrumb-current {
            color: #333;
            font-weight: 500;
            max-width: 600px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>

<body>
<header class="header">
        <div class="header-container">
            <div class="logo">
                <img src="images/logotip.png" alt="Логотип" class="logo-image">
                <span class="logo-text">ГАЛАКТИЧЕСКИЙ <br> ВЕСТНИК</span>
            </div>
        </div>
    </header>

    <div class="breadcrumb-container">
        <div class="breadcrumb">
            <a href="index.php" class="breadcrumb-link">Главная</a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-current"><?php echo htmlspecialchars($news['title']); ?></span>
        </div>
    </div>

    <div class="article-content">
        <article>
            <div class="article-header">
                <h1 class="article-title"><?php echo htmlspecialchars($news['title']); ?></h1>
                <div class="article-meta">
                    <?php echo date('d.m.Y', strtotime($news['date'])); ?>
                </div>
            </div>

            <div class="article-main">
                <div class="article-text-section">
                    <div class="article-announce">
                        <?php echo htmlspecialchars($news['announce']); ?>
                    </div>

                    <div class="article-text">
                        <?php echo htmlspecialchars($news['content']); ?>
                    </div>
                </div>

                <?php if ($news['image']): ?>
                <div class="article-image-section">
                    <img src="../public/images/<?php echo htmlspecialchars($news['image']); ?>" 
                         alt="<?php echo htmlspecialchars($news['title']); ?>" 
                         class="article-image">
                </div>
                <?php endif; ?>
            </div>

            <a href="index.php" class="back-link">← НАЗАД К НОВОСТЯМ</a>
        </article>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <p>© 2032-2412 "Галактический вестник"</p>
        </div>
    </footer>
</body>
</html> 