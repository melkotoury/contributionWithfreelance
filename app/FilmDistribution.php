<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmDistribution extends Model
{


	protected $table    = 'film_distributions';

    protected $fillable = ['name', 'film_id'];

}
