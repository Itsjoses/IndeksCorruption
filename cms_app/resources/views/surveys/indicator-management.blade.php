@php($number = 1)
@extends('components.layout')
@section('content')
    <div class="top-content mb-8 w-full flex justify-between">
        <div class="flex items-center mb-4">
            <a href={{"/surveys/" . $indicator->dimension->survey->year . "/dimensions/" . $indicator->dimension->id}} class="text-myblack pr-3 fa fa-2xl fa-arrow-left mr-2"></a>
            <div>
                <p>{{"(" . $indicator->dimension->survey->year . ") " . $indicator->dimension->name}}</p>
                <p class="text-3xl font-bold bg-red-100">{{trans("app.Indicator")}}: {{$indicator->name}}</p>
            </div>
        </div>
        <div>
            <button type="submit" class="btn py-2 text-2xl text-black" id="edit-this-indicator"><i class="fa-solid fa-gear"></i></button>
        </div>
        
    </div>

    <div class="mb-8">
        <form action={{$indicator->id . "/questions/"}}  method="post" class="flex">
            @csrf
            <input type="text" name="name" id="" placeholder={{trans("app.Add New Question")}} class="w-full drop-shadow-md px-2 mr-3 border-mygrey-2 focus:border-0">
            <input type="submit" value="{{trans('app.Add')}}" class="py-2 px-4 drop-shadow-md bg-myblue-2 text-white hover:bg-myblue-1 hover:cursor-pointer">
        </form>
    </div>

    <div class="overflow-y-scroll scroll-smooth scrollbar-none h-4/6">
        @if ($indicator->questions->isEmpty())
            <p class="text-mygrey-3 text-center">There's no question in this indicator.</p>
        @else
        <p class="font-bold text-xl">{{trans("app.Questions")}}</p>
            @foreach ($indicator->questions as $question)
                <div class="my-5 drop-shadow-md bg-white p-2">
                    <div class="flex items-center justify-between">
                        <p class="mb-2 font-semibold">{{$number . ". " . __("app." . $question->name)}}</p>
                        <div class="flex">
                            <button class="fa fa-edit py-0 text-red ml-5 mx-1 edit-question-btn" href={{"/questions/" . $question->id}}></button>
                            <form  class="mx-2 delete-form mb-0 " action={{route('questions.destroy', ['survey' => $indicator->dimension->survey->year, 'dimension' =>$indicator->dimension->id, 'indicator' => $indicator->id, 'question' => $question->id])}} method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"><i class="fa fa-trash text-myred-1 hover:text-myred-2"></i></button>
                            </form>
                        </div>
                    </div>
                    <p class="text-sm">Leftmost Paremeter: {{trans("app.". $question->leftmost_parameter)}}</p>
                    <p class="text-sm">Rightmost Paremeter: {{trans("app.". $question->rightmost_parameter)}}</p>
                </div>
                @php($number += 1)                    
            @endforeach
        @endif
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editQuestionButtons = document.querySelectorAll(".edit-question-btn");

        const popupEditQuestion = {
            title: 'Update Question',
            html:
                "<input id='question_name' class='swal2-input' placeholder='Question Name'>" +
                "<input id='leftmost_parameter' class='swal2-input' placeholder='Leftmost Parameter'>" +
                "<input id='rightmost_parameter' class='swal2-input' placeholder='Rightmost Parameter'>",
            confirmButtonText: 'Update',
            confirmButtonColor: '#4EB3D3',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            cancelButtonColor: '#CCCCCC',
            preConfirm: () => {
                const question_name = document.getElementById('question_name').value;
                const leftmost_parameter = document.getElementById('leftmost_parameter').value;
                const rightmost_parameter = document.getElementById('rightmost_parameter').value;

                if(!question_name){
                    Swal.showValidationMessage('Please enter the question name');
                    return;
                }

                return {
                    question_name: question_name,
                    leftmost_parameter, leftmost_parameter,
                    rightmost_parameter: rightmost_parameter
                }
            }
        };

        editQuestionButtons.forEach(button => {
            button.addEventListener("click", event => {
                event.preventDefault();
                popupAction(popupEditQuestion, window.location.href + button.getAttribute('href'), "PUT");
            });
        });

        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => confirmDelete(form));

    });
</script>