@extends('components.layout')
@section('content')
<div class="top-content mb-8 w-full flex justify-between">
    <div class="flex items-center mb-4">
        <a href={{"/surveys/" . $dimension->survey->year}} class=" text-black pr-3 fa fa-2xl fa-arrow-left mr-2"></a>
        <p class="text-3xl font-bold">Dimension ({{$dimension->survey->year}}): {{$dimension->name}} </p>
    </div>
    
    <form action={{route('dimensions.destroy', ['survey' => $dimension->survey->year, 'dimension' => $dimension->id])}} method="post" class="delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn py-2 text-2xl text-black"><i class="fa-solid fa-gear"></i></button>
    </form>
</div>

<div class="mb-8">
    <form action={{$dimension->id . "/indicators/"}} method="post" class="flex">
        @csrf
        <input type="text" name="name" id="" placeholder={{trans("app.Add New Indicator")}} class="w-full drop-shadow-md px-2 mr-3 border-mygrey-2 focus:border-0">
        <input type="submit" value="Add" class="py-2 px-4 drop-shadow-md bg-myblue-2 text-white hover:bg-myblue-1 hover:cursor-pointer">
    </form>
</div>


<div>
    @if ($dimension->indicators->isEmpty())
        <p class="text-mygrey-3 text-center">There's no indicator in this dimension.</p>
    @else
        <p class="font-bold mb-2 text-xl">Indicator(s)</p>
        <div class="overflow-hidden drop-shadow-md w-fit px-0">
            <table class="border-collapse bg-white">
                <thead class="border-collapse bg-myblue-2 text-white text-left">
                    <th class="p-2 border-collapse ">{{trans("app.Indicator")}}</th>
                    <th class="p-2 px-8 text-center" colspan="2">{{trans("app.Action")}}</th>
                </thead>
                <tbody class="rounded-lg">
                    @foreach ($dimension->indicators as $indicator)
                    <tr class="{{$loop->last ? '' : 'border-b-2'}} p-2 border-collapse border-b-mygrey-1 hover:bg-mygrey-0 items-center">
                            <td class="w-full"><a href={{$dimension->id . "/indicators/" . $indicator->id}} class="block w-full p-2 pr-10">{{$indicator->name}}</a></td>
                            <td class="text-center border-collapse">
                                <button name="indicator_update" type="submit" class="fa fa-edit text-red edit-indicator-btn" href={{"/indicators/" . $indicator->id}}></button>
                            </td>
                            <td class="text-center border-collapse">
                                <form action={{route('indicators.destroy', ['survey' => $dimension->survey->year, 'dimension' => $dimension->id, 'indicator' => $indicator->id])}} method="post" class="delete-form mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"><i class="fa fa-trash text-myred-1 hover:text-myred-2"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    @endif
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const editIndicatorButtons = document.querySelectorAll(".edit-indicator-btn");

        const popupEditIndicator = {
            title: 'Update Indicator',
            input: 'text',
            inputPlaceholder: "Indicator Name",
            inputAttributes: {
                name: 'popup_indicator_name',
            },
            showConfirmButton: true,
            confirmButtonText: 'Update',
            confirmButtonColor: '#4EB3D3',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            cancelButtonColor: '#CCCCCC',
            preConfirm: () => {
                const name = document.getElementsByName("popup_indicator_name")[0].value;
                if (!name) {
                    Swal.showValidationMessage('Please enter the indicator name');
                    return;
                }
            }
        };

        editIndicatorButtons.forEach(button => {
            button.addEventListener("click", event => {
                event.preventDefault();
                popupAction(popupEditIndicator, window.location.href + button.getAttribute('href'), "PUT");
            });
        });
        
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => confirmDelete(form));
    });

</script>