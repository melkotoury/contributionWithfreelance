<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{


	protected $table    = 'films';

    protected $fillable = ['original_title', 'english_title', 'production_date', 'film_url', 'film_languages', 'subtitles_languages', 'production_country', 'duration', 'film_school', 'film_school_check', 'debut_film', 'work_in_progress', 'status', 'short_synopsis', 'short_synopsis_english', 'long_synopsis', 'long_synopsis_english', 'film_link', 'film_password', 'film_poster', 'film_still_one', 'film_still_two', 'film_still_three', 'film_still_four', 'director_photo', 'dialogue_list', 'press_kit', 'other_material', 'website_url', 'facebook_link', 'twitter_link', 'instagram_link', 'imdb_link', 'trailer_link', 'awards', 'selection', 'completed'];



 /**
  * set array_column attribute 
  * @param string|integer  $value value of array_column attribute
  */
 public function setProductionCountryAttribute(array $value)
 {
    $this->attributes['production_country'] =  json_encode($value);
 }

 /**
  * get array_column attribute
  * @param string|integer  $value value of array_column attribute
  */
/* public function getProductionCountryAttribute($value)
 {
    $this->attributes['production_country'] =  json_decode($value);
 }
*//**
  * set array_column attribute 
  * @param string|integer  $value value of array_column attribute
  */
 public function setSubtitlesLanguagesAttribute(array $value)
 {
    $this->attributes['subtitles_languages'] =  json_encode($value);
 }

 /**
  * get array_column attribute
  * @param string|integer  $value value of array_column attribute
  */
/* public function getSubtitlesLanguagesAttribute($value)
 {
    $this->attributes['subtitles_languages'] =  json_decode($value);
 }
*//**
  * set array_column attribute 
  * @param string|integer  $value value of array_column attribute
  */
 public function setFilmLanguagesAttribute(array $value)
 {
    $this->attributes['film_languages'] =  json_encode($value);
 }

 // /**
 //  * get array_column attribute
 //  * @param string|integer  $value value of array_column attribute
 //  */
 // public function getFilmLanguagesAttribute($value)
 // {
 //    $this->attributes['film_languages'] =  json_decode($value);
 // }


 public function directors()
 {
   return $this->hasMany('App\FilmDirector','film_id','id');
 }

 public function producers()
 {
   return $this->hasMany('App\FilmProducer','film_id','id');
 }

 public function genres()
 {
   return $this->hasMany('App\FilmGenre','film_id','id');
 }

public function team()
 {
   return $this->hasMany('App\FilmTeam','film_id','id');
 }

public function subtitles()
 {
   return $this->hasMany('App\FilmSubtitle','film_id','id');
 }

public function stills()
 {
   return $this->hasMany('App\FilmStill','film_id','id');
 }


public function otherMaterial()
 {
   return $this->hasMany('App\FilmOtherMaterial','film_id','id');
 }


public function categories()
 {
   return $this->hasMany('App\FilmCategory','film_id','id');
 }




public function themes()
 {
   return $this->hasMany('App\FilmTheme','film_id','id');
 }



}
