<?php

/* Load required lib files. */
session_start();
require 'vendor/autoload.php';
require 'templates.php';
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', getenv('CONSUMER_KEY'));
define('CONSUMER_SECRET', getenv('CONSUMER_SECRET'));
define('OAUTH_CALLBACK', getenv('OAUTH_CALLBACK'));

if (!CONSUMER_KEY || !CONSUMER_SECRET || !OAUTH_CALLBACK) {
    exit('The CONSUMER_KEY, CONSUMER_SECRET, and OAUTH_CALLBACK environment variables must be set to use this demo.'
         . 'You can register an app with Twitter at https://apps.twitter.com/.');
}

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
    exit;
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
$user = $connection->get("account/verify_credentials", array("include_entities" => false));

echo $twig->render("profile.html", array("access_token" => $access_token, "user" => $user));

