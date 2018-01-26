@extends('partials.partialsapp')



@section('header.scripts')
    <style>
        .items{
            background: white;
            z-index: 3;
        }

        h3.page-title{
            color: #eb3d39;
        }
    </style>

@stop

@section('content')

    <!--Content-->
    <section id="page-title" class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="page-title">Payment and Refunding</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="page-paragraphs" class="items">
        <div class="container">
            <ul class="list-group">
        <li class="list-group-item">The payment is for each private film to submit to all festivals on the website</li>
        <li class="list-group-item">If the festival takes fee for submission the filmmaker has to pay it</li>
        <li class="list-group-item">The payment is only to use the service of submitting the films</li>
        <li class="list-group-item">The festivals have freedom to give waiver codes for discount and/or making it free</li>
        <li class="list-group-item">the website has freedom to give discount or free membership to any filmmaker</li>
        <li class="list-group-item">No payment is refunded OR canceled</li>
        <li class="list-group-item">No film can be withdrawn from a festival and no fees are refunded</li>
        <li class="list-group-item">In the event that transaction error has occurred through the absolute fault of  Iamfilm, a refund will in most cases be issued to the same credit card you used for the original payment.</li>

            
            </ul>
        </div>
    </section>

@stop


@section('footer.scripts')

@stop