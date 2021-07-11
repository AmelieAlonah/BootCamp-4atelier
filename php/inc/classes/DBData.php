<?php

class DBData
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:dbname=oblog;host=localhost;charset=UTF8';
        $username = 'root';
        $password = '';

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ];

        $this->pdo = new PDO($dsn, $username, $password, $options);
    }
    // Récuperer tous les articles
    // sous la forme d'un tableau d'objets de la classe Article
    public function getAllPosts($order_column = null, $direction = 'ASC')
    {
        $sql = 'SELECT * FROM posts';

        if (!is_null($order_column)) {

            $sql .= ' ORDER BY '.$order_column. ' ' . $direction;
        }

        $sql .= ';';

        $boiteDeResultat = $this->pdo->query($sql);

        $array_results_assoc = $boiteDeResultat->fetchAll(PDO::FETCH_ASSOC);

        $array_results_object = array();

        foreach ($array_results_assoc as $currentResult) {

            $array_results_object[] = new Article(
                $currentResult['title'],
                $currentResult['text'],
                $currentResult['authors_id'],
                $currentResult['published_date'],
                $currentResult['categories_id']
            );
        }

        return $array_results_object;
    }

    // Récuperer un seul article
    public function getOnePost($id_post)
    {
        $sql = "SELECT * FROM posts WHERE id = {$id_post}";

        $boiteDeResultat = $this->pdo->query($sql);

        $one_result = $boiteDeResultat->fetch(PDO::FETCH_ASSOC);

        $onePost = new Article(
            $one_result['title'],
            $one_result['text'],
            $one_result['authors_id'],
            $one_result['published_date'],
            $one_result['categories_id']
        );

        return $onePost;
    }

    public function getAllCategories()
    {
        $sql = 'SELECT * FROM categories;';

        $boiteDeResultat = $this->pdo->query($sql);

        $array_temp = $boiteDeResultat->fetchAll(PDO::FETCH_ASSOC);

        $array_return = array();

        foreach($array_temp as $currentRow) {

            $array_return[$currentRow['id']] = $currentRow['name'];
        }

        return $array_return;
    }

    public function getAllAuthors()
    {
        $sql = 'SELECT * FROM authors;';

        $boiteDeResultat = $this->pdo->query($sql);

        $array_temp = $boiteDeResultat->fetchAll(PDO::FETCH_ASSOC);

        $array_return = array();

        foreach($array_temp as $currentRow) {

            $array_return[$currentRow['id']] = $currentRow['name'];
        }

        return $array_return;
    }
}