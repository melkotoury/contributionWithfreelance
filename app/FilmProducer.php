<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmProducer extends Model
{


	protected $table    = 'film_producers';

    protected $fillable = ['name', 'email', 'phone', 'film_id'];

}
