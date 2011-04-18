<?php

abstract class DbHandler extends ToroHandler {
    protected $dbh;

    public function __construct() {
        $this->dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD,  array(
            PDO::ATTR_PERSISTENT => true
        ));
    }

    public function __destruct() {
        $this->dbh = null;
    }

}

