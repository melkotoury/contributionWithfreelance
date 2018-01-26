<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmCategory extends Model
{


	protected $table    = 'film_categories';

    protected $fillable = ['name', 'film_id'];

}
