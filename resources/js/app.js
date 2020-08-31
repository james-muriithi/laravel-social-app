require('./bootstrap');
$('.avatar-form').on('change', function () {
    this.submit();
})

$(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});

function expandTextarea(id) {
    document.getElementById(id).addEventListener('keyup', function() {
        this.style.overflow = 'hidden';
        this.style.height = 0;
        this.style.height = this.scrollHeight + 'px';
        if (Number(this.style.height.replace('px', '')) > 288){
            this.style.overflow = 'visible'
        }
    }, false);
}

expandTextarea('txtarea');

$('#post-status').on('submit', function (e) {
    e.preventDefault();
    if ($('#txtarea').val().trim() !== ''){
        this.submit();
    }
});

function readURL(input) {
    if (input.files && input.files.length > 0) {

        const files = input.files

        for (let i = 0; i < files.length ; i++){

            // Closure to capture the file information.
            (function(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Render thumbnail.
                    let image = document.createElement('img');
                    image.src = e.target.result;
                    image.class = 'thumbnail'
                    document.getElementsByClassName('preview')[0].insertBefore(image, null);
                };
                // Read in the image file as a data URL.
                reader.readAsDataURL(file);
            })(files[i]);

            // console.log(files.length)
            // reader.onload = function(e) {
            //     $('.preview').append(`<img src="${e.target.result}" />`);
            // }
            //
            // reader.readAsDataURL(files[i]); // convert to base64 string
        }
    }
}

$("#images").change(function() {
    readURL(this)
});

