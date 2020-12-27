<?php

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . DIRECTORY_SEPARATOR . 'templates');
$twig = new \Twig\Environment($loader, ['debug' => DEBUG]);
if (getenv('TEMPLATE_CACHE_ENABLED') && getenv('TEMPLATE_CACHE_ENABLED') === 'true') {
    $twig->setCache(__DIR__ . DIRECTORY_SEPARATOR . 'cache');
}
if (getenv('GOOGLE_ANALYTICS_ID')) {
    $twig->addGlobal('google_analytics_id', getenv('GOOGLE_ANALYTICS_ID'));
}
$twig->addExtension(new \Twig\Extension\DebugExtension());
