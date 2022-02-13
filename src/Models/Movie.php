<?php

namespace App\Models;
use App\Container\Container;
use Carbon\Carbon;

class Movie extends Model
{
    public function __construct(Container $c)
    {
        parent::__construct($c);
        $this->table = "movie";
        $this->pk = "movie_id";
    }

    public function seed() {
        echo $this->insert([
            'title' => 'Bad Cop455',
            'year' => 1993,
            'created_at' =>  Carbon::now(),
        ]);
    }
}