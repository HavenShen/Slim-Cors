<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Body;
use Slim\Http\Collection;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Uri;
use HavenShen\Slim\Cors\Guard;

class CorsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * PSR7 request object
     *
     * @var Psr\Http\Message\RequestInterface
     */
    protected $request;
    /**
     * PSR7 response object
     *
     * @var Psr\Http\Message\ResponseInterface
     */
    protected $response;

    protected $app;

    public function setUp()
    {
        $uri = Uri::createFromString('https://example.com:443/foo/bar?abc=123');
        $headers = new Headers();
        $cookies = [];
        $env = Environment::mock();
        $serverParams = $env->all();
        $body = new Body(fopen('php://temp', 'r+'));
        $this->request = new Request('GET', $uri, $headers, $cookies, $serverParams, $body);
        $this->response = new Response;
    }

    public function testDefaultOrigin()
    {
        $mw = new Guard();
        $next = function ($request, $response) use ($mw) {
            return $response;
        };
        $mw($this->request, $this->response, $next);
        // var_dump($mw->getResponseHeradersOrigin());die();
        $this->assertEquals('*', $mw->getResponseHeradersOrigin());
    }
}