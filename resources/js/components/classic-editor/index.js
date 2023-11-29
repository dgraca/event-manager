(function () {
    "use strict";
    $(".editor").each(function () {
        const el = this;
        ClassicEditor.create(el,{
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            //plugins: [ Base64UploadAdapter],
            // ... other configuration options
            //plugins: [ SourceEditing ],
            //toolbar: [ 'sourceEditing', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo' ],
            //
            toolbar: ['undo', 'redo', '|', 'heading', '|', 'bold', 'italic', '|', 'link', 'insertRepository', 'imageUpload', 'insertTable','blockQuote', 'mediaEmbed', '|', 'bulletedList', 'numberedList', 'indent', 'outdent', 'sourceEditing'],
            //imageUpload
            simpleUpload: {
                uploadUrl: '/file-upload',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }
        }).catch((error) => {
            console.error(error);
        });
    });
})();
