<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

        body{
            margin-left: 100px;
            margin-right: 100px;
        }

        .title{
            text-align: center;
            font-weight: bold;
        }

        .name{
            font-weight: bold;
        }

        button{
            padding: 10px;
            background-color: rgb(45, 126, 219);
            border-radius: 5px;
            border: 0;
        }

        button a {
            text-decoration: none;
            color: white;
           
        }

        .footer{
            text-align: center;
            font-weight: lighter;
            color: lightgray;
        }
    </style>
</head>
<body>
    <h2 class="title">Welcome to Insta app!</h2>
    <hr>
    <p class="name">Hi {{$name}}.</p>
    <p>Thank you for signning up to Insta app. We're excited to have you on board.</p>
    <p>To get started, please confirm your email address by clicking the button below: </p>
    <br>
    <button><a href="{{$app_url}}">Confirm Email Address</a></button>
    <br>
    <p>Best Regards</p>
    <p>Kredo Team</p>
    <br>
     if you do not sign up for this account, you can ignore this email.
    <hr>
    <p class="footer">&copy;Kredo Insta App. All right reserved</p>
</body>
</html>