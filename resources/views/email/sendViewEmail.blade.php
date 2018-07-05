<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway');
        body {
            font-family: 'Raleway', sans-serif;
        }
        .section {
            height: 90vh;
            text-align: center;
        }
        .button {
            display: inline-block;
            background: #4285f4;
            color: #fff;
            text-transform: uppercase;
        }
        a.button {
            text-decoration: none;
        }
        .line-break {
            width: 100%;
        }
        .header {
            width:100%;
            background:#4285f4;
        }
    </style>
</head>
<body style="margin:0;padding:0;">
    <div class="header" style="padding:20px 0;font-size:20px;color:whitesmoke;text-align:center;">
        <header>
            Reservation Information
        </header> 
    </div>

    <div class="section" style="padding-top:250px;padding-bottom:0px;">
        <div style="font-size:45px;margin-bottom:40px;font-weight:bold;  ">
            Welcome {{ $user->name }}
        </div>
        <div class="line-break"></div>
        <div style="font-size:17px;margin-bottom:40px;">
            This is the authentication system. If this is your first visit, be sure to check out the FAQ by clicking the link above.
        </div>
        <div class="line-break"></div>
        <a href="{{route('sendEmailDone',["email" => $user->email, "token" => $user->remember_token])}}" class="button" style="padding: 20px 30px;cursor: pointer;">verify now !!!</a>
    </div>

    <div style="padding:20px 0;font-size:20px;color:whitesmoke;text-align:center;width:100%;background-color:#4285f4;">
        <footer>
            Thank you for using us system , Contact 111-1111 
        </footer>
    </div>
</body>
</html>

