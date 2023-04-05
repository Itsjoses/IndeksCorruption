@extends('components.layout')
@section('content')
    <div class="top-content flex items-center mb-8">
        <a href="/participants/" class="text-black pr-3 fa fa-2xl fa-arrow-left mr-2 mb-0"></a>
        <p class="text-3xl font-bold">Participant Detail</p>
    </div>

    <div class="mb-6 w-fit drop-shadow-md bg-white p-4">
        <p><b>Name:</b> {{$participant->name}}</p>
        <p><b>Current Domicile:</b> {{$participant->domicile->city->name}}, {{$participant->domicile->city->province->name}}</p>
    </div>

    <div class="mb-8">
        @if ($participant->domiciles->isEmpty())
            <p class="text-mygrey-3 text-center">There's no domicile for this participant.</p>
        @else
            <p class="font-bold mb-1 text-xl">Domicilies History</p>
            <div class="overflow-hidden drop-shadow-md w-fit px-0">
                <table class="border-collapse bg-white">
                    <thead class="rounded-lg border-collapse bg-myblue-2 text-white text-left">
                        <th class="p-2 border-collapse">Period</th>
                        <th class="p-2 border-collapse">City</th>
                    </thead>
                    <tbody class="rounded-lg">
                        @foreach ($participant->domiciles()->orderByDesc('start_date')->get() as $domicile)
                        <tr class="{{$loop->last ? '' : 'border-b-2'}} p-2 border-collapse border-b-mygrey-1 hover:bg-mygrey-0 items-center">
                                <td class="p-2">{{date("F jS, Y", strtotime($domicile->start_date))}} - {{$domicile->end_date ? date("F jS, Y", strtotime($domicile->end_date)) : "Now"}}</td>
                                <td class="p-2">{{$domicile->city->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        @endif
    </div>

    <div class="w-1/2">
        @if ($participant->responses->isEmpty())
            <p class="text-mygrey-3 text-center">There's no survey responded by participant.</p>
        @else
            <p class="font-bold mb-1 text-xl">Responses History</p>
            <div class="overflow-hidden drop-shadow-md w-fit px-0">
                <table class="border-collapse bg-white">
                    <thead class="rounded-lg border-collapse bg-myblue-1 text-white text-left">
                        <th class="p-2 border-collapse">Response Date</th>
                        <th class="p-2 border-collapse">Response City</th>
                        {{-- <th class="p-2 border-collapse text-center">Action</th> --}}
                    </thead>
                    <tbody class="rounded-lg">
                        @foreach ($participant->responses as $response)
                        <tr class="{{$loop->last ? '' : 'border-b-2'}} p-2 border-collapse border-b-mygrey-1 hover:bg-mygrey-0  items-center">
                                <td class="p-2"><a href={{"/responses/" . $response->id}}>{{date("F jS, Y", strtotime($response->created_at))}}</a></td>
                                <td class="p-2"><a href={{"/responses/" . $response->id}}>{{$response->city->name}}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        @endif
    </div>

@endsection