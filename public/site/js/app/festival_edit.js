$(document).ready(function() {




    /* add competetion modal 3 */
    $('#compForm').ajaxForm({

        beforeSubmit: function() {

            $('#adddirsubmit').html(' Loading...');


        },
        success: function(data) {

            if (data == 'dead') {

                $('#ErrorComp').html('<div class="alert alert-danger">Submission begin date should be before deadline date</div>');
                $('#adddirsubmit').html('Add Competition');

            } else if (data == 'comp_from'){

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

    //  display modal form for competetion editing
    $(document).on('click','.edit_comp',function(){

        var product_id = $(this).data('id');
       
        $.get(edit_comp + '/' + product_id, function (data) {
            
            //success data
            $('#comp_require').val(data.requirements);
            $('#comp_name').val(data.comp_name);
            $('#comp_id').val(data.id);
            $('#editCompetetionModal').modal('show');
        }) 
    });
    //  display modal form for competetion editing



    /* add competetion modal 3 */
   /* $('#editCompForm').ajaxForm({

        beforeSubmit: function() {

            $('#editCompSubmit').html('<span class="spinnered"><i class="icon-spin icon-refresh"></i></span> loading...');


        },
        success: function(response) {

            $('#compRender' + response.id).replaceWith(response.data);
            $('#editCompetetionModal').modal('hide');
            $('#editCompSubmit').html('Add Competetion <i class="fa fa-plus-circle"></i>');


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

            $('#editCompSubmit').html('Add Competetion <i class="fa fa-plus-circle"></i>');


        },

    });*/
    /* end add competetion 3 */



/*
      *
      * show delete modal  
      *
      */
      $('body').on('click','.delete_comp',function(){

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
        
        $('body').on('click','#submit_delete_comp',function(e){
            e.preventDefault();

        var product_id_delete    = $('#product_id_delete').val();
        $.post(dele_comp_url+'/delete_comp/'+product_id_delete,function(data){

                $("#compRender" + product_id_delete).remove();                                             
               $('#modal-container-3495').modal('hide');

        });

      });
      /* End Deleting Form */






});
/* end ready function */