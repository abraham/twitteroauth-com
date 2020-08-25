## TwitterOAuth

Documentation and demo site for the TwitterOAuth PHP library.

# Development

1. Register a [Twitter app](https://developer.twitter.com/apps).
1. Set `http://localhost:8000/callback.php` as a "Callback URL" in the newly registered application.
1. Create `.env` file.
   ```console
   cp example.env .env
   ```
1. Set `CONSUMER_KEY` and `CONSUMER_SECRET` in `.env`.
1. Install dependencies.
   ```console
   npm install
   ```
1. Start dev server.
   ```console
   npm start
   ```
1. Visit [http://localhost:8000/](http://localhost:8000/).

# Deploy

1. Create a [Heroku app](https://www.heroku.com).
1. Register a [Twitter app](https://developer.twitter.com/apps).
1. Set Heroku config vars for `CONSUMER_KEY`, `CONSUMER_SECRET`, and `OAUTH_CALLBACK`. Optionally `GOOGLE_ANALYTICS_ID` and `TEMPLATE_CACHE_ENABLED`.
1. Push code to Heroku.
