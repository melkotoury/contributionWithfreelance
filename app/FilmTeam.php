<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmTeam extends Model
{


	protected $table    = 'film_teams';

    protected $fillable = ['first_namr', 'last_name', 'type', 'film_id'];

}
