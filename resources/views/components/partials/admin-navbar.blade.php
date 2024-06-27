<nav class=" bg-slate-200 h-20 flex justify-center shadow-md mb-5">
    <div class="container grid items-center" style="grid-template-columns: 1fr 1.5fr 1fr">
        <div class="logo flex justify-center font-semibold text-md">
            <h2 class=" text-nowrap sm:text-xl " >Admin Dashboard</h2>
        </div>

        <div class="search  font-semibold">
            <form action="" class="main-form flex-nowrap">
                <input type="text" name="main-search" id="" class="main-search" placeholder="Search Anything...">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>

        <div class="buttons">
            <div class="flex justify-between">
                <a href="{{ url('/posts')}}" class="ad-nav-btn justify-center flex items-center gap-2 px-3 text-slate-800 font-semibold bg-slate-300 p-1 rounded-md hover:shadow-md transition-all hover:bg-slate-400">
                    <span>
                        <svg class=" w-11" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    View
                </a>

                <a href="#" class="ad-nav-btn justify-center flex items-center gap-2 px-3 text-slate-800 font-semibold bg-slate-300 p-1 rounded-md hover:shadow-md transition-all hover:bg-slate-400">
                    <span>
                        <svg  class=" w-11" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                    </span>
                    Profile
                </a>

                <a href="#" class="ad-nav-btn justify-center flex items-center gap-2 px-3 text-slate-800 font-semibold bg-slate-300 p-1 rounded-md hover:shadow-md transition-all hover:bg-slate-400">
                    <span>
                        <svg class=" w-11" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    More
                </a>

            </div>
        </div>
    </div>
</nav>