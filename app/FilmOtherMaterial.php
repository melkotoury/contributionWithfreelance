<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmOtherMaterial extends Model
{

	protected $table    = 'film_other_materials';

    protected $fillable = ['path', 'film_id','name'];

}
