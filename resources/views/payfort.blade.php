@extends('partials.partialsapp')



@section('header.scripts')

    <link rel="stylesheet" href="{{ url('site') }}/css/programmer.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('site/css/vendors/sweetalert.min.css')}}">

@stop


@section('content')


<!--content-->
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Process Payment</h1>
                <hr />
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">

           <h4> you should pay festival fees to submit your film <br></h4>
           <h5> if you have waiver code you may redeem it . <br></h5>
          <form method="post" id="waiverCode" action="{{ url('redeem_coupon') }}">

              <input type="text" name="waiver_code" class="form-control pull-left" style="width:80%" placeholder="redeem code here" required>
              <button type="submit" id="submit"  class="btn btn-primary">Redeem</button>
          </form><br>
          <span class="text-center">OR</span><br><br>
{{--
      <form action="{{ url('process_payfort').'/'.$amount_in_cents }}" method="post">
			    <script src="https://beautiful.start.payfort.com/checkout.js"
			        data-key="<?php echo $api_keys['open_key']; ?>"
			        data-currency="<?php echo $currency ?>"
			        data-amount="<?php echo $amount_in_cents ?>"
			        data-email="<?php echo $customer_email ?>"
                    >
			  </script>
			</form> --}}

            <form action="{{ url('process_paypal').'/'.$amount_in_cents }}" method="post">
                <input type="submit" class="btn btn-primary" value="Checkout With Paypal" style="margin-top: 10px;">
            </form>



        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@stop


@section('footer.scripts')
<script src="{{ asset('site/js/lib/jquery.form.js') }}"></script>
<script src="{{asset('site/js/lib/sweetalert.min.js') }}"></script>

<script>


/* Create Film First Form */

    $('#waiverCode').ajaxForm({

        beforeSubmit: function() {

            $('#submit').html(' loading...');

        },
        success: function(data) {

            $('#submit').html('Redeem');

            if (data.success == 'exist') {

                swal("Sorry...", 'Invalid Waiver Code',"", "error")

            }

            if (data.success === 'used') {

                swal("Sorry...", "The waiver code you are trying to use was used before!", "error");
            }
            if (data.success === 'discount' ) {

                console.log("hello bb "+ data.waiver);
                window.location.href = '{{ url('checkout_redeem/') }}' + '/'+ data.amount + '/'+ data.waiver;
            }

            if (data.success === 'true') {

                 window.location.href = '{{ url('payfort_success') }}';
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
            $('#message_one').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#submit').html('Redeem');


        },

    });


/* end Create Film First Form */

</script>
@stop
