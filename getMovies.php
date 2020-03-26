<?php
require('Database.php');


//function getMovies() {
    try {
        $db = new Database('root','','test_new', 'localhost');
        $query = $db->pdo->prepare('
            SELECT m.`title`, IF(p.`picture_id` IS NOT NULL, 1, 0) AS `has_picture`
            FROM `movie` m
            LEFT JOIN `pictures` p ON m.`movie_id` = p.`movie_id`'
        );
        $query->execute();
        $data = $query->fetchAll();
//        header('Content-Type: application/json');
        echo json_encode($data);
    } catch(Exception $e) {
//        echo("<br>Error recieving movies<br>");
        header('Content-Type: application/json');
        echo json_encode($e);
    }
//    return ["ass" => true, "pussy" => null];
//}
