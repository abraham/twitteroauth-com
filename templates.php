<?php

$loader = new Twig_Loader_Filesystem(__DIR__ . DIRECTORY_SEPARATOR . 'templates');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    // 'cache' => __DIR__ . DIRECTORY_SEPARATOR . 'cache',
));
$twig->addExtension(new Twig_Extension_Debug());
