<?php

use League\Route\Router;
use League\Plates\Engine;
use Laminas\Diactoros\ResponseFactory;
use League\Container\Container;

session_start();

$container = new Container();

$container->add('router', Router::class);
$container->add('response_factory', ResponseFactory::class);
$container->add('template_engine', function () {
  return new Engine(__DIR__ . '/../templates');
});

$container->add(PDO::class, function () {
  $host = $_ENV['MYSQL_HOST'] ?? 'localhost';
  $database = $_ENV['MYSQL_DATABASE'] ?? 'database';
  $username = $_ENV['MYSQL_USER'] ?? 'root';
  $password = $_ENV['MYSQL_PASSWORD'] ?? '';
  try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $conn;
  } catch (PDOException $e) {
    exit("Connection Failed: {$e->getMessage()}");
  }
});

$router = $container->get('router');
$strategy = (new League\Route\Strategy\ApplicationStrategy)->setContainer($container);
$router->setStrategy($strategy);
require_once __DIR__ . '/routes.php';

$app = new class($router, $container->get('response_factory')) {
  private $router;

  public function __construct($router)
  {
    $this->router = $router;
  }

  public function run()
  {
    $request = Laminas\Diactoros\ServerRequestFactory::fromGlobals();
    $request = $request->withAttribute('session', $_SESSION);
    $response = $this->router->dispatch($request);
    (new Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
  }
};

return $app;
