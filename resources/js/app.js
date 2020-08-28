require('./bootstrap');
$('.avatar-form').on('change', function () {
    this.submit();
})

$(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});
