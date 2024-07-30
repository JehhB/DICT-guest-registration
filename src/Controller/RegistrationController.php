<?php

namespace App\Controller;

use Laminas\Diactoros\Response;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class RegistrationController
{
  public function __construct(private Engine $templates) {}

  public function index(ServerRequestInterface $request): ResponseInterface
  {
    $content = $this->templates->render('registration', ['name' => 'World']);
    $response = new Response();
    $response->getBody()->write($content);
    return $response;
  }
}
