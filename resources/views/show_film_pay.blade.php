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
                <h1 class="title">Process Payment</h1>
                <hr />
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">

           @if($amount_in_cents == 0)

           <h4> You Are An Elite Member You Will Pay Nothing To Add Any Private Film <br>

                 0 $ = Unlimited Number Of Submissions 
           </h4>
           <a href="{{ url('add_elite').'/'.$film }}" class="btn btn-primary">Finish Creating Film</a>
           @else
           <h4> Please make the payment so you can submit the film <br>

                 {{ $amount_in_cents / 100 }}$ = Unlimited Number Of Submissions 
           </h4>
		  <form action="{{ url('process_payfort_film').'/'.$amount_in_cents.'/'.$film }}" method="post">
			    <script src="https://beautiful.start.payfort.com/checkout.js"
			        data-key="<?php echo $api_keys['open_key']; ?>"
			        data-currency="<?php echo $currency ?>"
			        data-amount="<?php echo $amount_in_cents ?>"
			        data-email="<?php echo $customer_email ?>">
			  </script>
			</form>


                {{--<form action="{{ url('process_paypal_film').'/'.$amount_in_cents.'/'.$film  }}" method="post">--}}
                    {{--<input type="submit" class="btn btn-primary" value="Checkout With Paypal" style="margin-top: 10px;">--}}
                {{--</form>--}}
            @endif


        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@stop


@section('footer.scripts')

@stop
