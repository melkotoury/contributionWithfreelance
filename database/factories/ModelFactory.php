<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'fullname' => $faker->name,
        'email' => $faker->safeEmail,
        'username' => $faker->city,
    //    'type' => $faker->randomElement(['film_maker' ,'festival','admin','festival_programmer']),        
        'type' => 'festival',        
        'password' => bcrypt(123456),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\FilmMaker::class, function (Faker\Generator $faker) use ($factory)  {


    return [
        'photo' => 'bahaa.jpg',
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->randomElement(countryArray()),
        'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'gender' => $faker->randomElement(['male' ,'female']),
        'phone' => $faker->phoneNumber,
        'biography' => $faker->text($maxNbChars = 200) ,
        'filmography' => $faker->text($maxNbChars = 200) ,
        'Profession' => json_encode($faker->randomElements(filmProfession(),2)),
        'facebook_url' => $faker->url,
        'linkedin_url' => $faker->url,
        'instagram_url' => $faker->url,
        'youtube_url' => $faker->url,
        'vimeo_url' => $faker->url,
        'imdb_url' => $faker->url,
        'awards' => $faker->text($maxNbChars = 200),
        'user_id' => $factory->create(App\User::class)->id,

    ];
});


$factory->define(App\Festival::class, function (Faker\Generator $faker)  use ($factory) {


    return [

        'logo_url' => 'bahaa.jpg',
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->randomElement(countryArray()),
        'accepted_categories' => json_encode($faker->randomElements(filmCategory(),2)),
        'film_type' => json_encode($faker->randomElements(filmGenres(),2)),
        'phone' => $faker->phoneNumber,
        'biography' => $faker->text($maxNbChars = 200) ,
        'awards' => $faker->text($maxNbChars = 200),
        'team' => $faker->text($maxNbChars = 200),
        'user_id' => $factory->create(App\User::class)->id,
        'edition' => rand(1,20),

    ];
});


$factory->define(App\Film::class, function (Faker\Generator $faker) use ($factory)  {


    return [

        'original_title' => $faker->jobTitle,
        'film_languages' => $faker->randomElements(filmLangArray(),2),
        'subtitles_languages' => $faker->randomElements(filmLangArray(),2),
        'short_synopsis' => $faker->text($maxNbChars = 200) ,
        'awards' => $faker->text($maxNbChars = 200) ,
        'selection' => $faker->text($maxNbChars = 200) ,
        'short_synopsis_english' => $faker->text($maxNbChars = 200),
        'long_synopsis' => $faker->text($maxNbChars = 200),
        'long_synopsis_english' => $faker->text($maxNbChars = 200),
        'user_id' => 3,   
        'film_poster' => $faker->imageUrl,
        'duration' => $faker->randomDigit,
        'facebook_link' => $faker->url,
        'website_url' => $faker->url,
        'twitter_link' => $faker->url,
        'trailer_link' => $faker->url,
        'instagram_link' => $faker->url,
        'imdb_link' => $faker->url,
        'status' => $faker->randomElement([0 , 1]),

    ]; 
});


$factory->define(App\Contact::class, function (Faker\Generator $faker)  use ($factory) {


    return [

        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'subject' => $faker->text($maxNbChars = 20),
        'message' => $faker->text($maxNbChars = 200) ,
        'seen' => $faker->randomElement([0 , 1]) ,
        'status' => $faker->randomElement([0 , 1])
    ]; 
});

$factory->define(App\Country::class, function (Faker\Generator $faker) use ($factory)  {


    return [

        'name' => countryNameTable(),
        'code' => countryCodeTable(),
    ]; 
});


$factory->define(App\FestivalCompetetion::class, function (Faker\Generator $faker) use ($factory)  {


    return [

        'film_categories' => json_encode($faker->randomElements(filmCategory(),2)),
        'film_themes' => json_encode($faker->randomElements(filmThemes(),2)),
        'film_languages' => json_encode($faker->randomElements(langArray(),2)),
        'film_lang_subtitle' => json_encode($faker->randomElements(langArray(),2)),
        'countries' => json_encode($faker->randomElements(countryArray(),8)),
        'accepted_regions' => json_encode($faker->randomElements(acceptedRegions(),3)),
        'requirements' => $faker->text($maxNbChars = 200),
        'comp_name' => $faker->name,
        'max_duration' => rand(1,30),
        'student_only' => $faker->randomElement([0 , 1]),
        'festival_id' => 2
    ]; 
});


$factory->define(App\FilmCategory::class, function (Faker\Generator $faker)  use ($factory) {


    return [

        'name' => json_encode($faker->randomElements(filmCategory(),2)),
        'film_id' => $factory->create(App\Film::class)->id
    ]; 
});


$factory->define(App\FilmGenre::class, function (Faker\Generator $faker)  use ($factory) {


    return [

        'name' => json_encode($faker->randomElements(filmGenres(),2)),
        'film_id' => $factory->create(App\Film::class)->id
    ]; 
});



$factory->define(App\FilmTheme::class, function (Faker\Generator $faker) use ($factory)  {


    return [

        'name' => json_encode($faker->randomElements(filmThemes(),2)),
        'film_id' => $factory->create(App\Film::class)->id
    ]; 
});



$factory->define(App\FilmDirector::class, function (Faker\Generator $faker) use ($factory)  {


    return [

        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'film_id' => $factory->create(App\Film::class)->id
    ]; 
});



$factory->define(App\FilmProduccer::class, function (Faker\Generator $faker)  use ($factory) {


    return [

        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'film_id' => $factory->create(App\Film::class)->id
    ]; 
});

