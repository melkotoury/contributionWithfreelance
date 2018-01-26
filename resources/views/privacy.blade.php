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
        p.page-paragraph{
            color: black;
            text-decoration: dotted;

        }

    </style>

@stop

@section('content')

    <!--Content-->
    <section id="page-title" class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="page-title">Privacy</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="page-paragraphs" class="items">
        <div class="container">
            <p class="page-paragraph">Information</p>
            <ol class="list-group">
                <li class="list-group-item">Private films are kept hidden ; they only appears to film festivals that the film was submitted only or to the film owner in their profile </li>
                <li class="list-group-item">All other personal information or festival information are public on their profiles for everyone</li>
                <li class="list-group-item">Public films are visible for anyone even when not logged in </li>
                <li class="list-group-item">All information or regulation given by a festival are their own responsibility </li>
                <li class="list-group-item">All Awards given by the festival are on the festival responsibility </li>
            </ol>
            <p class="page-paragraph">Information regarding submission status and/or editing the film information is only reserved to the owner of the account when they are logged in </p>
            <p class="page-paragraph">Programmer account is only made by the festival account for their programmers to login and view the submitted films and write the votes </p>
            <p class="page-paragraph">A programmer account cannot be the same account for filmmaker (not the same mail address) </p>
            <p class="page-paragraph">Programmers’ accounts are not visible on Map or on the website </p>
            <p class="page-paragraph">As Mentioned in the General Terms </p>
            <p class="page-paragraph">Any user must not: </p>
            <ol class="list-group">
                <li class="list-group-item">Use our logo or our name in any commercial purpose without our agreement</li>
                <li class="list-group-item">Take any information to republish it on any website (in case of private information) </li>
                <li class="list-group-item">Sell, rent , sub-license or duplicate material from the website </li>
                <li class="list-group-item">The public films copy rights are owned by the user who created the account to put the film so it must not be downloaded or screened commercially or public without the agreement of the Filmmaker holding the copyrights of the film  </li>
                <li class="list-group-item">Private films copy rights are owned by the user who created the account to put the film so it must not be downloaded or screened commercially or public without the agreement of the Filmmaker holding the copy rights of the film  </li>
            </ol>
            <ol class="list-group">
                <li class="list-group-item" >All credit/debit cards details and personally identifiable information will NOT be stored, sold, shared, rented or leased to any third parties. </li>
                <li class="list-group-item">The Website Policies and Terms & Conditions may be changed or updated occasionally to meet the requirements and standards. Therefore the Customers' are encouraged to frequently visit these sections in order to be updated about the changes on the website. Modifications will be effective on the day they are posted.</li>
            </ol>
        </div>
    </section>

@stop


@section('footer.scripts')

@stop