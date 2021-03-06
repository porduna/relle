<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/btn.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/jasny-bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/switch.css') }}" rel="stylesheet">
        <link href="{{ asset('/exp_data/flab/exp_style.css') }}" rel="stylesheet">
        <link href="{{ asset('/exp_data/flab/tabs.css') }}" rel="stylesheet">


        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/favicon.png')}}"/> 

        <style>
            .navbar{
                background:white;
                border-bottom: 15px solid white;
                border-top:0;
            }
        </style>


        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
        <script src="{{ asset('/js/jasny-bootstrap.js') }}"></script>
        <script src="{{ asset('/js/switch.js') }}"></script>
        <script src="{{ asset('/exp_data/flab/exp_script.js') }}"></script>
    </head>


    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <body>
        <?php include(asset('exp_data/flab/pt.html')); ?>
    </body>

