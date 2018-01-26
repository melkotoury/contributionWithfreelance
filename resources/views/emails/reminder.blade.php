<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
          <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/bootstrap.min.css">

        <style type="text/css">
            img {
              max-width: 100%;
              height: auto;
            }

        </style>
    </head>
    <body>
        <div class="text-center">
            <img width="320" class="img-responsive"  src="{{ url('site') }}/img/logo.png"  alt="logo">
        </div>
        <h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with I am a film. Please follow the link below to verify your email address,<br/>
            <a href="{{ url('register/verify/' . $confirmation_code) }}">click here</a>
            .<br/>

        </div>

    </body>
</html>
