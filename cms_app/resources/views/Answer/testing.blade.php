<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <p>indikator</p>
    @for($i = 0;$i<10;$i++)
        <p>{{$showindikator[$i]->name}} {{$indikators[$i]}}</p>
    @endfor
    <br>

    <p>dimesion</p>
    @for($i = 0;$i<5;$i++)
        <p>{{$showdimension[$i]->name}} {{$dimensions[$i]}}</p>
    @endfor
    <br>
    <p>Result: {{$result}}</p>
</body>
</html>
