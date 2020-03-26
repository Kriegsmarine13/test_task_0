<?php
require('Database.php');

// Database class
class Test {
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new Database('root','','test_new', 'localhost');
            echo("\r\n Database connected!");
        } catch(Exception $e) {
            echo("\r\nDatabase not connected!");
            die($e); //Для драматизма сменил с var_dump
        }
        echo("<br>");
    }

    //Select box from array

    /**
     * @param $dataArray array
     */
    public function printSelectBox($dataArray)
    {
        echo("<select>");
        foreach ($dataArray as $item) {
            echo("<option>" . $item . "</option>");
        }
        echo("</select>");
    }

    //Parser

    /**
     * @param $url string
     */
    public function scrapKinorium($url)
    {
        echo("<br>Scraping...<br>");
        $main_page = file_get_contents($url);
    //What do we need? Link to movie like /1234567/
        $matches = [];
        $pattern2 = '/<a class=\'link-info-movie-type-film\' data-id=\'([0-9]+)\' data-type=\'film\' href=\'\/[0-9]+\/\' > <h3>([а-яА-Я\s\W]*)<\/h3> <h4>([a-zA-Z\s\W]*)<\/h4> <\/a>/m';
        preg_match_all($pattern2, $main_page, $matches);
        echo("<br>Gotcha!<br>");
        $result = [];
        for ($i = 0; $i <= count($matches[0]); $i++) {
            $result[$matches[1][$i]]['id'] = $matches[1][$i];
            $result[$matches[1][$i]]['Russian Title'] = $matches[2][$i];
            $result[$matches[1][$i]]['English Title'] = $matches[3][$i];
        }
        echo("<br>What do we got?..<br>");
        echo("<pre>".json_encode($result, JSON_PRETTY_PRINT)."</pre>");
    }

    //4 Задание
    // 10 фильмов без фото
    /**
    SELECT `m`.*, p.`picture_id`
    FROM `movie` m
    LEFT JOIN `pictures` p ON m.`movie_id` = p.`movie_id`
    WHERE p.`picture_id` IS NULL
    LIMIT 10
     */

    /**
     * @param $hasOrNot bool
     */
    public function getMoviesByPictures($hasOrNot){
        try {
            $query = $this->db->pdo->prepare("
            SELECT m.`title`
            FROM `movie` m
            LEFT JOIN `pictures` p ON m.`movie_id` = p.`movie_id`
            WHERE p.`picture_id` " . ($hasOrNot ? "IS NOT NULL" : "IS NULL")
            );
            $data = $query->execute();
            $data = $query->fetchAll();
            echo("<br>Success?<br>");
            var_dump($data);
        } catch(Exception $e) {
            echo("<br>Error recieving data...<br>");
            var_dump($e);
        }
    }

    // количество фильмов без фото
    /**
    SELECT COUNT(m.`movie_id`)
    FROM `movie` m
    LEFT JOIN `pictures` p ON m.`movie_id` = p.`movie_id`
    WHERE p.`picture_id` IS NULL
     */

}