export default function (eleventyConfig) {
  eleventyConfig.addPassthroughCopy('src/css');
  eleventyConfig.addPassthroughCopy('src/images');
  eleventyConfig.addPassthroughCopy({
    'node_modules/bootstrap/dist/css/bootstrap.min.css':
      'vendor/bootstrap/css/bootstrap.min.css',
    'node_modules/bootstrap/dist/css/bootstrap.min.css.map':
      'vendor/bootstrap/css/bootstrap.min.css.map',
    'node_modules/bootstrap/dist/fonts': 'vendor/bootstrap/fonts',
    'node_modules/bootstrap/dist/js/bootstrap.min.js':
      'vendor/bootstrap/js/bootstrap.min.js',
    'node_modules/jquery/dist/jquery.slim.min.js':
      'vendor/jquery/jquery.slim.min.js',
    'node_modules/@webcomponents/webcomponentsjs/webcomponents-loader.js':
      'vendor/webcomponentsjs/webcomponents-loader.js',
    'node_modules/@webcomponents/webcomponentsjs/bundles':
      'vendor/webcomponentsjs/bundles',
    'node_modules/twitter-status/dist/twitter-status.min.js':
      'vendor/twitter-status/twitter-status.min.js',
    'node_modules/twitter-status/dist/twitter-status.min.js.map':
      'vendor/twitter-status/twitter-status.min.js.map',
    'node_modules/twitter-user/dist/twitter-user.min.js':
      'vendor/twitter-user/twitter-user.min.js',
    'node_modules/twitter-user/dist/twitter-user.min.js.map':
      'vendor/twitter-user/twitter-user.min.js.map',
  });
}

export const config = {
  dir: {
    input: 'src',
    output: '_site',
    layouts: '_layouts',
  },
};
