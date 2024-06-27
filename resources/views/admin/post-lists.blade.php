<x-admin-app-layout>

    <x-slot:title>
        Posts
    </x-slot>

    @section('dynamic-content')
        <div class="">
            <span class="underline"><a href="{{ url('posts/admin') }}">Home</a></span>/
            <span class="underline"><a href="{{ url('posts/admin/posts') }}">Posts Lists</a></span>

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
                        <tr class="grid" style="grid-template-columns: .3fr 2fr 1fr 1fr .6fr">
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >#</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Title</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Tags</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Date</th>
                            <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-over-none overflow-y-scroll shadow-lg rounded-3xl" style="height: 65vh;">
            <div class="card-sep-head w-full">
                <table class="table-auto min-w-full">
                    <thead>
                        <tr class="" style="grid-template-columns: .5fr 2fr 1fr 1fr 1fr">
                            <th class="" ></th>
                            <th class="" ></th>
                            <th class="" ></th>
                            <th class="" ></th>
                            <th class="" ></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($Posts as $Post)     
                        
                            @php
                                $words = str_word_count($Post->Post_name, 1);
                                $subset = array_slice($words, 0, 4);
                                $shortName = implode(' ', $subset);
                            @endphp

                            <tr class="grid" style="grid-template-columns: .3fr 2fr 1fr 1fr .6fr">
                                <td class="py-1 border-b border-r text-sm">#</td>
                                <td class="py-1 border-b border-r text-sm">{{ $shortName }}</td>
                                <td class="py-1 border-b border-r text-sm font-semibold"><small>{{ $Post->tags }}</small></td>
                                <td class="py-1 border-b border-r text-sm">{{ $Post->created_at }}</td>
                                <td class="py-1 border-b border-r text-sm flex justify-evenly">
                                    <div class="btn-sm bg-green-400">
                                        <a href="/posts/{{ $Post->id }}/view">View</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>   
    
    </div>

</x-admin-app-layout>