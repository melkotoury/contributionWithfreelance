@extends('partials.partialsapp')



@section('header.scripts')
    <link rel="stylesheet" href="{{ url('site') }}/css/contact.css">

@stop


@section('content')
<style media="screen">
  body{
    background: white!important;
  }
</style>
    <!--Content-->
    <section id="page-title" class="section">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h3>Get In Touch</h3>
          </div>
        </div>
      </div>
    </section>


<!--Content-->

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="well well-sm">

              <!-- display validation errors -->
            @if (Session::has('added'))
                <div class="alert alert-success">
                    Sent Successfully
                </div>
            @endif
            <!-- end display errors -->
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

        <form action="{{ url('contact') }}" method="post" >
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">
                  Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required="required" />
              </div>
              <div class="form-group">
                <label for="email">
                  Email Address</label>
                <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
              </div>
              <div class="form-group">
                <label for="subject">
                  Subject</label>
                <select id="subject" name="subject" class="form-control" required="required">
                  <option value="na" selected="">Choose One:</option>
                  <option value="service">General Customer Service</option>
                  <option value="suggestions">Suggestions</option>
                  <option value="product">Product Support</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">
                  Message</label>
                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                          placeholder="Message"></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-inverse pull-right" id="btnContactUs">
                Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-4">
      <form>
        <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
        <address>
          <strong>I am a Film, Inc.</strong><br>
            <i class="fa fa-map-marker "></i> Dubai Media City Second Floor , <br>
             Bldg. No. 2 (CNN Bldg.)<br>
          <abbr title="Phone">
            <i class="fa fa-phone"></i></abbr>
             00201222848061
        </address>
        <address>
         <i class="fa fa-envelope"></i> <a href="mailto:info@iamafilm.com"> info@iamafilm.com</a>
        </address>
      </form>
    </div>
  </div>
</div>





<!--Map Section-->
    <section id="map">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.261103908917!2d55.14959711744383!3d25.093021299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b44c2f10867%3A0xb2baf84a4eeb0bc7!2sDubai+Media+City!5e0!3m2!1sen!2seg!4v1488076619647" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>


     <!--Twitter Feed-->
    <!--<section id="twitter" class="section">-->
      <!--<div class="container">-->
        <!--<div class="row">-->
          <!--<div class="col-sm-12 text-center">-->
            <!--<i class="fa fa-twitter fa-4x gray margin-20"></i>-->
          <!--</div>-->
        <!--</div>-->
        <!---->
        <!--<div class="row">-->
        <!---->
          <!--<div class="col-sm-6">-->
            <!--<blockquote class="twitter-tweet" lang="en"><p>Root Cave New Website Launch <a href="http://t.co/YLbXUFhz5d">http://t.co/YLbXUFhz5d</a></p>&mdash; Root Cave (@rootcave) <a href="https://twitter.com/rootcave/statuses/404968762446970880">November 25, 2016</a></blockquote>-->
  <!--<script async src="../../../../../../platform.twitter.com/widgets.js" charset="utf-8"></script>-->
          <!--</div>-->
          <!---->
          <!--<div class="col-sm-6">-->
            <!--<blockquote class="twitter-tweet" lang="en"><p>Our sites up and CSSMania <a href="http://t.co/KKaKX75WrH">http://t.co/KKaKX75WrH</a> <a href="https://twitter.com/cssmania">@cssmania</a> - Give it a vote if you like it!</p>&mdash; Root Cave (@rootcave) <a href="https://twitter.com/rootcave/statuses/403515461158961152">November 21, 2016</a></blockquote>-->
  <!--<script async src="../../../../../../platform.twitter.com/widgets.js" charset="utf-8"></script>-->
          <!--</div>-->
          <!---->
        <!--</div>-->
        <!---->
      <!--</div>-->
    <!--</section>-->

   @stop


@section('footer.scripts')

@stop
