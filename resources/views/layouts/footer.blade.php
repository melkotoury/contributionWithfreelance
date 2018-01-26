<!--Bottom Section-->
<section id="bottom">
    <div class="container">
        <div class="row margin-40">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <p>Dubai Media City Second Floor, Bldg. No. 2 (CNN Bldg.) | 00201222848061 | <a href="mailto:info@iamafilm.com"><i class="icon-envelope-alt"></i> info@iamafilm.com</a></p>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <!--Social Icons-->
                <ul class="social-icons">
                    <li><a class="twitter" href="http://www.twitter.com/rootcave" target="_blank"><i class="fa fa-twitter fa-3x"></i></a></li>
                    <li><a class="facebook" href="http://www.facebook.com/" target="_blank"><i class="fa fa-facebook fa-3x"></i></a></li>
                    <li><a class="google" href="http://www.googleplus.com/" target="_blank"><i class="fa fa-google-plus fa-3x"></i></a></li>
                    <li><a class="instagram" href="http://www.instagram.com/" target="_blank"><i class="fa fa-camera-retro fa-3x"></i></a></li>
                    <li><a class="pinterest" href="http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest fa-3x"></i></a></li>
                    <li><a class="linkedin" href="http://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin fa-3x"></i></a></li>
                </ul>

            </div>
        </div>

    </div>
</section>


<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>&copy; Copyrights. I am a film All Rights Reserved. Created by <a href="http://www.rootcave.com/" target="_blank">Root Cave.</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"><p><a href="{{url('/terms')}}">General Terms and Conditions </a></p></div>
            <div class="col-sm-3"><p><a href="{{url('/privacy')}}">Privacy </a></p></div>
            <div class="col-sm-3"><p><a href="{{url('/payment_refunding' )}}">Payment and Refunding</a></p></div>
            <div class="col-sm-3">
                <p><a href="{{url('/about')}}">About</a></p>
            </div>
        </div>

    </div>
</section>


<!-- adding one meta tag for ajax compatability for all requests  -->
<meta name="_token" content="{!! csrf_token() !!}" />


<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../../../../../ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{ asset('
        site ') }}/js/lib/jquery-1.11.2.min.js"><\/script>')
</script>
<script src="{{ asset('site') }}/js/lib/bootstrap.min.js"></script>
<script src="{{ asset('site') }}/js/app/main.js"></script>

<script>
    ! function($) {
        $(function() {
            $('#header').carousel()
        })
    }(window.jQuery)
</script>
@yield('footer.scripts')



</body>

</html>