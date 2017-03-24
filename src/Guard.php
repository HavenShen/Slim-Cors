<?php

namespace HavenShen\Slim\Cors;

class Guard
{

    public $settings;

    protected $response;

    public function __construct($settings = [])
    {
        $this->settings = array_merge([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS'
        ],$settings);
    }

    public function __invoke($request, $response, $next)
    {
        $this->response = $next($request, $response);
        foreach ($this->settings as $key => $value) {
            $this->response = $this->response->withAddedHeader($key, $value);
        }
        return $this->response;
    }

    public function getResponseHeradersOrigin()
    {
        return $this->response->getHeaderLine('Access-Control-Allow-Origin');
    }
}