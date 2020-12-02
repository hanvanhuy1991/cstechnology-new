$(function () {
    // Define variables
    let highlightColorClass = 'table-secondary';

    // Highlight row when checkbox is checked
    $('.table-users').find('tr > td:first-child').find('input[type=checkbox]').on('change', function() {
        if($(this).is(':checked')) {
            $(this).parents('tr').addClass(highlightColorClass);
        }
        else {
            $(this).parents('tr').removeClass(highlightColorClass);
        }
    });

    Core.modalAjax.on('show.bs.modal', function () {
        let modal = $(this);
        $(this).find('.js-select2').select2({
            dropdownParent: modal,
            width: '100%'
        });
    })

});
