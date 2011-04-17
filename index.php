<?php

require_once 'includes/toro.php';


class MainHandler extends ToroHandler {
    public function get() { 
        echo 'Hello, world';
    }
}

$site = new ToroApplication(array(
    array('/', 'MainHandler')
));

$site->serve();

