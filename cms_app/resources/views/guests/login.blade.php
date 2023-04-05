@extends('components.layout')
@section('content')
    <div class="w-full h-full bg-myblue-3 flex items-center">
        <div class="w-2/3 flex mx-auto my-auto">
            <div class=" w-1/2 mt-10 mb-4 px-2 py-auto  text-white h-auto min-h-0">
                <p class="text-3xl text-center font-semibold">{{trans("app.Indonesian Corruption Map")}}</p>
                <p class="text-3xl text-center">{{trans("app.Content Management System")}}</p>
                <p class="text-justify mt-4 mx-5 my-0 ">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus repellat placeat id voluptates debitis facere ipsam fugit? Voluptate suscipit laboriosam id voluptatem praesentium qui, expedita quod necessitatibus eaque, facere perspiciatis?</p>
            </div>
            <div class="bg-myblue-1 w-1/2 rounded-lg px-5 py-3">
                <form action="/login" method="post">
                    @csrf
                    <p class="text-3xl mt-3 mb-4 text-center text-white font-semibold">{{trans("app.Let's Head Inside")}}</p>
                    <div class="input-container w-full mb-5">
                        <input type="text" name="username" id="username" value="{{old('username')}}" placeholder='{{trans("app.Username")}}' class="w-full px-2 py-2 rounded-lg focus:border-transparent focus:outline-none">
                    </div>
            
                    <div class="input-container w-full mb-5">
                        <input type="password" name="password" id="password" placeholder='{{trans("app.Password")}}' class="w-full px-2 py-2 rounded-lg focus:border-transparent focus:outline-none">
                    </div>
            
                    <div class="input-container w-full mb-5">
                        <input type="submit" id="" value={{trans("app.Sign In")}} class="w-full px-2 py-2 rounded-lg text-white focus:border-transparent focus:outline-none bg-myblue-2 hover:bg-myblue-3 hover:cursor-pointer">
                    </div>
            
                    <div>
                        <a href="/register" class="text-white hover:font-bold">{{trans("app.Register")}} {{trans("app.as")}} Admin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
