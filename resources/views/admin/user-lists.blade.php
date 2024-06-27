<x-admin-app-layout>

    <x-slot:title>
        Users
    </x-slot>

    @section('dynamic-content')
        <div class="">
            <span class="underline"><a href="{{ url('posts/admin') }}">Home</a></span>/
            <span class="underline"><a href="{{ url('posts/admin/posts') }}">Users Lists</a></span>

        </div>
        
    @endsection

    <style>
        .card-over-none::-webkit-scrollbar{
            width: 7px;
            background-color:;
            padding: 0 3px;
        }
        .card-over-none::-webkit-scrollbar-thumb{
            width: 5px;
            background-color: rgb(135, 139, 142);
            border-radius: 10px;
        }
        .card-over-none::-webkit-scrollbar-corner{
            background-color: chartreuse
        }
    </style>

    <div class="cover" style="padding: 0 5%;">
    
        <div class="card-over-none shadow-lg">
            <div class="card-sep-head w-full">
                <table class="table-auto min-w-full">
                    <thead>
                        <tr class="users-table-grd-col">
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >#</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Names</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Emails</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Contrib</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Roles</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Date Joined</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-over-none overflow-y-scroll shadow-lg rounded-3xl" style="height: 68vh;">
            <div class="card-sep-head w-full">
                <table class="table-auto min-w-full select-none">
                    <tbody>

                        @foreach ($users as $user)
                            
                            <tr class="users-table-grd-col">
                                <td class="py-1 border-b border-r">{{ $user->id }}</td>
                                <td class="py-1 border-b border-r">{{ $user->name }}</td>
                                <td class="py-1 border-b border-r">{{ $user->email }}</td>
                                <td class="py-1 border-b border-r">
                                    @if ($user->contribs > 1)
                                        {{ $user->contribs }} Posts
                                    @else
                                        {{ $user->contribs }} Post
                                    @endif
                                </td>
                                <td class="py-1 border-b border-r">
                                    @if ( $user->role == 'admin')
                                        <small class=" px-2 py-1 bg-red-500 mx-2 rounded-md select-none text-white text-center italic">
                                            {{ $user->role }}
                                        </small>
                                    @else
                                        <small class=" px-2 py-1 bg-blue-500 mx-2 rounded-md select-none text-white text-center">
                                            {{ $user->role }}
                                        </small>
                                    @endif
                                </td>
                                <td class="py-1 border-b border-r">{{ $user->created_at }}</td>
                                <td class="py-1 border-b border-r">btn</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>   
    
    </div>

</x-admin-app-layout>