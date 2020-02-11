window.$ = require('jquery');

$(function() {
    const $dropArea = $('.js-area-drop');
    const $fileInput = $('.js-input-file');

    $dropArea.on('dragover', function(e) {
        e.stopPropagation();
        e.preventDefault();
    });
    $dropArea.on('dragleave', function(e) {
        e.stopPropagation();
        e.preventDefault();
    });
    $fileInput.on('change', function(e) {
        let file = this.files[0],
            $img = $(this).siblings('.js-img'),
            fileReader = new FileReader();

        fileReader.onload = function(event) {
            $img.attr('src', event.target.result).show();
        };

        if(file) {
            // console.log(file);
            fileReader.readAsDataURL(file);
        } else {
            // console.log('a');
        }
    });
})
