<?php
//declare(strict_types=1);
use App\Controllers\Foo;
use App\Container\Container;
use App\Container\Database;
use App\Container\Json;
use App\Models\Movie;

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();

$c = new Container();

$c->add_service('db', new Database());
$c->add_service('json', new Json());

$movie = new Movie($c);
$movie->seed();

