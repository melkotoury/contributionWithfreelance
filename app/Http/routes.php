<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

   Route::get('admin',function ()
   {
       if (Auth::check()) {
          return redirect('admin/home');
       } else {
          return redirect('admin/login');
       }
   });


   Route::get('film/show_dialogue/{id}','FilmController@dialogueList');

   Route::get('film/show_presskit/{id}','FilmController@pressKit');





 // ===============================
 //
 //    START PAYFORT
 //
 // ================================

    Route::get('server_under_construction','PaymentController@ucService');
   /* process payfort for submissions */
  Route::post('process_payfort/{amount}','PaymentController@processPayfort');
//  Route::post('process_paypal/{amount}','PaymentController@processPaypal');
Route::get('checkout/{comp}/{film}/{festival}','PaymentController@showPayment');
Route::get('checkout_redeem/{waiver_amount}/{waiver}','PaymentController@showWaiverPayment');

  /* process payfort for adding private films */
  Route::post('process_payfort_film/{amount}/{film}','PaymentController@processFilmPayfort');
//  Route::post('process_paypal_film/{amount}/{film}','PaymentController@processFilmPaypal');
  Route::get('checkout_for_film/{film}','PaymentController@showPaymentFilm');


  /* show payment success and fail */
  Route::get('payfort_success','PaymentController@showPayfortSuccess');
  Route::get('payfort_failed','PaymentController@showPayfortFailed');
//  Route::get('paypal_success','PaymentController@getDone');
//  Route::get('paypal_failed','PaymentController@getCancel');
//  Route::get('paypal_film_success','PaymentController@getPayFilmDone');
//  Route::get('paypal_film_failed','PaymentController@getPayFilmCancel');


 // ===============================
 //
 //    END PAYFORT
 //
 // ================================

 // ===============================
 //
 //    START PAYPAL
 //
 // ================================

 /* process paypal for submissions */

  Route::post('process_paypal/{amount}','PaymentController@processPaypal');

 /* process paypal for adding private films */

Route::post('process_paypal_film/{amount}/{film}','PaymentController@processFilmPaypal');

 /* show payment success and fail */
  Route::get('paypal_success','PaymentController@getDone');
  Route::get('paypal_failed','PaymentController@getCancel');
  Route::get('paypal_film_success','PaymentController@getPayFilmDone');
  Route::get('paypal_film_failed','PaymentController@getPayFilmCancel');
    /* paypal checkout */
//  Route::post('checkout/{amount}','PaypalController@checkout');
    /* get Done Paypal */
//  Route::get('done','PaypalController@getDone');
  /* get Cancel Paypal */
//  Route::get('cancel','PaypalController@getCancel');
   /* process paypal for submissions */
//  Route::get('paypal/{comp}/{film}/{festival}','PaypalController@showPaypal');


 // ===============================
 //
 //    END PAYPAL
 //
 // ================================



    Route::get('add_elite/{film}','HomeController@processEliteSubmit');



   Route::post('film/delete_dialogue/{id}','FilmController@deleteDialogue');
   Route::post('film/delete_press/{id}','FilmController@deletePress');
   Route::post('film/delete_sub/{id}/{film_id}','FilmController@deleteSub');
   Route::post('film/delete_mat/{id}/{film_id}','FilmController@deleteMat');

   // search map film makers
   Route::post('search_film_makers','FilmController@searchMap');


   // search festivals map
   Route::post('search_festivals','FestivalController@searchMap');


   // getting competetion countries
   Route::post('comp_country/{id}','FestivalController@compCountry');

   // getting competetion countries
   Route::post('comp_regions/{id}','FestivalController@compRegion');


    // filter festivals
   Route::get('film/filter_festival','FilmController@filterFestival')->middleware('film_maker');


     // show festival
    Route::get('festival','PagesController@festival');


    /* home view */
    Route::get('/','HomeController@home');

    /* my films */
    Route::get('myfilms','PagesController@showMyfilm')->middleware('film_maker');

    /* map_film_maker */
    Route::get('map_film_maker','PagesController@showFilmMap');

    /* map_festivals */
    Route::get('map_festivals','PagesController@showFestivalMap');


    // confirmation mail
    Route::get('register/verify/{confirmationCode}','HomeController@confMail');


    /* my private films */
    Route::get('my_private_films','PagesController@showMyPrivatefilm')->middleware('film_maker');

    /* my public films */
    Route::get('my_pub_films','PagesController@showMyPublicfilm')->middleware('film_maker');

    /* show film detailed */
    Route::get('film/{film_url}','FilmController@showFilm');

    /* cteate film */
    Route::get('create_film/{status?}','PagesController@createFilm')->middleware('film_maker');

    // edit film form one
    Route::post('edit_film_one/{id}','FilmController@editFilmOne')->middleware('film_maker');



    // edit film add dir
    Route::post('add_dir/{id?}','FilmController@addDir')->middleware('film_maker');

    // edit film add dir
    Route::post('edit_dir/{id?}','FilmController@editDir')->middleware('film_maker');

    // delete dir
    Route::post('deletedir/{id}','FilmController@deleteDir')->middleware('film_maker');



    // edit film add Distribution company
    Route::post('add_dist/{id?}','FilmController@addDist')->middleware('film_maker');

    // edit film add Distribution company
    Route::post('edit_dist/{id?}','FilmController@editDist')->middleware('film_maker');

    // delete Distribution company
    Route::post('deletedist/{id}','FilmController@deleteDist')->middleware('film_maker');



    // edit film add Producer
    Route::post('add_prod/{id?}','FilmController@addProd');

    // edit film add Producer
    Route::post('edit_prod/{id?}','FilmController@editProd');

    // delete Producer
    Route::post('deleteprod/{id}','FilmController@deleteProd');



    // edit film add Production Company
    Route::post('add_product/{id?}','FilmController@addProduct');

    // edit film add Production Company
    Route::post('edit_product/{id?}','FilmController@editProduct');

    // delete Production Company
    Route::post('deleteproduct/{id}','FilmController@deleteProduct');


    // edit film add Team
    Route::post('add_team/{id?}','FilmController@addTeam')->middleware('film_maker');

    // edit film add Production Company
    Route::post('edit_team/{id?}','FilmController@editTeam')->middleware('film_maker');

   // delete Production Company
   Route::post('deleteteam/{id}','FilmController@deleteTeam')->middleware('film_maker');



   // add  film poster
   Route::post('film/add_poster/{id?}','FilmController@addPoster')->middleware('film_maker');


   // add  film still
   Route::post('film/add_still/{id?}','FilmController@addStill')->middleware('film_maker');

   // add  film director photo
   Route::post('film/add_dir_photo/{id?}','FilmController@addDirPhoto');

   // add  film dialogue
   Route::post('film/dialogue/{id?}','FilmController@addDialogue');


   // add  film press
   Route::post('film/press/{id?}','FilmController@addPress');

   // add  film other_material
   Route::post('film/other_material/{id?}','FilmController@addOtherMaterial');

   // add film subtitles
   Route::post('addsubtitles/{id?}','FilmController@addSubtitle');


   // add  film Material
   Route::post('film_links/{id?}','FilmController@addLinks')->middleware('film_maker');


   // add  film Material
   Route::post('film_awards/{id?}','FilmController@addAwards')->middleware('film_maker');


   // get film maker for map_film_maker
   Route::get('num_film_maker','FilmController@showMap');


   // submit a film
   Route::post('film/submit','FilmController@submitAfilm')->middleware('film_maker');


    /* submit a film */
    Route::get('submit_film','HomeController@submitFilm')->middleware('film_maker');

    /* edit a film */
    Route::get('edit_film/{id}','FilmController@editFilm')->middleware('film_maker');

    /* delete a film */
    Route::post('delete_film/{id}','FilmController@deleteFilm')->middleware('film_maker');

    /* film detailed */
    Route::get('film_detailed','PagesController@showFilmDetails');

    /* Terms and Conditions */
    Route::get('/our_festivals','PagesController@our_festivals');

    /* about */
    Route::get('about','PagesController@about');

    /* Terms and Conditions */
    Route::get('/terms','PagesController@terms');
    /* Privacy */
    Route::get('/privacy','PagesController@privacy');
    /* Terms and Conditions */
    Route::get('/payment_refunding','PagesController@payrefund');
    /* contact */
    Route::get('contact','PagesController@showContact');
    Route::post('contact','HomeController@postContact');

    /* home view */
    Route::get('/','PagesController@home');

    /* login view */
    Route::get('login','PagesController@login');
    Route::post('login','HomeController@postLogin');

    /* log out */
    Route::get('logout','PagesController@logout');



    /* signup view */
	Route::get('signup','HomeController@signup');

    // first sign up form
	Route::post('addfmaker','HomeController@postSignup');

    // second sign up form
    Route::post('addfmakertwo','HomeController@postSignupTwo');

    // third sign up form
    Route::post('addfmakerthree','HomeController@postSignupThree');



    // mail inline validation
	Route::post('mail','HomeController@checkMail');

    // username inline validation
    Route::post('username','HomeController@checkUsername');

    // get profile
    Route::get('{username}','HomeController@getProfile');

    // edit profile
    Route::get('edit/{username}','HomeController@editProfile');
    Route::post('edit/{username}','HomeController@postEditProfile');

    // edit image in profile
    Route::post('updatephoto/{username}','HomeController@postEditPhoto');

    // update password in profile
    Route::post('updatepass/{username}','HomeController@postEditPasword');


    // create film
     Route::post('create_film_one','FilmController@createFilmOne');


     // waiver coupen handling
     Route::post('redeem_coupon','HomeController@redeemCoupon');
     Route::get('waiver_used','HomeController@waiverUsed');





 // ===============================
 //
 //    START FILTERING FESTIVALS
//
// ================================


  // SORTING


    // sort alphapatically
    Route::get('filter_festivals/sort_all','SortingController@sortFestivalsAll');


    // sort alphapatically
    Route::get('filter_festivals/sort_date','SortingController@sortFestivalsDate');


    // sort alphapatically
    Route::get('filter_festivals/sort_submission','SortingController@sortFestivalsSubmission');


    // sort alphapatically
    Route::get('filter_festivals/sort_deadline','SortingController@sortFestivalsDeadline');


    // sort alphapatically
    Route::get('filter_festivals/sort_closed','SortingController@sortFestivalsClosed');



 // ===============================
 //
 //    END FILTERING FESTIVALS
//
// ================================








 // ===============================
 //
 //    START FESTIVAL
//
// ================================


Route::group([ 'prefix'=>'festival','middleware'=>['web']],function ()
{


    // sign up
    Route::get('signup','PagesController@signup');

    // get film maker for map_film_maker
    Route::get('num_festivals','FestivalController@showMap');

    // show submitted films
    Route::get('films','FestivalController@showSubmitted')->middleware('programmer');

    // festival Programmer
  Route::get('programmers','FestivalController@addProgrammer')->middleware('festival');

    // festival Programmer
    Route::post('add_programmer','FestivalController@addPostProgrammer')->middleware('festival');

    Route::post('edition/add_poster/{id?}','FestivalController@addPoster');

    // get editions
    Route::get('editions','FestivalController@showEditions')->middleware('festival');

    // get editions
    Route::get('edition_details/{id}','FestivalController@showEditionDetails');

    // add edition
    Route::get('add_edition','FestivalController@addEdition')->middleware('festival');

    // post add edition
    Route::post('add_edition','FestivalController@postAddEdition')->middleware('festival');


    // edit edition
    Route::get('edit_edition/{id}','FestivalController@editEdition')->middleware('festival');

    // post edit edition
    Route::post('edit_edition/{id}','FestivalController@postEditEdition')->middleware('festival');

    // delete edition
    Route::post('delete_edtion/{id}','FestivalController@deleteEdition')->middleware('festival');


    // first sign up form
    Route::post('add','FestivalController@postSignup');

    // second sign up form
    Route::post('addtwo','FestivalController@postSignupTwo');

    // third sign up form
    Route::post('addthree','FestivalController@postSignupThree');

    //  add competetion
    Route::post('addcompetetion','FestivalController@addCompetition');

    // display edit comp modal
    Route::get('edit_comp/{id}','FestivalController@editComp');

    // edit competetion
    Route::post('editcompetetion/{id}','FestivalController@postEditComp');

    // delete comp
    Route::post('delete_comp/{id}','FestivalController@deleteComp');

    // edit festival profile first form
    Route::post('edit/{username}','FestivalController@postEditProfile')->middleware('festival');

    // edit image in profile
    Route::post('updatephoto/{username}','FestivalController@postEditPhoto')->middleware('festival');

   // show competetions
   Route::get('competetions/{id}','FestivalController@showComp');

   // add folder
   Route::post('add_folder/{id}','FestivalController@addFolder');

   // move film
   Route::post('move_film','FestivalController@moveFilm');

   // copy film
   Route::post('film_status','FestivalController@statusFilm');

   // copy film
   Route::post('copy_film','FestivalController@copyFilm');


   // search film
   Route::get('search','FestivalController@searchFilm');


   // filter films
   Route::get('filter_films/{id}','FestivalController@filterFilm');


   // add vote for programmer
   Route::post('programmer_vote/{id}','FestivalController@addProgrammerVote');


   // film viewed or not
    Route::post('film_viewed','FestivalController@filmViewed');

   // show votes
    Route::post('show_votes','FestivalController@showVotes');

   // show film status
    Route::post('fuck','FestivalController@showFilmStatus');

   // show film status
    Route::post('film_owner_contacts','FestivalController@showFilmOwnerContacts');



  // SORTING


    // sort alphapatically
    Route::get('sort_alpha','SortingController@sortAlpha');


    // sort according to submission date
    Route::get('sort_sub_date','SortingController@sortSubDate');



    // sort according to film production date
    Route::get('sort_prod_date','SortingController@sortProdDate');



    // sort according to film production date
    Route::get('sort_duration','SortingController@sortDuration');



    // sort according to competetions
    Route::get('sort_competetions/{id}/{festival_id}','SortingController@sortComp');


    // delete folder
    Route::post('delete_folder/{id}','FestivalController@deleteFolder');




});

 // ===============================
 //
 //    END FESTIVAL
//
// ================================

Route::get('admin/login','AdminController@login');
Route::post('admin/login','AdminController@postLogin');
Route::get('admin/logout','AdminController@logout');




/*  password  */
Route::post('reset_password','PasswordController@resetPassword');
Route::post('change_password','PasswordController@changePassword');
Route::get('password/reset/{token}','PasswordController@showResetForm');





// admin
/* start admin credentials */
Route::group([ 'prefix'=>'admin','middleware'=>['web','admin']],function ()
{


  // admin home
  //Route::get('/','AdminController@showHome');


  // admin home
  Route::get('home','AdminController@home');

  // admin transactions
  Route::get('transactions','AdminController@showTransactions');
  Route::get('transactions/films','AdminController@showFilmTransactions');
  Route::get('invoice/{id}','AdminController@showInvoice');

  // admin Elite
  Route::get('elite','AdminController@showElite');
  Route::get('addelite','AdminController@addElite');
  Route::post('addelite','AdminController@postAddElite');

  Route::get('editelite/{id}','AdminController@editElite');
  Route::post('editelite/{id}','AdminController@postEditElite');

  /*  delete elite*/
  Route::post('deleteelite/{id}', 'AdminController@deleteElite');
  // end elite crud


	// start user crud
	// admin users
    Route::get('users','AdminController@showUsers');

	// add admin
    Route::get('adduser','AdminController@addAdmin');
    Route::post('adduser','AdminController@postAddAdmin');

    /* edit admin  */
    Route::get('edituser/{id}','AdminController@showEditUser');
    Route::post('edituser/{id}','AdminController@editUser');

    /*  delete users*/
    Route::post('deleteuser/{id}', 'AdminController@deleteUser');
    // end user crud




    // films
        Route::get('films','AdminController@showFilms');
        // submitted films
        Route::get('submitted_films','AdminController@showSubmittedFilms');
	// festivals
    Route::get('festivals','AdminController@showFestivals');

	// add festival
    Route::get('addfestival','AdminController@addFestival');
    Route::post('addfestival','AdminController@postAddFestival');

    /* edit festival  */
    Route::get('editfestival/{id}','AdminController@showEditFestival');
    Route::post('editfestival/{id}','AdminController@editFestival');
    Route::post('editfestival_password/{id}','AdminController@editFestivalPassword');

    /*  delete festival*/
    Route::post('deletefestival/{id}', 'AdminController@deleteFestival');
    // end festival crud



	  // show programmers
    Route::get('programmers','AdminController@showProgrammers');

	  // show add programmers
    Route::get('addprogrammer','AdminController@addProgrammer');
    Route::post('addprogrammer','AdminController@postAddProgrammer');

    /* edit programmers  */
    Route::get('editprogrammer/{id}','AdminController@showEditProgrammer');
    Route::post('editprogrammer/{id}','AdminController@editProgrammer');

    /*  delete programmers*/
    Route::post('deleteprogrammer/{id}', 'AdminController@deleteProgrammer');
    // end programmers crud




	  // show film makers
    Route::get('filmmakers','AdminController@showFilmMakers');

  	// add film makers
    Route::get('addfilmmaker','AdminController@addFilmMaker');
    Route::post('addfilmmaker','AdminController@postAddFilmMaker');

    /* edit film maker  */
    Route::get('editfilmmaker/{id}','AdminController@showEditFilmmaker');
    Route::post('editfilmmaker/{id}','AdminController@editFilmmaker');
    Route::post('editfilmmaker_password/{id}','AdminController@editFilmmakerPassword');

    /*  delete film maker*/
    Route::post('deletefilmmaker/{id}', 'AdminController@deleteFilmmaker');
    // end film maker crud



	// show messages
    Route::get('inbox','AdminController@showMessages');
    Route::get('message/{id}','AdminController@showMessage');


	// show compose
    Route::get('compose/{id?}','AdminController@compose');
    Route::post('compose/{id?}','AdminController@postCompose');


  // show sitesetting
    Route::get('sitesetting','AdminController@showSiteSettings');
    Route::post('sitesetting','AdminController@postSiteSettings');

  // waivers
    Route::get('waivers','AdminController@showWaivers');
    Route::get('festival_waivers/{id}','AdminController@showFestivalWaivers');
    Route::post('add_waiver','AdminController@addWaivers');
    Route::post('add_festival_waiver/{id?}','AdminController@postWaivers');


});
/* end admin credentials */
