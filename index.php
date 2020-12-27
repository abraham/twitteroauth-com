<?php

require 'bootstrap.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$data = [
  'json_status' => file_get_contents('20.json'),
  'json_user' => file_get_contents('jack.json'),
];

echo $twig->render('index.html', $data);
