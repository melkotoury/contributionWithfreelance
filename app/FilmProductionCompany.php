<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmProductionCompany extends Model
{


	protected $table    = 'film_production_companies';

    protected $fillable = ['name', 'film_id'];

}
