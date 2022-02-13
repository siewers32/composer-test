<?php

namespace App\Container;

class Json
{
    public function jsonEncode($array)
    {
        print json_encode($array);
    }
}