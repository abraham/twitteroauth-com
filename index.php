<?php

require 'src/bootstrap.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$data = [
  'json_status' => file_get_contents('src/20.json'),
  'json_user' => file_get_contents('src/jack.json'),
];

echo $twig->render('index.html', $data);
