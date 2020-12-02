Core.modalAjax.on('show.bs.modal', function() {
    $(this).find('#add-row').click(function () {
        var optionValue = $('#option-values');
        var clone = optionValue.find('.value-row:first').clone();

        var countRows =  optionValue.find('.value-row').length;

        clone.find('input').each(function() {
            this.name= this.name.replace('[0]', '['+countRows+']');
        });

        clone.find('input').val('').attr('value','').removeClass('border-danger');
        clone.find('.form-group').find('span.form-text').remove();
        clone.insertAfter($('#option-values tbody .value-row:last'));

    });
    $(document).on('click', '.remove-row', function () {
        $(this).closest('tr').remove();
    })
})