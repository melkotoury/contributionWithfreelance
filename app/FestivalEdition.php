<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FestivalEdition extends Model
{
    //
    protected $table    = 'festival_editions';

    protected $fillable = ['number', 'year', 'awards', 'edition_poster', 'jury', 'selections', 'festival_id',  'completed'];


}
