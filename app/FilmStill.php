<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmStill extends Model
{
    protected $fillable = ['path','name', 'film_id'];
}
