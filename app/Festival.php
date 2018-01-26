<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{


	protected $table    = 'festivals';

    protected $fillable = ['genre', 'logo_url', 'deadline', 'festival_duration_from', 'festival_duration_to', 'accepted_categories', 'country', 'edition', 'fees', 'confirmed', 'user_id'];

    public function competetions()
    {
    	return $this->hasMany('\App\FestivalCompetetion');
    }


    public function folders()
    {
        return $this->hasMany('\App\Folder');
    }

    public function votes()
    {
        return $this->hasMany('\App\Vote');
    }

}
