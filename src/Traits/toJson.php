<?php
namespace App\Traits;

trait toJson
{
    public function getJson($obj)
    {
        return json_encode($obj);
    }
}
