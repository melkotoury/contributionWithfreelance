$(document).ready(function() {


    $('#continue').hide();
    $('#tabTwoFestival').hide();
    $('#tab3_continue').hide();



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

                $('#continue_one').html(' Loading...');


            },
            success: function(data) {

                if (data.done == 'unique') {

                    $('#formOneErrors').html("<div class='alert alert-danger'>this Profile ID has been already taken </div>");
                    $('#continue_one').html('Save & Continue');

                } else {


                    $('#continue').show();
                    $('#continue_one').html('Save & Continue');
                    $('#formOneErrors').html("<div class='alert alert-success'>Added Successfully... Please Continue </div>");
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

                $('#continue_one').html('Save and Continue ');


            }


        });
        /* end ajax */


    });
    /* end sign up form one */


    // image uploading with ajax
    /* sign up form 2 */
    $('#fileUploadForm').ajaxForm({

        beforeSubmit: function() {

            $('#continue_two').html(' Loading...');


        },
        success: function() {

            $('#tabTwoFestival').show();
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


            $('#continue_two').html('Save and Continue');


        },

    });
    /* end sign up form 2 */



    /* sign up form 3 */
    $('#thirdForm').ajaxForm({

        beforeSubmit: function() {

            $('#continue_three').html(' Loading...');


        },
        success: function() {

            $('#tab3_continue').show();
            $('#continue_three').html('Save and Continue ');
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

            $('#continue_three').html('Save and Continue ');


        },

    });
    /* end sign up form 3 */


    /* add competetion modal 3 */
    $('#compForm').ajaxForm({

        beforeSubmit: function() {

            $('#adddirsubmit').html(' Loading...');


        },
        success: function(data) {

            if (data == 'dead') {

                $('#ErrorComp').html('<div class="alert alert-danger">Submission begin date should be before deadline date</div>');
                $('#adddirsubmit').html('Add Competition');

            } else if (data == 'comp_from') {

                $('#ErrorComp').html('<div class="alert alert-danger">Competetion From date should be before Competetion To Date</div>');
                $('#adddirsubmit').html('Add Competition');


            } else {


                $('#appendCompetetion').append(data);
                $('#competetionModal').modal('hide');
                $('#adddirsubmit').html('Add Competition');
                $("#compForm").trigger("reset");
                $(".select2-multiple").select2('val', ' ');

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
            $('#ErrorComp').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#adddirsubmit').html('Add Competition');


        },

    });
    /* end add competetion 3 */



    /* add competetion modal 3 */
    $('#editCompForm').ajaxForm({

        beforeSubmit: function() {

            $('#editCompSubmit').html(' Loading...');


        },
        success: function(data) {


            if (data == 'dead') {

                $('#ErrorComp').html('<div class="alert alert-danger">Submission begin date should be before deadline date</div>');
                $('#editCompSubmit').html('Edit Competition');

            } else if (data == 'comp_from') {

                $('#ErrorComp').html('<div class="alert alert-danger">Competetion From date should be before Competetion To Date</div>');
                $('#editCompSubmit').html('Edit Competition');


            } else {


                $('#ErrorComp').html('<div class="alert alert-success"> edited successfully </div>'); //appending to a <div id="form-errors"></div> inside form            
                $('#editCompSubmit').html('Edit Competition ');

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
            $('#ErrorComp').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#editCompSubmit').html('Edit Competition ');


        },

    });
    /* end edit competetion 3 */



    /*
     *
     * show delete modal  
     *
     */
    $('body').on('click', '.delete_comp', function() {

        var product = $(this).data('id');

        $('#product_id_delete').val(product);
        $('#modal-container-3495').modal('show');


    });

    /*
     *
     *  end showing delete modal
     *
     */




    /* start Deleting form */

    $('body').on('click', '#submit_delete_comp', function() {


        var product_id_delete = $('#product_id_delete').val();
        $.post(dele_comp_url + '/delete_comp/' + product_id_delete, function(data) {

            $("#compRender" + product_id_delete).remove();
            $('#modal-container-3495').modal('hide');

        });

    });
    /* End Deleting Form */






});
/* end ready function */