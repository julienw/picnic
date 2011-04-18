<?php
require_once 'config/config.php';
require_once 'includes/toro.php';
require_once 'includes/handlers/DbHandler.inc.php';

require_once 'includes/Twig/Autoloader.php';
Twig_Autoloader::register();

define('TEMPLATES_PATH', 'templates');

$loader = new Twig_Loader_Filesystem(TEMPLATES_PATH);
$twig = new Twig_Environment($loader, array(
    'cache' => TEMPLATES_CACHE,
    'strict_variables' => true,
    'debug' => true
));


class MainHandler extends DbHandler {
    public function get() {
        global $twig;
        $template = $twig->loadTemplate('index.html');
        $template->display(array());
    }
}

$site = new ToroApplication(array(
    array('/', 'MainHandler'),
));

$site->serve();
