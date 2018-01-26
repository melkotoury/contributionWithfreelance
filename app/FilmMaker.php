<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmMaker extends Model
{


	protected $table    = 'film_makers';

    protected $fillable = ['biography', 'filmography', 'Profession', 'photo', 'facebook_url', 'linkedin_url', 'instagram_url', 'youtube_url', 'vimeo_url', 'imdb_url', 'awards', 'address', 'city', 'country', 'birthdate', 'gender', 'phone', 'user_id'];

/*    public function getBirthDateAttribute($date) {

    return $date->format('d-m-y');

    }
*/
}
