<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmSubtitle extends Model
{

	protected $table    = 'film_subtitles';

    protected $fillable = ['path','name', 'film_id'];
    
}
