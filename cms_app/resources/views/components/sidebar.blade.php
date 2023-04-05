<div class=" bg-myblue-3 w-1/5 py-5 relative text-white text-justify">
    <div class="top-sidebar">
        <a href="/">
            <p class="text-lg font-bold px-4 text-left">{{trans("app.Indonesian Corruption Map")}}</p>
            <p class="text-lg px-4 text-left"><i>{{trans("app.Content Management System")}}</i></p>
        </a>
    </div>
    <div class="mid-sidebar mt-5">
        <p class="px-5 my-2">{{__("app.Welcome")}}, <b>{{Auth::user()->name}}</b></p>
        <a href={{"/languagechange"}} class="px-5 my-2 text-sm">{{trans("app.Click to Change Language")}}</a>
        <a class="px-5 py-3 w-full block mt-5 hover:bg-myblue-0 hover:text-myblue-2 {{request()->is('participants') || request()->is('participants/*') ? 'bg-myblue-2' : ''}}" href="/participants"><i class="fa-solid fa-user mr-3"></i>{{trans("app.Participants Management")}}</a>
        <a class="px-5 py-3 w-full block hover:bg-myblue-0 hover:text-myblue-2 {{request()->is('surveys/*') || request()->is('responses/*')  ? 'bg-myblue-2' : ''}} "  href={{"/surveys/" . Carbon\Carbon::now()->year}}><i class="fa-solid fa-square-poll-vertical mr-3"></i>{{trans("app.Surveys Management")}}</a>
        @auth
            @if (Auth::user()->role_id == 1)
                <a class="px-5 py-3 w-full block hover:bg-myblue-0 hover:text-myblue-2 {{request()->is('admins') || request()->is('admins/*') ? 'bg-myellow-1' : ''}} "  href={{"/admins/"}}><i class="fa-solid fa-lock mr-3"></i>{{trans("app.Admin Management")}}</a>            
            @endif
        @endauth
    </div>
    <div class="bottom-sidebar">
        <a href="/logout" class="w-full px-5 py-3 absolute bottom-0 hover:bg-myblue-0 hover:text-myblue-2"><i class="fa-solid fa-right-from-bracket mr-3"></i>{{trans("app.Logout")}}</a>
    </div>
</div>