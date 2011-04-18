<?php

class AbstractDao {
    protected $dbh;

    function __construct($dbh) {
        $this->dbh = $dbh;
    }
}
