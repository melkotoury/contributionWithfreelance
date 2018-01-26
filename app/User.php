<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname','username', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /* join film maker */
    public static function showFilmMaker($username)
    {

    return  DB::table('users')
            ->join('film_makers', 'users.id', '=', 'film_makers.user_id')
            ->where('users.username', '=', $username)
            ->select('users.*', 'film_makers.*')
            ->first();
    }

     /* join film maker */
    public static function showFilmMakers()
    {

    return  DB::table('users')
            ->join('film_makers', 'users.id', '=', 'film_makers.user_id')
            ->select('users.*', 'film_makers.*')
            ->orderBy('users.id','desc')
            ->get();
    }

    /* join festivals */
    public static function showFestival($username)
    {

    return  DB::table('users')
            ->join('festivals', 'users.id', '=', 'festivals.user_id')
            ->where('users.username', '=', $username)
            ->select('users.*', 'festivals.*')
            ->first();
    }

    /* join festivals */
    public static function showFestivals()
    {

    return  DB::table('users')
            ->join('festivals', 'users.id', '=', 'festivals.user_id')
            ->select('users.*', 'festivals.*')
            ->orderBy('users.id','desc')
            ->get();
    }

    /* join festivals */
    public static function showProgrammers()
    {

    return  DB::table('users')
            ->join('festival_programmers', 'users.id', '=', 'festival_programmers.user_id')
            ->select('users.*', 'festival_programmers.*')
            ->orderBy('users.id','desc')
            ->get();
    }

    /* showProgrammer */
    public static function showProgrammer($programmer_id)
    {
    return  DB::table('users')
        ->join('festival_programmers', 'users.id', '=', 'festival_programmers.user_id')
        ->select('users.*', 'festival_programmers.*')
        ->where('festival_programmers.id',$programmer_id)
        ->orderBy('users.id','desc')
        ->first();

    }
        /* showFilms */
        public static function showFilms(){
                return DB::table('users')
            ->join('films', 'users.id', '=', 'films.user_id')
            ->join('film_makers','users.id','=','film_makers.user_id')
            ->select('users.*', 'films.*','film_makers.*')
            ->orderBy('users.id','desc')
            ->get();
        }
        // Helper Function for Submitted Films in admin panel
        public static function getFilmmaker($film_id){
              return DB::table('users')
                  ->join('films','users.id','=','films.user_id')
                  ->join('film_makers','users.id','=','film_makers.user_id')
                  ->select('users.*', 'film_makers.*','films.*')
                  ->where('films.id',$film_id)
                  ->orderBy('users.id','desc')
                  ->first();

        }
        // Helper Function for Submitted Films in admin panel
        public static function getFestival($festival_id){
          return DB::table('users')
              ->join('festivals','users.id','=','festivals.user_id')
              ->select('users.*', 'festivals.*')
              ->where('festivals.id',$festival_id)
              ->orderBy('users.id','desc')
              ->first();
        }

}
