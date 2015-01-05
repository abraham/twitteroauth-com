<?php

$loader = new Twig_Loader_Filesystem(__DIR__ . DIRECTORY_SEPARATOR . 'templates');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
));
if (getenv('TEMPLATE_CACHE_ENABLED') && getenv('TEMPLATE_CACHE_ENABLED') != 'false') {
    $twig->setCache(__DIR__ . DIRECTORY_SEPARATOR . 'cache');
}
$twig->addExtension(new Twig_Extension_Debug());
