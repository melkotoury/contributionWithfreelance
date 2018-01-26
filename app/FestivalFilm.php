<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FestivalFilm extends Model
{


	protected $table    = 'festival_films';

    protected $fillable = ['status', 'paid', 'viewed', 'festival_id', 'film_id'];

}
