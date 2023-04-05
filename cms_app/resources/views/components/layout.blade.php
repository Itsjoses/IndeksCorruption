<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Indonesian Corruption Map - Content Management System</title>
</head>
<body>
    @auth()
        <div class="flex h-screen">
            @include("components.sidebar")
            <div class="w-4/5 p-5 overflow-hidden bg-white overflow-y-scroll scroll-smooth scrollbar-none">
                @yield('content')
            </div>
        </div>
    @endauth
    @guest()
        <div class="h-screen flex items-center ">
            @yield('content')
        </div>
    @endguest
    @if(session("success"))
        <script>
            Toast.fire({
                icon: 'success',
                title: '{{session("success")}}'
            })
        </script>
    @endif
    @if($errors->any())
        <script>
            Toast.fire({
                    icon: 'error',
                    title: '{{$errors->first()}}'
                })
        </script>
    @endif
</body>
</html>