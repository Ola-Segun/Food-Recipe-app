<x-webapplayout>

    <x-slot:title>
        Home
    </x-slot>


    <div class="container">

    <div class="py-5 px-5">

        @if (session('statuses'))
            @foreach (session('statuses') as $status)
                <div class="container alert alert-dismissible fade show alert-{{ $status['type'] }}" role="alert">
                    {{ $status['message'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
    

        {{-- Label Component Extenstion example --}}
        <x-forms.label value='My label' />

        {{-- Label Component Extenstion example --}}
        <x-forms.label>
            Testing Slots
        </x-forms.label>

        <div class="d-flex justify-content-between">
            <h1>
                Welcome
            </h1>

            <h3>
                <a href="{{ url('/recipes/create')}}" class="btn btn-primary">Add Recipe</a>
            </h3>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
            {{-- Loop Through all Recipes --}}
            @foreach ($recipes as $recipe)
    
                <div class="py-2 col">
                    
                    <img src="{{ asset($recipe->recipe_image) }}" style="width: 100px;" alt="">
                    <a href="/recipes/{{ $recipe->id }}"><h2>{{$recipe->recipe_name}}</h2></a>
                    <p>{{ $recipe->description }}</p>  
    
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
                    
                    {{-- <div class="d-flex justify-content-around">
                        <div class="">
                            <strong>Ingredients</strong>
                            <br>
                            <hr>
    
                            @foreach ($ingredients as $ingredient)
                            <p>{{ $ingredient }}</p>            
                            @endforeach
                        </div>
    
                        <div class="">
                            <strong>Tools / Equipments</strong>
                            <br>
                            <hr>
    
                            @foreach ($tools as $tool)
                            <p>{{ $tool }}</p>            
                            @endforeach
                        </div>
                    </div> --}}
                </div>
    
    
            @endforeach
        </div>
    </div>

    <div class="mt6 p4" style="width: 200px; height: 50px;">

        {{ $recipes->links() }}
    
    </div>

    </div>

<x-slot:scripts>

</x-slot:scripts>

</x-webapplayout>