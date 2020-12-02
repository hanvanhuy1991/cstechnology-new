Core.modalAjax.on('show.bs.modal', function() {
    $(this).find('.form-check-input-styled').uniform();
    $('.permission-group-actions > .allow-all, .permission-group-actions > .deny-all').on('click', (e) => {
        let action = e.currentTarget.className.split(/\s+/)[2].split(/-/)[0];
        $(e.currentTarget).closest('.permission-group')
            .find(`.permission-${action}`)
            .each((index, value) => {
                $(value).prop('checked', true);
            });
        $.uniform.update();
    });
    $('.permission-parent-actions > .allow-all, .permission-parent-actions > .deny-all').on('click', (e) => {
        let action = e.currentTarget.className.split(/\s+/)[2].split(/-/)[0];
        $(`.permission-${action}`).prop('checked', true);
        $.uniform.update();
    });
})