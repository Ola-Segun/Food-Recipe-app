<x-admin-app-layout>

    <x-slot:title>
        Admin
    </x-slot>

    @section('dynamic-content')
        Manage Page
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

        <section class="actions-table mb-7" style="padding: 0 5%;">
            <div class="flex flex-wrap justify-between gap-5">
                <a href="/posts/admin/posts" class="actions-btn">
                    <svg class=" w-36" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <h2 class=" text-4xl font-bold self-end">Posts</h2>
                </a>

                <a href="/posts/admin/users" class="actions-btn">
                    <svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    <h2 class=" text-4xl font-bold self-end">Users</h2>
                </a>

                <a href="/posts/admin/tags" class="actions-btn">
                    <svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6 6h.008v.008H6V6Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <h2 class=" text-4xl font-bold self-end">Tags</h2>
                </a>

                <a href="/posts/admin/gallery" class="actions-btn">
                    <svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <h2 class=" text-4xl font-bold self-end">Gallery</h2>
                </a>
            </div>
        </section>

        <section class="cards" style="height: 40vh;">
            <div class="tbl-grp">
                <div class=""  style="height: ; width: 100%;">
                    <div class="card-over-none shadow-lg">
                        <div class="card-sep-head w-full">
                            <div class="table-name px-10 py-2 font-bold uppercase flex justify-between content-center">
                                <div class="card-title">
                                    Recent Posts
                                </div>
                                <a href="/posts/admin/posts" class="card-btn bg-slate-300 hover:bg-slate-400 hover:shadow-md px-1 rounded-md">
                                    <svg class="w-6" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                            <table class="table-auto min-w-full">
                                <thead>
                                    <tr class="sm-table-grd-col">
                                        <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >#</th>
                                        <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Title</th>
                                        <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card-over-none overflow-y-scroll shadow-lg rounded-3xl" style="height: 42vh;">
                        <div class="card-sep-head w-full">
                            <table class="table-auto min-w-full">
            
                                <tbody>
                                    @foreach ($Posts as $Post)     
                                    
                                        @php
                                            $words = str_word_count($Post->Post_name, 1);
                                            $subset = array_slice($words, 0, 5);
                                            $shortName = implode(' ', $subset);
                                        @endphp
            
                                        <tr class="sm-table-grd-col">
                                            <td class="py-1 border-b border-r text-sm">#</td>
                                            <td class="py-1 border-b border-r text-sm"><a href="/posts/{{ $Post->id }}/view">{{ $shortName }}...</a></td>
                                            <td class="py-1 border-b border-r text-sm">{{ $Post->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>

                <div class=" grid"  style="height: ;  width: 100%;">
                    <div class="card-over-none shadow-lg">
                        <div class="card-sep-head w-full">
                            <div class="table-name px-10 py-2 font-bold uppercase flex justify-between content-center">
                                <div class="card-title">
                                    New Users
                                </div>
                                <a href="/posts/admin/users" class="card-btn bg-slate-300 hover:bg-slate-400 hover:shadow-md px-1 rounded-md">
                                    <svg class="w-6" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                            <table class="table-auto min-w-full">
                                <thead>
                                    <tr class="sm-table-grd-col" style="">
                                        <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >#</th>
                                        <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Username</th>
                                        <th  scope="col" class=" py-3 bg-gray-100 text-md font-medium text-gray-500 uppercase tracking-wider" >Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card-over-none overflow-y-scroll shadow-lg rounded-3xl" style="height: 42vh;">
                        <div class="card-sep-head w-full">
                            <table class="table-auto min-w-full">
            
                                <tbody>
                                    @foreach ($users as $user)     
            
                                        <tr class="sm-table-grd-col">
                                            <td class="py-1 border-b border-r text-sm">#</td>
                                            <td class="py-1 border-b border-r text-sm">{{ $user->name }}</td>
                                            <td class="py-1 border-b border-r text-sm">{{ $user->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>

            </div>
        </section>




</x-admin-app-layout>