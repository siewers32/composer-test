<?php
namespace App\Controllers;

use App\Container\Container;

class Foo
{
    private $pookie;

    public function __construct()
    {
        $this->pookie = "Hello World";
    }

    public function show()
    {
        return $this->pookie;
    }

}