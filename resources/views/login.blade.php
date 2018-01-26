@extends('partials.partialsapp')
@section('header.scripts')
    <link rel="stylesheet" href="{{ asset('site') }}/css/login.css">


@stop


@section('content')


    <!--Content-->
    <section id="signup">
      <div class="container">
        <div class="row margin-40">
          
            <div class="col-sm-6 col-sm-offset-3 text-center signup">
              <h3>Log In</h3><br />
              
              <!--<ul class="list-inline social-icons-signup">-->
                 <!--<li><a class="twitter" href="#" target="_blank"><i class="fa fa-twitter fa-3x"></i></a></li>-->
                 <!--<li><a class="facebook" href="#" target="_blank"><i class="fa fa-facebook fa-3x"></i></a></li>-->
                 <!--<li><a class="google" href="#" target="_blank"><i class="fa fa-google-plus fa-3x"></i></a></li>-->
               <!--</ul>-->

              <form id="signup-form" class="form-horizontal" method="post" action="{{ url('login') }}">
              <div class="control-group">
              <!-- display validation errors -->
              @if (Session::has('bad'))
                  <div class="alert alert-danger">
                      These Credentials Doesn't Match Our Records..
                  </div>
              @endif
              <!-- end display errors -->

              <!-- display validation errors -->
              @if (Session::has('confirmed'))
                  <div class="alert alert-success">
                      Your Email Has Been Confirmed Successfully..
                  </div>
              @endif
              <!-- end display errors -->

              <!-- display validation errors -->
              @if (Session::has('failed'))
                  <div class="alert alert-success">
                      failed to confirm your account..
                  </div>
              @endif
              <!-- end display errors -->

              <!-- display validation errors -->
              @if (Session::has('resend'))
                  <div class="alert alert-success">
                      Check Your Mail For Activation Link
                  </div>
              @endif
              <!-- end display errors -->

              
                <div class="controls">
                    <div class="input-prepend">
                     <span class="add-on"><i class="fa fa-user"></i></span>
                    <input type="text" class="input-xlarge" id="fname" name="username" placeholder="Username">
                  </div>
                </div>
              </div>
                                          
              <div class="control-group">
                <div class="controls">
                    <div class="input-prepend">
                  <span class="add-on"><i class="fa fa-lock"></i></span>
                    <input type="Password" id="passwd" class="input-xlarge" name="password" placeholder="Password">
                  </div>
                </div>
              </div>
          
              <div class="control-group">
                  <div class="controls">
                   <button type="submit" class="btn-main"><i class="fa fa-sign-in"></i> Log In</button>
                  </div>
                </div>
              </form>
                
                <a href="javascript:;" data-toggle="modal" style="color: #FFFFFF!important;" data-target="#modal-container-3496">
                  Forget Password
                </a>
               

                <p class="small-message"><small>Don't have an account?</small></p>
                <div class="control-group">
                    <div class="controls">
                        <div class="col-md-6">
                            <button  class="btn-main" onclick="window.open('{{ url('signup') }}','_self')"> Sign up as Filmmaker</button>
                        </div>
                        <div class="col-md-6">
                            <button data-toggle="modal" data-target="#modal-container-3495"  class="btn-main" > Sign up as Festival</button>
                        </div>

                    </div>
                </div>
          
          </div><!--End Span6-->
          
        </div><!--End Row-->
      </div><!--End Container-->
    </section>
        
   <!-- start FESTIVAL modal -->
    <div class="modal fade" id="modal-container-3495" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Confirmation
              <button  type="button" class="close " data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              </h4>
            </div>
            <div class="modal-body">
              <!-- start modal body -->
                    <h4 class="text-center">Just to make sure you are a real festival .</h4>
                    <h4 class="text-center"> Please contact us at info@iamafilm.com to create your account</h4>
                     

                      </div>
                 </form>
           <div class="modal-footer">
                             <form role="form" id="form_delete">
                      <div class="form-group">
                      </div>
                      <div class="form-group">
                       <input type="hidden" id="product_id_delete" name="product_id" value="0">

                          <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 


                         <!-- <button class="btn btn-danger" id="submit_delete_comp"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button> -->
                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end FESTIVAL modal -->

   



   <!-- start EMAIL modal -->
    <div class="modal fade" id="modal-container-3496" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Forget Password
              <button  type="button" class="close " data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              </h4>
            </div>
            <div class="modal-body">
              <!-- start modal body -->
                  <h4 class="text-center">we will send a confirmation meesage to your mail.</h4>
                  <form action="{{ url('reset_password') }}" id="mailForm" method="post">

                  <input placeholder="example@example.com" type="email" name="email" class="form-control" required>   

                  <div id="dirErrors"></div>  
                  </div>

           <div class="modal-footer">

                      <div class="form-group">
                          <button type="submit" id="adddirsubmit" class="btn btn-info"> Send <i class="fa fa-plus"></i>

                          <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 


                         <!-- <button class="btn btn-danger" id="submit_delete_comp"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button> -->
                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end EMAIL modal -->

     
 @stop


@section('footer.scripts')
<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>
<script>
  
  /*


start adding by soly

*/


$(document).ready(function() {


    /* add director form 3 */
    $('#mailForm').ajaxForm({

        beforeSubmit: function() {

            $('#adddirsubmit').html(' waiting...');

        },
        success: function(data) {

            if (data.success == 'false') {

                $('#dirErrors').html('<div class="alert alert-danger"> there is no user with this email </div>');

            }


            if (data.success == 'true') {

                $('#dirErrors').html('<div class="alert alert-success">sent successfully, check your email now </div>');

            }

            $('#adddirsubmit').html('Send');


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

            $('#adddirsubmit').html('Send');


        },

    });
    /* end add director form */
});
</script>

@stop


