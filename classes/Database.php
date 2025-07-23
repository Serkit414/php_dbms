<?php 

/**
 * Database
 * 
 * A connectoin to the database
 */
class Database {

    /**
     * Get the database connection
     * 
     * @return PDO object Connection to the database server
     */
    public function getConn() {

        $db_host = "us-cdbr-east-03.cleardb.com";
        $db_name = "heroku_e8321b0f885dce1";
        $username = "be4838a94ecf6a";
        $password = "62618ca8";

        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';

        return new PDO($dsn, $username, $password);
        
    }
}