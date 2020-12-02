$(function() {
    Core.modalAjax.on('show.bs.modal', function () {
        let modal = $(this);
        $(this).find('.js-select2').select2({
            dropdownParent: modal,
            width: '100%'
        });
    })
});