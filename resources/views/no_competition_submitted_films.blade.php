@extends('partials.partialsapp')



@section('header.scripts')

    <link rel="stylesheet" href="{{ url('site') }}/css/programmer.css">

@stop


@section('content')


<!--content-->
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Please add competetion to enable film submission</h1>
                <hr />
            </div>
        </div>
        
    </div>
</div>

@stop


@section('footer.scripts')

<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>
<script>
    
    $(document).ready(function () {

    

    /* add Edition form 3 */
    $('#addProgrammer').ajaxForm({

        beforeSubmit: function() {

            $('#add_edition_submit').html(' loading...');

        },
        success: function(data) {
            
            if (data.done == 'unique') {

            $('#addEditionMessages').html("<div class='alert alert-danger'>this username has been already taken </div>");
            $('#add_edition_submit').html('Add Programmer');

            } else {

            $('#add_edition_submit').html('Add Programmer');
            $('#addEditionMessages').html('<div class="alert alert-success">Added Successfully</div>');
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
            $('#addEditionMessages').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#add_edition_submit').html('Add Programmer');


        },

    });
    /* end add Edition form */




    });

</script>
@stop