<?php

class Database
{
    /**
     * Database constructor.
     * @param $login string
     * @param $pass string
     * @param $db string
     * @param $host string
     */
    public function __construct($login, $pass, $db, $host){
        $this->pdo = new PDO('mysql:host='.$host.';dbname='.$db, $login, $pass);
    }

}