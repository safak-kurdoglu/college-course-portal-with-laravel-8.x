<!DOCTYPE html>
<html>
<head>
    <title>Laravel Upload Image with Dropzone | Codechief.org</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
</head>
<body>
<h3 style="text-align:center">Just drag and drop to upload file.</h3>
<div class="container">
       
    <form method="post" action='{{url("fileStore?course=$course&path=$path")}}' enctype="multipart/form-data" 
                  class="dropzone" id="dropzone">
    @csrf
</form>   
<script type="text/javascript">
        //Dropzone.autoDiscover = false;
        Dropzone.options.dropzone =
        {
            //maxFilesize: 10,
            addRemoveLinks: true,
            timeout: 50000,
            maxFiles: 20,
            thumbnailWidth:"25",
            thumbnailHeight:"25",
            init: function() { 


            myDropzone = this;
            var file;

            $.ajax({
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
            url: 'fileExisting?course={{$course}}&path={{$path}}',
            type: 'post',
            data: {request: 'fetch'},
             dataType: 'json',
            success: function(response){

            $.each(response, function(key, value) {

                var file = { name: value.name, size: value.size};

                myDropzone.emit("addedfile", file);

                myDropzone.emit("thumbnail", file, value.path);{
               $('[data-dz-thumbnail]').css('height', '120');
               $('[data-dz-thumbnail]').css('width', '120');
               $('[data-dz-thumbnail]').css('object-fit', 'cover');
};    
                myDropzone.emit("complete", file);

            });
            }
});
},

            removedfile: function(file) 
            {
                var name = file.name;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: 'fileDestroy?course={{$course}}&path={{$path}}',
                    data: {filename: name},
                    success: function (fileName){
                        alert("File '" + fileName + "' has been successfully removed!");
                    },
                    error: function(e) {
                        alert("File has not been removed.");
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                alert("File '" + response + "' has been successfully added!");
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
</body>
</html> 