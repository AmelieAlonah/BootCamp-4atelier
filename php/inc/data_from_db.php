<?php
$dataArticlesList = [];
$dataCategoriesList = [];
$dataAuthorsList = [];

$pdo = connectToDb();

$test = getArticle(1);

$sql = '
  SELECT `id`,
  `name`
FROM `category`
';
$pdoStatement = $pdo->query($sql);
$results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $currentId => $currentResult){
  $dataCategoriesList[$currentResult['id']] = new Category($currentResult['name']);
  ;
}


//! SECTION dataAuthorsList
$sql = '
  SELECT `id`,
         `name`
  FROM `author`
';
$pdoStatement = $pdo->query($sql);
$results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $currentId => $currentResult){
  $dataAuthorsList[$currentResult['id']] = new Author($currentResult['name']);
  ;
}

//! FABRICATION de dataArticlesList 
$sql = '
  SELECT `id`,
         `title`,
         `content`,
         `author_id`,
         `published_date`,
         `category_id`
  FROM `post`
';
$pdoStatement = $pdo->query($sql);
$results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $currentId => $currentResult){
  $dataArticlesList[$currentResult['id']] = new Article(
    $currentResult['title'],
    $currentResult['content'],
    $dataAuthorsList[$currentResult['author_id']]->getName(),
    $currentResult['published_date'],
    $dataCategoriesList[$currentResult['category_id']]->getName()
      
  );
}


