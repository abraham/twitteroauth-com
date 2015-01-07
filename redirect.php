<?php

/* Start session and load library. */
session_start();
require 'vendor/autoload.php';
require 'templates.php';
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', getenv('CONSUMER_KEY'));
define('CONSUMER_SECRET', getenv('CONSUMER_SECRET'));
define('OAUTH_CALLBACK', getenv('OAUTH_CALLBACK'));

/* Build TwitterOAuth object with client credentials. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

/* Get temporary credentials. */
$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

/* If last connection failed don't display authorization link. */
switch ($connection->http_code) {
    case 200:
        /* Save temporary credentials to session. */
        $_SESSION['oauth_token'] = $request_token['oauth_token'];
        $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

        /* Build authorize URL and redirect user to Twitter. */
        $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
        break;
    default:
        /* Show notification if something went wrong. */
        echo 'Could not connect to Twitter. Refresh the page or try again later.';
}

echo $twig->render("redirect.html", array("request_token" => $request_token, "url" => $url));
