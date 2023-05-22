/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Form file upload Js File
*/

// Dropzone
var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
dropzonePreviewNode.id = "";
if(dropzonePreviewNode){
    var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
    dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
    var dropzone = new Dropzone(".dropzone", {
        url: '{{ route("partner.store") }}',
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // },
        method: "post",
        paramName: "file",
        previewTemplate: previewTemplate,
        previewsContainer: "#dropzone-preview",
        init: function () {
            var dropzone = this;
            
            // Handle the success and error responses from the server
            this.on("success", function (file, response) {
                console.log(response); // Handle the server response here
            });

            this.on("error", function (file, errorMessage) {
                console.log(errorMessage); // Handle the error message here
            });

            this.on("removedfile", function (file) {
                var index = dropzone.files.indexOf(file);
                if (index !== -1) {
                    dropzone.files.splice(index, 1);
                }
            });
        },
    });
    var form = document.getElementById('form-up');
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        console.log('asdsa');
        dropzone.processQueue(); // Process the file queue before submitting the form
    });
}

// FilePond
FilePond.registerPlugin(
    // encodes the file as base64 data
    FilePondPluginFileEncode,
    // validates the size of the file
    FilePondPluginFileValidateSize,
    // corrects mobile image orientation
    FilePondPluginImageExifOrientation,
    // previews dropped images
    FilePondPluginImagePreview
);

var inputMultipleElements = document.querySelectorAll('input.filepond-input-multiple');
if(inputMultipleElements){

// loop over input elements
Array.from(inputMultipleElements).forEach(function (inputElement) {
    // create a FilePond instance at the input element location
    FilePond.create(inputElement);
})

FilePond.create(
    document.querySelector('.filepond-input-circle'), {
        labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 170,
        imageCropAspectRatio: '1:1',
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        stylePanelLayout: 'compact circle',
        styleLoadIndicatorPosition: 'center bottom',
        styleProgressIndicatorPosition: 'right bottom',
        styleButtonRemoveItemPosition: 'left bottom',
        styleButtonProcessItemPosition: 'right bottom',
    }
);
}