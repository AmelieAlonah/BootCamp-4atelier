<?php

require __DIR__ . '/inc/kint.phar';

require __DIR__ . '/inc/classes/Article.php';
require __DIR__ . '/inc/classes/Author.php';
require __DIR__ . '/inc/classes/Category.php';

require __DIR__ . '/inc/functions.inc.php';
require __DIR__ . '/inc/data_from_db.php';

$categoryList = $dataCategoriesList;
$articlesList = $dataArticlesList;
$authorList = $dataAuthorsList;

$pageToDisplay = 'home';

if (isset($_GET['page']) && $_GET['page'] !== '') {
   $pageToDisplay = $_GET['page'];
}

// ------------------
// Page d'Accueil
// ------------------
if ($pageToDisplay === 'home') {


}
// ------------------
// Page Article
// ------------------
else if ($pageToDisplay === 'article') {
    $articleId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($articleId !== false && $articleId !== null) {
        $articleToDisplay = $articlesList[$articleId];
    } 
    else {
        $pageToDisplay = 'home';
    }
}
// ------------------
// Page Auteur
// ------------------
else if ($pageToDisplay === 'author') {
    
}
// ------------------
// Page Catégorie
// ------------------
else if ($pageToDisplay === 'category') {
    $categoryId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($categoryId !== false && $categoryId !== null) {
        $categoryToDisplay = $categoryList[$categoryId];
        $articlesToDisplay = [];

        foreach($articlesList as $currentId => $currentArticle){

            if($currentArticle->category == $categoryToDisplay->getName()){
                $articlesToDisplay[] = $currentArticle;
            }
        }

    } else {
        $pageToDisplay = 'home';
    }
    
}

// ===========================================================
// Affichage
// ===========================================================

require __DIR__.'/inc/templates/header.tpl.php';
require __DIR__.'/inc/templates/' . $pageToDisplay . '.tpl.php';
require __DIR__.'/inc/templates/footer.tpl.php';