<?php
require_once 'config/config.php';
require_once 'includes/toro.php';

require_once 'includes/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(TEMPLATES_PATH);
$twig = new Twig_Environment($loader, array(
    'cache' => TEMPLATES_CACHE,
    'strict_variables' => true
));


class MainHandler extends ToroHandler {
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

