<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/etc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/snackbar.min.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Jaldi" rel="stylesheet">
</head>

<body>
    {!! $ssr !!}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/flatpicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bulma-carousel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/etc.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/entry-client.js') }}" type="text/javascript"></script>
</body>

</html>
<script>

    var prev_id = 0;
    var timouthsdiv = 0;
    var hstimout =2000;
    var signtext = {
        hsdone: '✔',
        hswarning: '❗',
        hserror: '✖',
        hsheart: '❤',
        hssad: '☹'
    };

    function removehs(random_idx, prev_idx, signx, textx) {

        clearTimeout(timouthsdiv);
        document.getElementById(prev_idx).className += " hsdivhide";
        
        prev_id = 0;
        makehs(random_idx, signx, textx);

    }

    function makehs(random_idx, signx, textx) {

        var hsdiv = document.createElement('div');

        var signdiv = document.createElement('span');
        if (signx) {
            // alert(sign);
            signdiv.className = signx;
            signdiv.innerHTML = signtext[signx];
        }
        hsdiv.appendChild(signdiv);

        var hstext = document.createElement('span');
        hstext.className = 'hstext';
        hstext.innerHTML = textx;
        hsdiv.appendChild(hstext);

        hsdiv.id = random_idx;
        hsdiv.className = 'hsdivinit';


        document.getElementsByTagName('body')[0].appendChild(hsdiv);
        var currenths = document.getElementById(random_idx);
        currenths.className += " hsdivshow";
        prev_id = random_idx;
        timouthsdiv = setTimeout(function () {
            currenths.className += " hsdivhide";
            prev_id = 0;
        }, hstimout);

    }

    var  hotsnackbar = function (sign, text) {
        random_id = Math.random();

        if (prev_id) {

            removehs(random_id, prev_id, sign, text);

        } else {

            makehs(random_id, sign, text);
        }
    }

</script>
<script>
// datepicker
flatpickr('.calendar');
</script>