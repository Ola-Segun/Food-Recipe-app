<x-webapplayout>

    <x-slot:title>
        G-Upload
    </x-slot>


    <div class="container">

        <div class="py-5 px-5">


            <div class="d-flex" style="justify-content: space-between;">
                <h4>
                    Upload multiple/single image to Gallery
                </h4>
            </div>

            <div class="col-md-6">
                <div class="card">
                    
                    <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>

                    <form action="{{ url('gallery/upload') }}" method="POST" enctype="multipart/form-data"
                        class="dropzone" id="myDragAndDropUploader">
                        @csrf
                    </form>

                    <h5 id="message"></h5>
                </div>
            </div>


        </div>
    
    </div>

</x-webapplayout>