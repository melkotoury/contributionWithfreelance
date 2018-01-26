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

        <h2>Name : {{ $name }}</h2>

        <h2>Subject : {{ $subject }}</h2>

        <div>
            {{ $content }}

        </div>

    </body>
</html>
