require('./bootstrap');
$('.avatar-form').on('change', function () {
    this.submit();
})

$(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});

function expandTextarea(id) {
    document.getElementById(id).addEventListener('keyup', function() {
        console.log(this.style.height)
        this.style.overflow = 'hidden';
        this.style.height = 0;
        this.style.height = this.scrollHeight + 'px';
        if (Number(this.style.height.replace('px', '')) > 288){
            this.style.overflow = 'visible'
        }
    }, false);
}

expandTextarea('txtarea');
