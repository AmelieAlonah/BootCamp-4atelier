<?php

function getHashtag($categoryName){
  $hashtag = '#' . str_replace(' ', '', $categoryName);
  return $hashtag;
}

function connectToDb(){
  $dsn = "mysql:dbname=oblogblue;host=localhost";
  $username = "oblogblue";
  $password = "oblogblue";
    // J'ajoute une option qui me permet d'avoir les erreurs directement en Warning dans PHP
  $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
  ];

  $pdoInFunction = new PDO($dsn, $username, $password, $options);
  return $pdoInFunction;
}

function getArticle($id){
  global $pdo;
  $sql = "
    SELECT * FROM `post` WHERE `id`={$id}
  ";
  $pdoStatement = $pdo->query($sql);
  $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);
  return $result;
}

