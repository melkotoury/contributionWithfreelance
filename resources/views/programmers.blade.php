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
                <h1 class="title">Create Programmer Account</h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" id="addProgrammer" method="post" action="{{ url('festival/add_programmer') }}">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Full Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="fullname" id="name"  placeholder="Enter your Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label"> Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                        </div>
                    </div>
                </div>

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
                    <button type="submit" id="add_edition_submit" class="btn btn-default btn-lg btn-block login-button">Add Programmer</button>
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