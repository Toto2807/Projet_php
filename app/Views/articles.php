<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .article {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }
        .article h2 {
            margin: 0;
        }
        .article p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Liste des articles</h1>
    <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <div class="article">
                <h2><?php echo htmlspecialchars($article['titre']); ?></h2>
                <p><?php echo htmlspecialchars($article['contenu']); ?></p>
                <p><small>Publié le : <?php echo $article['date_creation']; ?></small></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun article disponible.</p>
    <?php endif; ?>
</body>
</html>
