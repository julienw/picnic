<?php

require_once('includes/dao/AbstractDao.inc.php');

class PicnicDao extends AbstractDao {

    private static $sql_create = "insert into picnic (name, expected, when) values (?, ?, ?)";
    private $stmt_create;

    function __construct($dbh) {
        parent::__construct($dbh);

        $this->stmt_create = $dbh->prepare($PicnicDao::sql_create);
    }

    function create($name, $expectedNb, $when) {
        if (! $this->stmt_create->execute($name, $expectedNb, $when)) {
            $arr = $this->stmt_create->errorInfo();
            error_log("error executing create picnic : " . $arr[2]);
            return false;
        }


        return $this->dbh->lastInsertId();
    }

}

