<?php

session_start();
define('DEBUG', getenv('DEBUG') === 'true');

require 'http.php';
require 'vendor/autoload.php';
require 'templates.php';

define('CONSUMER_KEY', getenv('CONSUMER_KEY'));
define('CONSUMER_SECRET', getenv('CONSUMER_SECRET'));
define('OAUTH_CALLBACK', getenv('OAUTH_CALLBACK'));

if (!CONSUMER_KEY || !CONSUMER_SECRET || !OAUTH_CALLBACK) {
    exit('The CONSUMER_KEY, CONSUMER_SECRET, and OAUTH_CALLBACK environment variables must be set to use this demo.'
         . 'You can register an app with Twitter at https://apps.twitter.com/.');
}
