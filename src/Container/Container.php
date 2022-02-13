<?php
namespace App\Container;

class Container
{
    private $services;

    public function __construct()
    {
        $services = [];
    }

    public function get_service($service)
    {
        return $this->services[$service];
    }

    public function get_services()
    {
        return $this->services;
    }

    public function add_service($name, $service) {
        $this->services[$name] = $service;
    }
}