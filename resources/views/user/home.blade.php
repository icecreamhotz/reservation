<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/etc.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Jaldi" rel="stylesheet">
    <style>
        #tab-content .header-columns {
          display: none;
        }
    
        #tab-content .header-columns.is-active {
          display: flex;
        }
    
        .media + .media {
            border: none;
            margin-top: 0;
            padding-top: 0;
        }
    </style>
</head>

<body>
    {!! $ssr !!}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bulma-carousel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/etc.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/entry-client.js') }}" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
<script>
    $(document).ready(function() {
        $('#tabs li').on('click', function() {
            var tab = $(this).data('tab');

            $('#tabs li').removeClass('is-active');
            $(this).addClass('is-active');

            $('#tab-content .header-columns').removeClass('is-active');
            $('.header-columns[data-content="' + tab + '"]').addClass('is-active');
        });
    });
</script>
</html>