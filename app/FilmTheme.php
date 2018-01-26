<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmTheme extends Model
{


	protected $table    = 'film_themes';

    protected $fillable = ['name', 'film_id'];

}
