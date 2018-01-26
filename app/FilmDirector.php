<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmDirector extends Model
{


	protected $table    = 'film_directors';

    protected $fillable = ['name', 'email', 'phone', 'film_id'];

}
