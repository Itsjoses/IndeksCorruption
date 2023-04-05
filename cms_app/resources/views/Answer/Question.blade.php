<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/Question.css') }}">
</head>
<body>
<div class="Container">
    <div class="Semi-Container">
        <form action="{{route('answerSubmit')}}" method="POST">
            @csrf
            @foreach($questions as $data)
                <div class="Form">
                    <div class="InsertTitle">
                        <p>{{$loop->index + 1}}. {{$data->name}} ?</p>
                    </div>
                    <div class="InsertForm">
                        @for ($i = 1; $i < 11; $i++)
                            <div class="InsertFrom-Inner">
                                <input type="radio" name="Answer[{{$loop->index+1}}]" value="{{$i}}">
                                <p>{{$i}}</p>
                            </div>

                        @endfor
                    </div>
                </div>
            @endforeach
            {{--    @csrf--}}
            {{--    <input type="number" name="pertanyaan1">--}}
            {{--    <input type="number" name="pertanyaan2">--}}
            {{--    <input type="number" name="pertanyaan3">--}}
            {{--    <input type="number" name="pertanyaan4">--}}
            {{--    <input type="number" name="pertanyaan5">--}}
            <div class="button"><button type="submit" class="buttonInput">Submit</button></div>
        </form>
    </div>

</div>




</body>
</html>
