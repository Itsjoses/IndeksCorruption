@extends('components.layout')
@section('content')
    <div class="top-content mb-8 w-full justify-between">
        <div class="flex items-center justify-between w-full">
            <p class="text-3xl text-black font-bold mb-4">{{trans("app.Surveys Management")}}</p>
            <button type="submit" class="btn py-2 text-2xl  text-black" id="survey-setting"><i class="fa-solid fa-gear"></i></button>
            {{-- <form action={{route('surveys.destroy', ['survey' => $survey])}} method="post" id="survey-setting">
                @csrf
                @method('DELETE')

            </form> --}}
        </div>
        
        <div class="flex items-center">
            <p class="font-bold text-black">{{trans("app.Choose")}} {{trans("app.Year")}}: </p>
            <form action="" class="ml-3 mb-0">
                <select onchange="if (this.value) window.location.href=this.value;" name="" id="" class="inline-flex w-full justify-center gap-x-1.5 drop-shadow-sm hover:cursor-pointer rounded-md bg-mygrey-0 pl-1 pr-3 py-2 text-sm font-semibold text-gray-900">
                    @foreach (App\Models\Survey::all() as $year_option)
                        <option value={{"/surveys/" . $year_option->year}} {{$year_option->year == $survey->year ? 'selected' : ''}}>
                            {{$year_option->year}}
                        </option> 
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    <div class="mb-8">
        <form action={{"/surveys/" . $survey->year . "/dimensions/"}} method="post" class="flex">
            @csrf
            <input type="text" name="dimension_name" id="" placeholder="{{trans('app.Add New Dimension')}}" class="w-full drop-shadow-md px-2 mr-3 border-mygrey-2 focus:border-0">
            <input type="submit" value="{{trans('app.Add')}}" class="py-2 px-4 drop-shadow-md bg-myblue-2 text-white hover:bg-myblue-1 hover:cursor-pointer">
        </form>
    </div>
    
    <div class="mb-8">
        <p class="font-bold mb-2 text-xl">{{trans("app.Survey Dimensions")}} </p>
        @if ($survey->dimensions->isEmpty())
            <p class="text-mygrey-3 text-center">There's no dimension in the selected year.</p>
        @else
            <div class="overflow-y-scroll scroll-smooth scrollbar-none h-1/5 drop-shadow-md w-fit px-0">
                <table class="border-collapse bg-white">
                    <thead class="border-collapse bg-myblue-2 text-white text-left">
                        <th class="p-2 border-collapse">{{trans("app.Dimension")}}</th>
                        <th class="p-2 px-8 text-center" colspan="2">{{trans("app.Action")}}</th>
                    </thead>
                    <tbody class="rounded-lg">
                        @foreach ($survey->dimensions as $dimension)
                            <tr class="{{$loop->last ? '' : 'border-b-2'}} p-2 border-collapse border-b-mygrey-1 hover:bg-mygrey-0 items-center">
                                <td class=""><a href={{$survey->year . "/dimensions/" . $dimension->id}} class="block w-full p-2 pr-10">{{$dimension->name}}</a></td>
                                <td class="text-center border-collapse"><button type="submit" class="fa fa-edit text-red edit-dimension-btn" href={{"/dimensions/" . $dimension->id}}></button></td>
                                <td class="text-center border-collapse">
                                    <form action={{route('dimensions.destroy', ['survey' => $survey->year, 'dimension' => $dimension->id])}} method="post" class="delete-form mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"><i class="fa fa-trash text-myred-1 hover:text-myred-2"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <div class="mb-8">
        <p class="font-bold mb-2 text-xl">{{trans("app.Survey Responses")}}</p>
        @if ($survey->responses->isEmpty())
            <p class="text-mygrey-3 text-center">There's no responses for the selected year.</p>
        @else
            <div class="overflow-y-scroll scroll-smooth scrollbar-none h-1/5 drop-shadow-md w-fit px-0">
                <table class="border-collapse bg-white">
                    <thead class="border-collapse bg-myblue-1 text-white text-left">
                        <th class="p-2 border-collapse">{{trans("app.City")}}</th>
                        <th class="p-2 border-collapse">{{trans("app.Participant")}}</th>
                        <th class="p-2 border-collapse">{{trans("app.Response Date")}}</th>
                        <th class="p-2 border-collapse">{{trans("app.Response Time")}}</th>
                        <th class="p-2 px-4 border-collapse text-center">{{trans("app.Action")}}</th>
                    </thead>
                    <tbody class="rounded-lg">
                        @foreach ($survey->responses as $response)
                            <tr class="{{$loop->last ? '' : 'border-b-2'}} p-2 border-collapse border-b-mygrey-1 hover:bg-mygrey-0 items-center">
                                <td class="p-2 pr-10"><a href={{"/responses/" . $response->id}}>{{$response->city->name}}</a></td>
                                <td class="p-2 pr-10"><a href={{"/responses/" . $response->id}}>{{$response->participant->name}}</a></td>
                                <td class="p-2 pr-10"><a href={{"/responses/" . $response->id}}>{{$response->created_at->format("l, F jS, Y")}}</a></td>
                                <td class="p-2 pr-10"><a href={{"/responses/" . $response->id}}>{{$response->created_at->setTimeZone('Asia/Jakarta')->format("H:i:s")}} (GMT+7)</a></td>
                                <td class="text-center border-collapse">
                                    <form action={{route('responses.destroy', ["response" => $response->id])}} method="post" class="delete-form mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"><i class="fa fa-trash text-myred-1 hover:text-myred-2"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <div class="mb-8">
        <p class="font-bold text-xl">{{trans("app.Survey Questions")}}</p>
        @if ($survey->responses->isEmpty())
            <p class="text-mygrey-3 text-center">There's no questions for the selected year.</p>
        @else
            <div class="overflow-y-scroll scroll-smooth scrollbar-none h-3/5 drop-shadow-md w-fit px-0">
                @php($number = 1)
                @foreach($survey->dimensions as $dimension)
                    @foreach ($dimension->questions as $question)
                        <div class="my-5 drop-shadow-md bg-white p-2">
                            <div class="flex items-center justify-between">
                                <p class="mb-2 font-semibold">{{$number . ". " . trans("app.".$question->name)}}</p>
                                <div class="flex">
                                    {{-- <button class="fa fa-edit py-0 text-red ml-5 mx-1 edit-question-btn" href={{"/questions/" . $question->id}}></button>
                                    <form  class="mx-2 delete-form mb-0 " action={{route('questions.destroy', ['survey' => $indicator->dimension->survey->year, 'dimension' =>$indicator->dimension->id, 'indicator' => $indicator->id, 'question' => $question->id])}} method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"><i class="fa fa-trash text-myred-1 hover:text-myred-2"></i></button>
                                    </form> --}}
                                </div>
                            </div>
                            <p class="text-sm">Leftmost Paremeter: {{trans("app.".$question->leftmost_parameter)}}</p>
                            <p class="text-sm">Rightmost Paremeter: {{trans("app.".$question->rightmost_parameter)}}</p>
                        </div>
                        @php($number += 1)  
                    @endforeach         
                @endforeach
            </div>
        @endif
    </div>

    <div class="absolute bottom-0 rounded-lg right-0 mr-6">
        <form action="/surveys" method="post" id="add-survey">
            @csrf
            <button type="submit" class="btn drop-shadow-md text-white bg-myblue-2 p-2 mb-2 hover:bg-myblue-1 hover:cursor-pointer">
                + {{trans('app.New Survey')}}
            </button>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const addSurvey = document.getElementById("add-survey");
        const popupCreateSurvey = {
            title: 'Create Survey Year',
            html:
                "<input name='year' type='number' class='swal2-input' placeholder='Survey Year'>" +
                "</br>" +
                "<label><input type='radio' name='opt' value='new' checked>Start from Scratch</label>" +
                "</br>" +
                "<label><input type='radio' name='opt' value='duplicate'>Duplicate Latest Survey</label>",
            showConfirmButton: true,
            confirmButtonText: 'Create Survey',
            confirmButtonColor: '#4EB3D3',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            cancelButtonColor: '#CCCCCC',
            preConfirm: () => {
                const year = document.getElementsByName("year")[0].value;
                const radios = document.querySelectorAll("input[name='opt']");
                let selected;
                for(const radio of radios){
                    if(radio.checked){
                        selected = radio.value;
                        break;
                    }
                }
                if (!year) {
                    Swal.showValidationMessage('Please enter the year');
                    return;
                } else if(year < 2000) {
                    Swal.showValidationMessage('Year must be later than 2000');
                    return;
                }
                return {year: year, selected: selected}
            }
        }

        addSurvey.addEventListener("submit", event => {
            event.preventDefault();
            popupAction(popupCreateSurvey, "/surveys", "POST");
        });

        const editDimensionButtons = document.querySelectorAll(".edit-dimension-btn");
        
        const popupEditDimension = {
            title: 'Update Dimension',
            input: 'text',
            inputPlaceholder: "Dimension Name",
            inputAttributes: {
                name: 'popup_dimension_name',
            },
            showConfirmButton: true,
            confirmButtonText: 'Update',
            confirmButtonColor: '#4EB3D3',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            cancelButtonColor: '#CCCCCC',
            preConfirm: () => {
                const name = document.getElementsByName("popup_dimension_name")[0].value;
                if (!name) {
                    Swal.showValidationMessage('Please enter the dimension name');
                    return;
                }
            }
        };

        editDimensionButtons.forEach(button => {
            button.addEventListener("click", event => {
                event.preventDefault();
                popupAction(popupEditDimension, window.location.href + button.getAttribute('href'), "PUT");
            });
        });

        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => confirmDelete(form));
    });
</script>