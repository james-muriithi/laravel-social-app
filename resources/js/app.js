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

let selectedImages = new DataTransfer()

function readURL(input) {
    if (input.files && input.files.length > 0) {

        const files = input.files

        if (files.length <=4 && selectedImages.files.length < 4){
            for (let i = 0; i < files.length ; i++){

                // Closure to capture the file information.
                (function(file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Render thumbnail.
                        let image = document.createElement('img');
                        image.src = e.target.result;
                        image.classList.add('thumbnail', 'p-1')
                        document.getElementsByClassName('preview')[0].insertBefore(image, null);
                    };
                    // Read in the image file as a data URL.
                    reader.readAsDataURL(file);
                    selectedImages.items.add(file);
                })(files[i]);
            }
        }else{
            alert('only 4 images are allowed')
        }
    }
}

$("#images").change(function() {
    readURL(this)
});

$('#post-status').on('submit', function (e) {
    e.preventDefault();
    $("#images").get(0).files = selectedImages.files
    if ($('#txtarea').val().trim() !== '' || $("#images").get(0).files.length > 0){
        this.submit();
    }
});
