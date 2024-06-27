<nav class="grid z-10 justify-self-center w-screen navbar navbar-expand-lg bg-body-tertiary shadow fixed bg-slate-100">
    <div class="container justify-self-center py-2 items-center grid grid-cols-3">
      <a class="navbar-brand font-bold self-center text-2xl mx-10 w-fit" href="/posts">Posts</a>

      <div class="search  font-semibold">
        <form action="/posts" class="main-form flex-nowrap">
            <input type="text" name="search" id="" class="main-search" placeholder="Search">
            <button type="submit" class="btn">Search</button>
        </form>
      </div>

      <ul class="navbar-nav float-end flex w-full gap-6 justify-around">
        <li class="nav-item">
          <a class="nav-link bg-slate-300 px-4 py-2 rounded-md hover:bg-slate-400 font-medium active" aria-current="page" href="/posts">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link bg-slate-300 px-4 py-2 rounded-md hover:bg-slate-400 font-medium" href="/posts/gallery">Gallery</a>
        </li>
        @if(auth())
        <li class="nav-item">
          <a class="nav-link bg-slate-300 px-4 py-2 rounded-md hover:bg-slate-400 font-medium" href="/posts/{{ auth()->id() }}/myposts">My Posts</a>
        </li>
        @endif
      </ul>
    </div>
</nav>