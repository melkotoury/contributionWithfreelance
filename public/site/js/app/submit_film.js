/**
 * Created by Mahmoud El Kotoury on 10/17/2016.
 */
// $(document).ready(function () {
    $('.popup-with-move-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-slide-bottom'
    });

    //login registration start


    //login registration ends
    $('.popup-with-move-anim').click(function () {
        $('#test-form > form').show(0);
        $('.forget-pass').hide(0);
    });

    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
//		mainClass: 'mfp-fade',
//		removalDelay: 160,
//		preloader: false,

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-slide-bottom'
    });

    $('.dropdown-menu a').click(function () {
        $('.dropdown button').html($(this).text() + '<span class="caret pull-right" style="margin: 10px auto;"></span>');
    });

    $('.tabs > li').eq(0).click(function () {
        $('#films').fadeOut();
        $('.festivals').delay(200).fadeIn();
        $(this).addClass('active');
        $('.tabs > li').eq(1).removeClass('active');
    });

    $('.tabs > li').eq(1).click(function () {
        $('#films').fadeIn();
        $('.festivals').fadeOut();
        $(this).addClass('active');
        $('.tabs > li').eq(0).removeClass('active');
    });


    $('.films-filter span').click(function () {
        $('.films-filter span').removeClass('active');
        $(this).addClass('active');
    });


    $('.profile-tabs li').click(function () {
        $('.profile-tabs li').removeClass('active');
        $(this).addClass('active');
    });

    $('.profile-tabs li')
        .eq(0).click(function () {
        $('#iamafilm').delay(500).slideDown('slow');
        $('#submit-video, #coins, #upload-film,#myfilm').slideUp(500);
    }).end()
        .eq(1).click(function () {
        $('#submit-video').delay(500).slideDown('slow');
        $('#iamafilm, #coins, #upload-film,#myfilm').slideUp(500);
    }).end()
        .eq(2).click(function () {
        $('#coins').delay(500).slideDown('slow');
        $('#iamafilm, #submit-video, #upload-film,#myfilm').slideUp(500);
    }).end()

        .eq(3).click(function () {
        $('#myfilm').delay(500).slideDown('slow');
        $('#iamafilm, #submit-video, #upload-film,#coins').slideUp(500);
    }).end()

        .eq(4).click(function () {
        $('#upload-film').delay(500).slideDown('slow');
        $('#iamafilm, #submit-video, #coins,#myfilm').slideUp(500);
    });


    $('#test-form form a').click(function () {
        $('#test-form > form').slideUp('slow');
        $('.forget-pass').delay(800).slideDown('slow');
    });

    $('.back').click(function () {
        $('.forget-pass').slideUp('slow');
        $('#test-form > form').delay(800).slideDown('slow');

    });





 $(document).ready(function(){



    /* edit Production Company form */
    $('#filterFestivals').ajaxForm({

        beforeSubmit: function() {

            $('#applyFilter').html('loading...');
             $('#Festival').html('<h3 class="text-center"><img src=' + gif_url +'></h3>');

        },
        success: function(response) {

             if (response == 'false') {

               $('#applyFilter').html('Apply Filter');
               $('#Festival').html('<div class="alert alert-info text-center">No Festivals Found With This Search</div>');
              

             }else{

             $('#applyFilter').html('Apply Filter');
             $('#Festival').html(response.html);

             }


        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#productEditErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // swal(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#applyFilter').html('Apply Filter');


        },

    });
    /* end edit Production Company form */


    /* ============================
    ==
    ==
    ==   SORTING
    == 
    ==    
    * ============================= */




// sort all
$('body').on('click','#sortAll',function(e) {

    e.preventDefault();

    $.ajax({

            type:'get',
            url: sort + 'sort_all',
            dataType: 'json',
            beforeSend: function()
            {
                $('#Festival').html('<h3 class="text-center"><img src=' + gif_url +'></h3>');
            },
            success: function (data) {

                url = this.url+'?page=';
                page = 1;


                 if (data == 'false') {

                   $('#Festival').html('<div class="alert alert-info text-center">No Festivals Found With This Search</div>');
                  

                 }else{

                 $('#Festival').html(data.html);

                 }

            },
            error: function (data) {

                swal('Error:', data);
            }
      });


 });






   



// sort Date
$('body').on('click','#sortDate',function(e) {

    e.preventDefault();

    $.ajax({

            type:'get',
            url: sort + 'sort_date',
            dataType: 'json',
            beforeSend: function()
            {
                $('#Festival').html('<h3 class="text-center"><img src=' + gif_url +'></h3>');
            },
            success: function (data) {

                url = this.url+'?page=';
                page = 1;


                 if (data == 'false') {

                   $('#Festival').html('<div class="alert alert-info text-center">No Upcoming Festivals To Submit</div>');
                  

                 }else{

                 $('#Festival').html(data.html);

                 }

            },
            error: function (data) {

                swal('Error:', data);
            }
      });


 });






    





   



// sort Date
$('body').on('click','#sortSubmission',function(e) {

    e.preventDefault();

    $.ajax({

            type:'get',
            url: sort + 'sort_submission',
            dataType: 'json',
            beforeSend: function()
            {
                $('#Festival').html('<h3 class="text-center"><img src=' + gif_url +'></h3>');
            },
            success: function (data) {

                url = this.url+'?page=';
                page = 1;


                 if (data == 'false') {

                   $('#Festival').html('<div class="alert alert-info text-center">No Festivals Found With This Search</div>');
                  

                 }else{

                 $('#Festival').html(data.html);

                 }

            },
            error: function (data) {

                swal('Error:', data);
            }
      });


 });






    





   



// sort Date
$('body').on('click','#sortDeadline',function(e) {

    e.preventDefault();

    $.ajax({

            type:'get',
            url: sort + 'sort_deadline',
            dataType: 'json',
            beforeSend: function()
            {
                $('#Festival').html('<h3 class="text-center"><img src=' + gif_url +'></h3>');
            },
            success: function (data) {

                url = this.url+'?page=';
                page = 1;


                 if (data == 'false') {

                   $('#Festival').html('<div class="alert alert-info text-center">No Festivals Found With This Search</div>');
                  

                 }else{

                 $('#Festival').html(data.html);

                 }

            },
            error: function (data) {

                swal('Error:', data);
            }
      });


 });






    





   



// sort Date
$('body').on('click','#sortClosed',function(e) {

    e.preventDefault();

    $.ajax({

            type:'get',
            url: sort + 'sort_closed',
            dataType: 'json',
            beforeSend: function()
            {
                $('#Festival').html('<h3 class="text-center"><img src=' + gif_url +'></h3>');
            },
            success: function (data) {

                url = this.url+'?page=';
                page = 1;


                 if (data == 'false') {

                   $('#Festival').html('<div class="alert alert-info text-center">No Festivals Found With This Search</div>');
                  

                 }else{

                 $('#Festival').html(data.html);

                 }

            },
            error: function (data) {

                swal('Error:', data);
            }
      });


 });






    
});

                           
