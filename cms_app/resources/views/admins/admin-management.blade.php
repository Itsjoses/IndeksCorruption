@extends('components.layout')
@section('content')
    <div class="top-content mb-8">
        <p class="text-3xl font-bold bg-red-100 mb-4">Admin Management</p>
    </div>
    <div class="mb-4">
        <form action={{"/admins/search"}} class="flex mb-0">
            <input type="search" name="query" id="" placeholder="Search Admin" class="bg-mygrey-0 px-2 py-2 mr-3 focus:border-0">
        </form>
    </div>

    <div class="mb-8">
        <p class="font-bold mb-2 text-xl">Admins</p>
        @if ($admins->isEmpty())
            <p class="text-mygrey-3 text-center">There's no dimension in the selected year.</p>
        @else
        <div class="overflow-hidden drop-shadow-md w-fit px-0">
            <table class="border-collapse bg-white">
                <thead class="border-collapse bg-myellow-1 text-white text-left">
                    <th class="p-2 border-collapse ">Username</th>
                    <th class="p-2 border-collapse ">Name</th>
                    <th class="p-2 border-collapse ">Email</th>
                    <th class="p-2 px-4 border-collapse text-center">Access</th>
                    <th class="p-2 px-4 text-center" colspan="2">Action</th>
                </thead>
                <tbody class="rounded-lg">
                    @foreach ($admins as $admin)
                        <tr class="p-2 {{$loop->last ? '' : 'border-b-2'}} border-collapse border-b-mygrey-1 hover:bg-mygrey-0 items-center">
                            <td class="p-2 pr-10">{{$admin->username}}</td>
                            <td class="p-2 pr-10">{{$admin->name}}</td>
                            <td class="p-2 pr-10">{{$admin->email}}</td>
                            <td class="text-center">{{$admin->is_accepted ? "Accepted" : "Pending"}}</td>
                            @if (!$admin->is_accepted)
                                <td class="text-center border-collapse">
                                    <form action={{"/admins/accept/" . $admin->id}} method="put" class="accept-admin-form mb-0">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit">
                                            <i class="fa fa-check text-green"></i>
                                        </button>
                                    </form>
                                    
                                </td> 
                                <td class="text-center border-collapse">
                                    <form action={{route('admins.destroy', ['admin' => $admin->id])}} method="post" class="delete-form mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">
                                            <i class="fa fa-xmark text-center text-myred-1 hover:text-myred-2"></i>
                                        </button>
                                    </form>
                                </td>                                
                            @else
                                <td class="text-center border-collapse">
                                    <button type="submit" class="edit-admin-btn"  href={{"/admins/" . $admin->id}}>
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td> 
                                <td class="text-center border-collapse">
                                    <form action={{route('admins.destroy', ['admin' => $admin->id])}} method="post" class="delete-form mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"><i class="fa fa-trash text-center text-myred-1 hover:text-myred-2"></i></button>
                                    </form>
                                </td>
                            @endif
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => confirmDelete(form));

        popupAcceptConfirmation = {
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            iconColor: '#4EB3D3',
            showCancelButton: true,
            confirmButtonColor: '#70c93e',
            cancelButtonColor: '#CCCCCC',
            confirmButtonText: 'Accept'
        }

        const acceptAdminForms = document.querySelectorAll(".accept-admin-form");

        acceptAdminForms.forEach(form => {
            form.addEventListener('submit', event => {
                event.preventDefault();
                Swal.fire(popupAcceptConfirmation).then(result => {
                    if (result.isConfirmed) form.submit()
                });
            });
        })

    });

</script>