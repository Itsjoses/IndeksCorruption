@extends('components.layout')
@section('content')
    <div class="top-content flex items-center mb-4">
        <a href={{"/surveys/" . $response->survey->year}} class="rounded-full text-black pr-3 fa fa-2xl fa-arrow-left mr-2"></a>
        <p class="text-3xl font-bold">Response Detail</p>
    </div>

    <div class="mb-6 drop-shadow-md bg-white p-4 w-fit">
        <p><b>Response for Survey {{$response->survey->year}}</b></p>
        <p><b>Participant:</b> {{$response->participant->name}}</p>
        <p><b>City:</b> {{$response->city->name}}</p>
        <p><b>Responded at:</b> {{$response->created_at->setTimeZone('Asia/Jakarta')->format("l, F jS, Y H:i:s")}} (GMT+7)</p>
    </div>

    <div class="mb-6 drop-shadow-md bg-white p-4 w-fit">
        <p><b>Corruption Index: {{$response->corruption_index}}</b> </p>
    </div>

    <div class="mb-8 h-full">
        <p class="font-bold mb-2 text-xl">Answers</p>
        <div class="mb-4 flex items-center">
            <form action="" method="get" class="mb-0">
                <select onchange="if (this.value) window.location.href=this.value;" name="" id="" class="inline-flex w-full justify-center gap-x-1.5 drop-shadow-sm hover:cursor-pointer bg-mygrey-0 pl-1 py-2 text-sm font-semibold text-gray-900">
                    <option value={{"/responses/" . $response->id}} {{!isset($dimension) ? "selected" : ""}}>Any Dimension</option>
                    @foreach ($response->survey->dimensions as $dimension_option)
                            <option value={{"/responses/". $response->id . "/dimension/" . $dimension_option->id}} {{isset($dimension) && $dimension_option->id == $dimension->id ? "selected" : ""}}>{{$dimension_option->name}}</option>
                    @endforeach
                </select>
            </form>
            <form action="" method="get" class="ml-8 mb-0">
                <select onchange="if (this.value) window.location.href=this.value;" name="" id="" class="inline-flex w-full justify-center gap-x-1.5 drop-shadow-sm hover:cursor-pointer bg-mygrey-0 pl-1 py-2 text-sm font-semibold text-gray-900">
                    @if (isset($dimension))
                        <option value={{"/responses/" . $response->id . "/dimension/" . $dimension->id}} {{!isset($indicator) ? "selected" : ""}}>Any Indicator</option>
                        @foreach ($dimension->indicators as $indicator_option)
                            <option value={{"/responses/". $response->id . "/indicator/" . $indicator_option->id}} {{isset($indicator) && $indicator_option->id == $indicator->id ? "selected" : ""}} >{{$indicator_option->name}}</option>
                        @endforeach
                    @else
                        <option value={{"/responses/" . $response->id}} {{!isset($dimension) ? "selected" : ""}}>Any Indicator</option>
                    @endif
                </select>
            </form>
            <form action={{"/responses/" . $response->id . (isset($indicator) ? "/indicator/" . $indicator->id : (isset($dimension) ? "/dimension/" . $dimension->id : "")) . "/search"}} class="ml-8">
                <input type="search" name="query" id="" placeholder="Search Question" class="bg-mygrey-0 px-2 py-2 mr-3 focus:border-0">
            </form>
        </div>
        @if ($answers->isEmpty())
            <p class="text-mygrey-3 text-center">There's no answer for the selected dimension or indicator.</p>
        @else

            <div class="overflow-y-scroll scroll-smooth h-3/6">
                @foreach ($answers as $answer)
                    <div class="mb-8">
                        <p class="mb-2"><b>{{$answer->question->indicator->name}}:</b> {{$answer->question->name}}</p>
                        <div class="flex items-center">
                            <p class="mr-2 text-sm">{{$answer->question->leftmost_parameter}}</p>
                            @for ($i = 1; $i < 11; $i++)
                                <div class="rounded-full px-4 py-2 ml-2 mr-2 {{$i == $answer->answer_key ? 'bg-myblue-2 text-white' : 'bg-myblue-0 '}}">
                                    <p>{{$i}}</p>
                                </div>
                            @endfor
                            <p class="ml-2 text-sm">{{$answer->question->rightmost_parameter}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif
    </div>

@endsection
