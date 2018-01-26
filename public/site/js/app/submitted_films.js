/**
 * Created by melkotoury on 1/20/17.
 */
$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});



// ajax

$(document).ready(function() {

    /* add director form 3 */
    $('#addFolder').ajaxForm({

        beforeSubmit: function() {

            $('#adddirsubmit').val(' waiting...');

        },
        success: function(data) {

            $('#modd').modal('hide');
            $('#adddirsubmit').val('Create Folder');
            $('#Folders').html(data.html);

               $('.mySelect').append('<option value='+data.id +'>'+ data.name +'</option>');
               $('.no_directories').remove();

            if (data.sub == 'false') {

                $('.append_parent').append('<option value='+data.id +'>'+ data.name +'</option>')
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
            $('#dirErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#adddirsubmit').val('Create Folder');


        },

    });
    /* end add director form */



    /* move film  form 3 */
    $('#moveFilm').ajaxForm({

        beforeSubmit: function() {

            $('#moveSubmit').val(' waiting...');

        },
        success: function(data) {

            $('#Folders').html(data.html);
            $('#move_modal').modal('hide');
            $('#moveSubmit').val('Confirm Moving');
            $('#filmNumber' + data.id).remove();


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
            $('#moveError').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#moveSubmit').val('Confirm Moving');


        },

    });
    /* end move film */




    /* copy film  form 3 */
    $('#copyFilm').ajaxForm({

        beforeSubmit: function() {

            $('#copySubmit').val(' waiting...');

        },
        success: function(data) {


            $('#Folders').html(data.html);

            $('#copy_modal').modal('hide');
            $('#copySubmit').val('Confirm Coping');


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
            $('#copyError').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#copySubmit').val('Confirm Moving');


        },

    });
    /* end copy  film */












    /* status film  form 3 */
    $('#statusFilm').ajaxForm({

        beforeSubmit: function() {

            $('#statusSubmit').val(' waiting...');

        },
        success: function(data) {

            $('#status_modal').modal('hide');
            $('#statusSubmit').val('accept');


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
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#statusSubmit').val('Confirm Moving');


        },

    });
    /* end copy  film */







    /* copy film  form 3 */
    $('#serachForm').ajaxForm({

        beforeSubmit: function() {

            $('#searchSubmit').val('searching...');

        },
        success: function(data) {

                url = this.url+'&page=';
                page = 1;

            if (data.success == 'true') {

                $('#searchModal').modal('hide');
                $('#searchSubmit').val('search');
                $('#post-data').html(data.html);
                $('#serachForm').trigger('reset');
                $('#searchError').html(' '); //appending to a <div id="form-errors"></div> inside form

            } else {

               $('#searchError').html('<div class="alert alert-info"> No Films Found With This Search </div>'); //appending to a <div id="form-errors"></div> inside form
                $('#searchSubmit').val('search');

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
            $('#searchError').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#searchSubmit').val('search');


        },

    });
    /* end copy  film */









    /* add vote programmer 3 */
    $('#programmerVote').ajaxForm({

        beforeSubmit: function() {

            $('#programmerVoteSubmit').val('adding...');

        },
        success: function(data) {

            if (data.success == 'true') {

                $('#programmer_votes').modal('hide');
                $('#programmerVoteSubmit').val('Add Vote');

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
            $('#programmerError').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#programmerVoteSubmit').val('Add Vote');


        },

    });
    /* end add vote programmer */

/*
    $('body').on('click','#folderModal',function() {

        $('.load-folders').show();
        $('#modd').modal('show');


        $.ajax({

            url:'',
            type:'post',
            beforeSend:function (argument) {

             $('.load-folders').show();
                
            },
            success:function(data) {

             $('.load-folders').hide();

                if (data.success == 'false') {

                $('.no-votes').show();

                }else{

                  $('.append_votes').html(data.html);
                   
                } 


            },
            error:function(error) {
                
            }


        });
        


    });

*/

// ========================================
//
//
//  SORTING
//
//
// ========================================


// sort according to alpha
$('body').on('click','.sort_alpha',function(e) {

    e.preventDefault();

    var id   = $('#sortingID').data('id');
    var type = $('#sortingID').data('type');
    var folder = $('#folderID').val();    
    var status = $(this).data('status');

    if ($('.sort_alpha').data('status') == 0) {

        $('.sort_alpha').data('status',1);

    } else if ($('.sort_alpha').data('status') == 1){
    
       $('.sort_alpha').data('status',0);

    }

    $.ajax({

            type:'get',
            url: sort_url + 'sort_alpha',
            dataType: 'json',
            data:{status:status,type:type,folder:folder,id:id},
            beforeSend: function()
            {
               $('#post-data').html('<h3 class="text-center"><img src=' + gif_url +'></h3>')
            },
            success: function (data) {

                url = this.url+'&page=';
                page = 1;


                if (data.success == 'false') {

                    $("#post-data").html('<h4 class="text-center">No Films Here</h4>');    

                } else {

                    $("#post-data").html(data.html);    
                }

            },
            error: function (data) {

                alert('Error:', data);
            }
      });


});






// sort according to submission date
$('body').on('click','.sort_sub_date',function(e) {

    e.preventDefault();

    var id   = $('#sortingID').data('id');
    var type = $('#sortingID').data('type');
    var folder = $('#folderID').val();    
    var status = $(this).data('status');

    if ($('.sort_sub_date').data('status') == 0) {

        $('.sort_sub_date').data('status',1);

    } else if ($('.sort_sub_date').data('status') == 1){
    
       $('.sort_sub_date').data('status',0);

    }

    $.ajax({

            type:'get',
            url: sort_url + 'sort_sub_date',
            dataType: 'json',
            data:{status:status,type:type,folder:folder,id:id},
            beforeSend: function()
            {
               $('#post-data').html('<h3 class="text-center"><img src=' + gif_url +'></h3>')
            },
            success: function (data) {

                url = this.url+'&page=';
                page = 1;


                if (data.success == 'false') {

                    $("#post-data").html('<h4 class="text-center">No Films Here</h4>');    

                } else {

                    $("#post-data").html(data.html);    
                }

            },
            error: function (data) {

                alert('Error:', data);
            }
      });


});










// sort according to film production date
$('body').on('click','.sort_prod_date',function(e) {

    e.preventDefault();

    var id   = $('#sortingID').data('id');
    var type = $('#sortingID').data('type');
    var folder = $('#folderID').val();    
    var status = $(this).data('status');

    if ($('.sort_prod_date').data('status') == 0) {

        $('.sort_prod_date').data('status',1);

    } else if ($('.sort_prod_date').data('status') == 1){
    
       $('.sort_prod_date').data('status',0);

    }

    $.ajax({

            type:'get',
            url: sort_url + 'sort_prod_date',
            dataType: 'json',
            data:{status:status,type:type,folder:folder,id:id},
            beforeSend: function()
            {
               $('#post-data').html('<h3 class="text-center"><img src=' + gif_url +'></h3>')
            },
            success: function (data) {

                url = this.url+'&page=';
                page = 1;


                if (data.success == 'false') {

                    $("#post-data").html('<h4 class="text-center">No Films Here</h4>');    

                } else {

                    $("#post-data").html(data.html);    
                }

            },
            error: function (data) {

                alert('Error:', data);
            }
      });


});













// sort according to film production date
$('body').on('click','.sort_duration',function(e) {

    e.preventDefault();

    var id   = $('#sortingID').data('id');
    var type = $('#sortingID').data('type');
    var folder = $('#folderID').val();    
    var status = $(this).data('status');

    var status = $(this).data('status');

    if ($('.sort_duration').data('status') == 0) {

        $('.sort_duration').data('status',1);

    } else if ($('.sort_duration').data('status') == 1){
    
       $('.sort_duration').data('status',0);

    }

    $.ajax({

            type:'get',
            url: sort_url + 'sort_duration',
            dataType: 'json',
            data:{status:status,type:type,folder:folder,id:id},
            beforeSend: function()
            {
               $('#post-data').html('<h3 class="text-center"><img src=' + gif_url +'></h3>')
            },
            success: function (data) {

                url = this.url+'&page=';
                page = 1;


                if (data.success == 'false') {

                    $("#post-data").html('<h4 class="text-center">No Films Here</h4>');    

                } else {

                    $("#post-data").html(data.html);    
                }

            },
            error: function (data) {

                alert('Error:', data);
            }
      });


});




// START SORTING USING COMPETETION 

$('body').on('change','.select_comp',function () {
    
    var id = this.value;
    var festival_id = $(this).data('id');
     $('#sortingID').data('id',id);
     $('#sortingID').data('type',0);

    $.ajax({

            type:'get',
            url: sort_url + 'sort_competetions'+ '/' +id+ '/' +festival_id,
            dataType: 'json',
            beforeSend: function()
            {
               $('#post-data').html('<h3 class="text-center"><img src=' + gif_url +'></h3>')
            },
            success: function (data) {

                url = this.url+'?page=';
                page = 1;


                if (data.success == 'false') {

                    $("#post-data").html('<h4 class="text-center">No Films Here</h4>');    

                } else {

                    $("#post-data").html(data.html);    
                }

            },
            error: function (data) {

                alert('Error:', data);
            }
      });


});

// END SORTING USING COMPETETION 











        /* start film contact details modal */
        $('body').on('click','.film_owner_contacts',function () {

                var id = $(this).data('id');
                $('.status_body').hide();
                $('.load-status').show();
                $('#film_owner_contacts').modal('show');


                $.ajax({

                    url:sort_url+'film_owner_contacts',
                    type:'post',
                    data:{id:id},
                    beforeSend:function (argument) {

                     $('.load-status').show();
                        
                    },
                    success:function(data) {

                     $('.load-status').hide();
                     $('.film_contacts_modal_body').html(data.html);
                     $('.status_body').show();
                           
                        


                    },
                    error:function(error) {
                        
                    }


                });
                

        });
        /* END  film contact details modal */
      







});
