<?php

require 'bootstrap.php';
use Abraham\TwitterOAuth\TwitterOAuth;

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) ||
    empty($_SESSION['access_token']['oauth_token']) ||
    empty($_SESSION['access_token']['oauth_token_secret'])
) {
    header('Location: ./clearsessions.php');
    exit;
}

/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
$user = $connection->get('account/verify_credentials', ['tweet_mode' => 'extended', 'include_entities' => 'true']);

if (property_exists($user, 'status')) {
    // Embedded status doesn't always have everything needed for <twitter-status>
    $tweet = $connection->get('statuses/show', [
      'id' => $user->status->id_str,
      'tweet_mode' => 'extended',
      'include_entities' => 'true'
    ]);
} else {
    $tweet = [];
}

$data = [
    'access_token' => $access_token,
    'json_status' => json_encode($tweet),
    'json_user' => json_encode($user),
    'user' => $user,
];

echo $twig->render('profile.html', $data);
