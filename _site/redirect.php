<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/Code">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>TwitterOAuth PHP Library for the Twitter REST API</title>
    <meta
      name="description"
      content="The most popular PHP library for use with the Twitter OAuth REST API"
    />
    <meta name="author" content="Abraham Williams" />
    <link rel="canonical" href="https://twitteroauth.com" />

    <meta name="theme-color" content="#e7e7e7" />
    <link
      rel="icon"
      sizes="192x192"
      href="https://twitteroauth.com/images/twitter-logo-blue.png"
    />

    <meta
      property="og:title"
      content="TwitterOAuth PHP Library for the Twitter REST API"
    />
    <meta
      property="og:image"
      content="https://twitteroauth.com/images/twitter-logo-blue.png"
    />
    <meta property="og:url" content="https://twitteroauth.com" />
    <meta
      property="og:description"
      content="The most popular PHP library for use with the Twitter OAuth REST API"
    />

    <meta itemprop="name" content="TwitterOAuth PHP Library" />
    <meta
      itemprop="description"
      content="The most popular PHP library for use with the Twitter OAuth REST API"
    />
    <meta
      itemprop="image"
      content="https://twitteroauth.com/images/twitter-logo-blue.png"
    />
    <meta
      itemprop="codeRepository"
      content="https://github.com/abraham/twitteroauth"
    />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@abraham" />
    <meta
      name="twitter:title"
      content="TwitterOAuth PHP Library for the Twitter REST API"
    />
    <meta
      name="twitter:description"
      content="The most popular PHP library for use with the Twitter OAuth REST API"
    />
    <meta
      name="twitter:image"
      content="https://twitteroauth.com/images/twitter-logo-blue.png"
    />
    <meta name="twitter:url" content="https://twitteroauth.com" />

    <link rel="icon" href="https://abrah.am/favicon.ico" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/bootstrap@3/dist/css/bootstrap.min.css"
    />
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#navbar"
            aria-expanded="false"
            aria-controls="navbar"
          >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">TwitterOAuth</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <a href="https://developer.twitter.com/en/docs"
                >Twitter API Docs</a
              >
            </li>
            <li>
              <a href="https://github.com/abraham/twitteroauth">Source</a>
            </li>
            <li>
              <a href="https://github.com/abraham/twitteroauth-com/actions"
                ><img
                  src="https://github.com/abraham/twitteroauth/workflows/Test/badge.svg"
              /></a>
            </li>
            <li>
              <a href="https://github.com/abraham/twitteroauth/issues"
                ><img
                  src="https://img.shields.io/github/issues/abraham/twitteroauth.svg"
              /></a>
            </li>
            <li>
              <a
                href="https://heroku.com/deploy?template=https://github.com/abraham/twitteroauth-com"
                ><img
                  src="https://www.herokucdn.com/deploy/button.png"
                  alt="Deploy to Heroku"
                  height="19px"
              /></a>
            </li>
          </ul>
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="/redirect.php"
                ><img
                  src="/images/sign-in-with-twitter-link.png"
                  alt="Sign in with Twitter"
                  title="Sign in with Twitter"
              /></a>
            </li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container"><h1>
  Starting authorization
  <a
    href="https://github.com/abraham/twitteroauth-com/blob/master/templates/redirect.html"
    ><span
      class="glyphicon glyphicon-edit small"
      aria-hidden="true"
      title="Edit this page on GitHub"
    ></span
  ></a>
</h1>
<p>
  Generating a request_token should only happen when a user shows intent to sign
  into your site. It requires making an API request to Twitter. In your
  implementation this page should generally have no HTML rendered and instead do
  a redirect to the generated URL.
</p>

<h2>Bootstrapping</h2>
<p>
  First we set need to autoload the TwitterOAuth class and the need Twitter
  application details. We will also construct a TwitterOAuth instance with the
  application consumer_key and consumer_secret.
</p>

<pre>
require 'vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', getenv('CONSUMER_KEY'));
define('CONSUMER_SECRET', getenv('CONSUMER_SECRET'));
define('OAUTH_CALLBACK', getenv('OAUTH_CALLBACK'));

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
</pre>

<h2>Generating a request_token</h2>
<p>
  Authorizing access to a users account through OAuth starts with getting a
  temporary request_token. This request_token is only good for a few minutes and
  will soon be forgotten about.
</p>

<b>Request</b>
<pre>
$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
</pre>

<b>Response <span class="label label-info">Live</span></b>
<pre>

</pre>

<h2>Sessions</h2>
<p>
  This demo site uses basic PHP sessions but you can use whatever
  session/storage implementation you want.
</p>

<pre>
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
</pre>

<h2>Build authorize URL</h2>
<p>
  Here we are building a URL the authorizing users must navigate to in their
  browser. It is to Twitter's authorize page where the list of permissions being
  granted is displayed along with allow/deny buttons.
</p>

<b>Request</b>
<pre>
$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
</pre>

<b>Response <span class="label label-info">Live</span></b>
<pre>

</pre>
<p>
  <a class="btn btn-primary" href=""
    >Next step: authorize on twitter.com</a
  >
</p>
</div>
    <!-- /.container -->

    <footer class="footer">
      <div class="container">
        <p class="text-muted">
          Built by <a href="https://abrah.am">Abraham Williams</a> for use with
          the <a href="https://developer.twitter.com">Twitter API</a>.
          TwitterOAuth is not affiliated Twitter, Inc.
        </p>
      </div>
    </footer>

    <script src="https://unpkg.com/jquery@3/dist/jquery.slim.min.js"></script>
    <script src="https://unpkg.com/bootstrap@3/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@webcomponents/webcomponentsjs@2/webcomponents-loader.js"></script>
    <script src="https://unpkg.com/twitter-status@0.4/dist/twitter-status.min.js"></script>
    <script src="https://unpkg.com/twitter-user@0/dist/twitter-user.min.js"></script>
  </body>
</html>
