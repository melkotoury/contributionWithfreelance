@extends('partials.partialsapp')



@section('header.scripts')

<link rel="stylesheet" href="{{ url('site') }}/css/programmer.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

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

            <h4> Oops !!! <br></h4>
            <h5> The waiver code you are trying to use , was used before , please try again with different waiver code or different payment method<br></h5>
            <h5>To submit your film again , Please click <a href="{{ url('submit_film') }}">here </a></h5>

            <form action="{{ url('process_payfort').'/'.$amount_in_cents }}" method="post">
                <script src="https://beautiful.start.payfort.com/checkout.js"
                        data-key="<?php echo $api_keys['open_key']; ?>"
                        data-currency="<?php echo $currency ?>"
                        data-amount="<?php echo $amount_in_cents ?>"
                        data-email="<?php echo $customer_email ?>"
                >
                </script>
            </form>

            {{--<form action="{{ url('process_paypal').'/'.$amount_in_cents }}" method="post">--}}
                {{--<input type="submit" class="btn btn-primary" value="Checkout With Paypal" style="margin-top: 10px;">--}}
                {{--</form>--}}



        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@stop


@section('footer.scripts')
<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>
<script src="asset('site') }}/js/lib/sweetalert.min.js"></script>


@stop
