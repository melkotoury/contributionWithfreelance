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
                <h1 class="title">Create New Password</h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" id="addProgrammer" method="post" action="{{ url('change_password') }}">


                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password_confirmation" id="confirm"  placeholder="Confirm your Password"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="cols-sm-12">
                        <div class="input-group" id="addEditionMessages">

                        </div>
                    </div>
                </div>

                <div class="form-group ">
                <input type="hidden" name="id" value="{{ $user->id }}">
                    <button type="submit" id="add_edition_submit" class="btn btn-default btn-lg btn-block login-button">Add New Password</button>
                </div>

            </form>
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

            $('#add_edition_submit').html('loading...');

        },
        success: function(data) {

            $('#add_edition_submit').html('Add New Password');
            $('#addEditionMessages').html('<div class="alert alert-success">changed  successfully, you can login now with new password</div>');

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

            $('#add_edition_submit').html('Add New Password');


        },

    });
    /* end add Edition form */




    });

</script>
@stop