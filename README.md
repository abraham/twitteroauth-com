TwitterOAuth
------------

Documentation and demo site for the TwitterOAuth PHP library.

Development
===========

1. Register a [Twitter app](https://apps.twitter.com).
1. Set `http://localhost:8000/callback.php` as a "Callback URL" in the newly registered application.
1. Copy `.env.template` to `.env`.
1. Set the `CONSUMER_KEY` and `CONSUMER_SECRET` in `.env`.
1. Run `composer install` to install the dependencies.
1. Run `./scripts/dev.sh`.
1. Visit [http://localhost:8000/](http://localhost:8000/).

Deploy
======

1. Create a [Heroku app](https://www.heroku.com).
1. Register a [Twitter app](https://apps.twitter.com).
1. Set Heroku config vars for `CONSUMER_KEY`, `CONSUMER_SECRET`, and `OAUTH_CALLBACK`. Optionally `GOOGLE_ANALYTICS_ID` and `TEMPLATE_CACHE_ENABLED`.
1. Push code to Heroku.
