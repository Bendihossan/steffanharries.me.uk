<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Debug\ExceptionHandler;

// Handle exceptions nicely
ExceptionHandler::register(false);

$app = new Silex\Application();
//$app['debug'] = true;
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());

$app['session']->start();

// Routes
$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__.'/views',
));

$app->get('/', function() use($app) {
    return $app['twig']->render('index.html.twig', array ());
});

$app->get('/about/', function() use($app) {
    return $app['twig']->render('about.html.twig', array ());
});

$app->get('/development/', function() use($app) {
    return $app['twig']->render('development.html.twig', array ());
});

$app->get('/photography/', function() use($app) {
    return $app['twig']->render('photography.html.twig', array ());
});

$app->get('/contact/', function() use($app) {
    return $app['twig']->render('contact.html.twig', array ());
});

$app->run();
?>
