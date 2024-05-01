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

            <div class="col-md-12">
                <div class="card p-3" style="width: 100%;height: 70vh;">
                    
                    <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>
                    
                    <form 
                        action="{{ url('recipes/gallery/upload') }}" 
                        method="POST" 
                        enctype="multipart/form-data" 
                        class="dropzone" 
                        id="myDragAndDropUploader">
                        @csrf
                    </form>
                        {{-- <input type="file" name="upload_to_gallery" id="" class="form-control"> --}}

                    <h5 id="message"></h5>
                </div>
            </div>


        </div>
    
    </div>

    <x-slot:script>
    
    <script type="text/javascript">

        var maxFilesizeVal = 12; //MB
        var maxFilesVal = 10;
    
        // Note that the name "myDragAndDropUploader" is the camelized id of the form.
        Dropzone.options.myDragAndDropUploader = {
    
            paramName:"file",
            maxFilesize: maxFilesizeVal, // MB
            maxFiles: maxFilesVal,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: false,
            timeout: 60000,
            dictDefaultMessage: "Drop your files here or click to upload",
            dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
            dictFileTooBig: "File is too big. Max filesize: "+maxFilesizeVal+"MB.",
            dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.",
            dictMaxFilesExceeded: "You can only upload up to "+maxFilesVal+" files.",
            maxfilesexceeded: function(file) {
                this.removeFile(file);
                // this.removeAllFiles(); 
            },
            sending: function (file, xhr, formData) {
                $('#message').text('Image Uploading...');
            },
            success: function (file, response) {
                $('#message').text(response.success);
                console.log(response.success);
                console.log(response);
            },
            error: function (file, response) {
                $('#message').text('Something Went Wrong! '+response);
                console.log(response);
                return false;
            }
        };
    </script>

    </x-slot:script>

</x-webapplayout>