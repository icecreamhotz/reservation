<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>veryifyWarning</title>
</head>
<body>
    <p>
        @if(!empty($verified))
            {{ $verified }}
        @else
            User not found !!!
        @endif
    </p>
    <h3 id="redirectTime" style="display:inline;">Redirect to homepage in 5 seconds</h3>
    <h3 id="redirectTime" style="display:inline;">or <a href="/">go now</a></h3>
</body>
<script>
    var timeleft = 5;
    var redirectTimer = setInterval(function(){
        document.getElementById("redirectTime").innerHTML =  "Redirect to homepage in " + timeleft-- + " seconds" ;
        if(timeleft < 0 ) {
            clearInterval(redirectTimer);
        } 
    }, 1000);
    setTimeout(function() {
        window.location.replace('/');
    }, 5000);
</script>
</html>