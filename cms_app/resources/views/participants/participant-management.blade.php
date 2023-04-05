@extends('components.layout')
@section('content')
    <div class="top-content mb-8">
        <p class="text-3xl font-bold bg-red-100 mb-4">Participant Management</p>
    </div>

    <div>
        <div class="mb-4 flex items-center">
            <form action="" method="get" class="mb-0">
                <select onchange="if (this.value) window.location.href=this.value;" name="" id="" class="inline-flex w-full justify-center gap-x-1.5 drop-shadow-sm hover:cursor-pointer bg-mygrey-0 pl-1 py-2 text-sm font-semibold text-gray-900">
                    <option value={{"/participants"}} {{!isset($province) ? "selected" : ""}}>Any Province</option> 
                    @foreach (App\Models\Province::all() as $province_option)
                            <option value={{"/participants/province/" . $province_option->id}} {{isset($province) && $province_option->id == $province->id ? "selected" : ""}} >{{$province_option->name}}</option> 
                    @endforeach
                </select>
            </form>
            <form action="" method="get" class="ml-8 mb-0">
                <select onchange="if (this.value) window.location.href=this.value;" name="" id="" class="inline-flex w-full justify-center gap-x-1.5 drop-shadow-sm hover:cursor-pointer bg-mygrey-0 pl-1 py-2 text-sm font-semibold text-gray-900">                        
                    @if (isset($province))
                        <option value={{"/participants/province/" . $province->id}} {{!isset($city) ? "selected" : ""}}>Any City</option> 
                        @foreach ($province->cities as $city_option)
                            <option value={{"/participants/city/" . $city_option->id}} {{isset($city) && $city_option->id == $city->id ? "selected" : ""}} >{{$city_option->name}}</option> 
                        @endforeach
                    @else 
                        <option value="/participants/" {{!isset($province) ? "selected" : ""}}>Any City</option>
                    @endif
                </select>
            </form>
            <form action={{"/participants" . (isset($city) ? "/city/" . $city->id : (isset($province) ? "/province/" . $province->id : "")) . "/search"}} class="flex ml-8 mb-0">
                <input type="search" name="query" id="" placeholder="Search Participant" class="bg-mygrey-0 px-2 py-2 mr-3 focus:border-0">
            </form>
        </div>
        @if ($participants->isEmpty())
                <p class="text-mygrey-3 text-center">There's no participant exists.</p>
            @else
            <p class="font-bold mb-2 text-xl">Participant(s)</p>
            <div class="overflow-hidden drop-shadow-md w-fit px-0">
                <table class="border-collapse bg-white">
                    <thead class="border-collapse bg-myblue-2 text-white text-left">
                        <th class="p-2 border-collapse">Name</th>
                        <th class="p-2 border-collapse">Current Province</th>
                        <th class="p-2 border-collapse">Current City</th>
                        <th class="p-2 border-collapse">Period</th>
                        <th class="p-2 px-4 text-center">Action</th>
                    </thead>
                    <tbody class="rounded-lg">
                        @foreach ($participants as $participant)
                        <tr class="{{$loop->last ? '' : 'border-b-2'}} p-2 border-collapse border-b-mygrey-1 hover:bg-mygrey-0 items-center">
                                <td class=""><a href={{"/participants/" . $participant->id}} class="block p-2">{{$participant->name}}</a></td>
                                <td class=""><a href={{"/participants/" . $participant->id}} class="block p-2">{{$participant->domicile->city->province->name}}</a></td>
                                <td class=""><a href={{"/participants/" . $participant->id}} class="block p-2">{{$participant->domicile->city->name}}</a></td>
                                <td class=""><a href={{"/participants/" . $participant->id}} class="block p-2">{{date("F jS, Y", strtotime($participant->domicile->start_date))}} - {{!empty($participant->domicile->end_date) ? date("F jS, Y", strtotime($participant->domicile->end_date)) : "Now"}}</a></td>
                                {{-- <td class="text-center border-collapse"><a class="fa fa-edit text-red" href={{"/management/indicator/" . $participant->id}}></a></td> --}}
                                <td class="text-center border-collapse">
                                    <form action={{route('participants.destroy', ['participant' => $participant->id])}} method="post" class="delete-form mb-0">
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
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => confirmDelete(form));
    });
</script>