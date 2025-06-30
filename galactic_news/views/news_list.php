<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
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
</style>
<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <img src="images/logotip.png" alt="Логотип" class="logo-image">
                <span class="logo-text">ГАЛАКТИЧЕСКИЙ <br> ВЕСТНИК</span>
            </div>
        </div>
    </header>
    
    <?php if ($latestNews): ?>
    <section class="hero">
        <div class="hero-image" style="background-image: url('images/<?php echo htmlspecialchars($latestNews['image']); ?>');">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo htmlspecialchars($latestNews['title']); ?></h1>
                <p class="hero-subtitle"><?php echo htmlspecialchars($latestNews['announce']); ?></p>
            </div>
        </div>
    </section>
    <?php endif; ?>
    
    <div class="news-container">
        <div class="news-content">
            <h1 class="page-title">Новости</h1>
            
            <div class="news-grid">
                <?php foreach ($news as $article): ?>
                    <article class="news-card">
                        <div class="news-body">
                            <div class="news-date"><?php echo date('d.m.Y', strtotime($article['date'])); ?></div>
                            <h2 class="news-title"><?php echo htmlspecialchars($article['title']); ?></h2>
                            <p class="news-excerpt">
                                <?php echo htmlspecialchars($article['announce']); ?>
                            </p>
                            <a href="show.php?id=<?php echo $article['id']; ?>" class="read-more">ПОДРОБНЕЕ →</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            
            <?php if ($totalPages > 1): ?>
                <div class="pagination">
                    <?php if ($hasPrev): ?>
                        <a href="?page=<?php echo $currentPage - 1; ?>">←</a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <?php if ($i == $currentPage): ?>
                            <span class="current"><?php echo $i; ?></span>
                        <?php else: ?>
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php if ($hasNext): ?>
                        <a href="?page=<?php echo $currentPage + 1; ?>">→</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <footer class="footer">
        <div class="footer-container">
            <p>© 2032-2412 "Галактический вестник"</p>
        </div>
    </footer>
</body>
</html> 