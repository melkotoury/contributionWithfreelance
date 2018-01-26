$(document).ready(function() {


    $('#continue').hide();
    $('#tab2_continue').hide();
    $('#tab3_continue').hide();



    // email inline validation
/*    $("#email").keyup(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        var email = $("#email").val();

        /* start ajax */
    //     $.ajax({
    //         url: url_mail,
    //         type: 'post',
    //         dataType: 'json',
    //         data: {
    //             email: email
    //         },
    //         beforeSend: function() {
    //             $('#email').addClass("spinner");

    //         },
    //         success: function(data) {

    //             $('#email').removeClass("spinner");
    //             $('#dispass').remove();
    //             $('#awesome').html('valid Email Address');


    //         },
    //         error: function(error) {

    //             //process validation errors here.
    //             var errors = error.responseJSON; //this will get the errors response data.
    //             //show them somewhere in the markup
    //             //e.g
    //             errorsHtml = '<div class="alert alert-danger"><ul>';

    //             $.each(errors, function(key, value) {
    //                 errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
    //             });
    //             errorsHtml += '</ul></div>';
    //             $('#dispass').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
    //             // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form



    //         }


    //     });
    //     /* end ajax */


    // });

 
   /* email inline validation */



    // username inline validation
    // $("#username").keyup(function() {

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     })

    //     var username = $("#username").val();

        /* start ajax */
    //     $.ajax({
    //         url: url_username,
    //         type: 'post',
    //         dataType: 'json',
    //         data: {
    //             username: username
    //         },
    //         beforeSend: function() {
    //             $('#username').addClass("spinner");

    //         },
    //         success: function(data) {

    //             $('#username').removeClass("spinner");
    //             $('#dispasss').remove();
    //             $('#awesomes').html('valid username');


    //         },
    //         error: function(error) {

    //             $('#awesomes').remove();

    //             //process validation errors here.
    //             var errors = error.responseJSON; //this will get the errors response data.
    //             //show them somewhere in the markup
    //             //e.g
    //             errorsHtml = '<div class="alert alert-danger"><ul>';

    //             $.each(errors, function(key, value) {
    //                 errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
    //             });
    //             errorsHtml += '</ul></div>';
    //             $('#dispasss').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
    //             // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form



    //         }


    //     });
    //     /* end ajax */


    // });
    // end username inline validation



    /* sign up form 1 */
    $('#continue_one').on("click", function() {



        /* csrf protection on ajax 
         * 
         * see meta tag in solycrud.blade.php blade template
         */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })



        var fullname = $("#fullname").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var password_confirmation = $("#password_confirmation").val();
        var email = $("#email").val();

        /* start ajax */
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {
                password: password,
                fullname: fullname,
                username: username,
                password_confirmation: password_confirmation,
                email: email
            },
            beforeSend: function() {
              //  $('#continue_one').addClass("has-spinnered actived");
                $('#continue_one').html('Loading...');


            },
            success: function(data) {

            if (data.done == 'unique') {

            $('#formOneErrors').html("<div class='alert alert-danger'>this username has been already taken </div>");
            $('#continue_one').html('Save & Continue ');

            } else {

                $('#continue').show();
                $('#continue_one').html('Save & Continue');
                $('#formOneErrors').html("<div class='alert alert-success'>Added Successfully... Please Continue</div>");
            }    

            },
            error: function(error) {

                // default form wizard
                //process validation errors here.
                var errors = error.responseJSON; //this will get the errors response data.
                //show them somewhere in the markup
                //e.g
                errorsHtml = '<div class="alert alert-danger"><ul>';

                $.each(errors, function(key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></div>';
                $('#formOneErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
                // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

              //  $('#continue_one').addClass("has-spinnered actived");
                $('#continue_one').html('Save & Continue ');


            }


        });
        /* end ajax */


    });
    /* end sign up form one */


    // image uploading with ajax
    /* sign up form 2 */
    $('#fileUploadForm').ajaxForm({

        beforeSubmit: function() {

            $('#continue_two').html('loading...');


        },
        success: function() {
            
            $('#tab2_continue').show();
            $('#continue_two').html('Save & Continue');
            $('#errors_two').html("<div class='alert alert-success'>Added Successfully... Please Continue</div>");


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
            $('#errors_two').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form


            $('#continue_two').html('Save & Continue ');


        },

    });
    /* end sign up form 2 */


    // image uploading with ajax
    /* sign up form 3 */
    $('#thirdForm').ajaxForm({

        beforeSubmit: function() {

            $('#continue_three').html('Loading...');


        },
        success: function() {
            $('#tab3_continue').show();
            $('#continue_three').html('Save & Continue');
            $('#errors_three').html("<div class='alert alert-success'>Added Successfully... Please Continue</div>");


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
            $('#errors_three').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#continue_three').html('Save & Continue ');


        },

    });
    /* end sign up form 3 */



});
/* end ready function */