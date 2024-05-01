<x-webapplayout>

    <div class="container py-5">

        <x-slot:title>
            Show
        </x-slot>

        @if (session('statuses'))
            @foreach (session('statuses') as $status)
                <div class="container alert alert-dismissible fade show alert-{{ $status['type'] }}" role="alert">
                    {{ $status['message'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
    <div class="d-flex align-items-center justify-content-between">
        <h2>{{$recipe->recipe_name}}</h2>
        <div class="d-flex">
            <a href="{{ url('/recipes/'.$recipe->id.'/upload') }}" class="btn btn-info">Add / Upload Images</a>
        </div>
    </div>
    <p>{{ $recipe->description }}</p>  
    <p>{{ $recipe->small_details }}</p>  
    <div class="d-flex gap-4 m-2">
        <em>{{ $recipe->small_details }}</em>  
        <strong><em>"{{ $recipe->avg_cooking_time }}"</em></strong>    
    </div>
    
    {{-- Get all `ingredients` and separate them --}}
    @php
        $ingredients = explode(',', $recipe->ingredients);
    @endphp
    
    {{-- Get all `tools` and separate them --}}
    @php
        $tools = explode(',', $recipe->tools_needed);
    @endphp
    
    <div class="d-flex justify-content-around">
        <div class="">
            {{-- Heading --}}
            <strong>Ingredients</strong>
            <br>
            <hr>
    
            {{-- Get each item --}}
            @foreach ($ingredients as $ingredient)
            <p>{{ $ingredient }}</p>            
            @endforeach
        </div>
    
        <div class="">
            {{-- Heading --}}
            <strong>Tools / Equipments</strong>
            <br>
            <hr>
    
            {{-- Get each item --}}
            @foreach ($tools as $tool)
            <p>{{ $tool }}</p>            
            @endforeach
        </div>
    </div>
    
    {{-- Get all `procedures` and separate them --}}
    @php
        $procedures = explode(',', $recipe->procedures);
    @endphp

    <strong>Procedures</strong>
    <br>
    <hr>
    <ul>
        @foreach ($procedures as $procedure)
            <li>{{ $procedure }}</li>
        @endforeach
    </ul>
    </div>

    <a href="{{ url('recipes/'.$recipe->id.'/edit') }}" class=" btn btn-success">
        Edit
    </a>

    <a href="{{ url('recipes/'.$recipe->id.'/delete') }}" onclick="return confirm('Are You Sure? ')" class=" btn btn-danger">
        Delete
    </a>


</x-webapplayout>

