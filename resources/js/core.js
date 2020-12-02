import {setLoading} from "./functions";

window.Core = function() {}

Core.ready = function (callback) {
    return jQuery(document).ready(function () {
        return callback(jQuery)
    })
}

Core.modalAjax = $('#modal-ajax');
Core.confirmationModal = $('#modal-confirm');

var Application = function () {

    var _csrf = function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    };
    // Uniform
    var _componentUniform = function() {
        if (!$().uniform) {
            console.warn('Warning - uniform.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.form-input-styled').uniform();
        $('.form-check-input-styled').uniform();
        $('.form-check-input-styled-success').uniform();

    };
    var _componentDatePicker = function() {
        let els = $('.datetime-picker');
        for (let el of els) {
            $(el).flatpickr({
                mode: el.hasAttribute('data-range') ? 'range' : 'single',
                enableTime: el.hasAttribute('data-time'),
                noCalender: el.hasAttribute('data-no-calender'),
                altInput: true,
                altFormat: window.Setting.dateFormat,
                dateFormat: "Y-m-d H:i",
                onReady: function(dateObj, dateStr, instance) {
                    var $cal = $(instance.calendarContainer);
                    if ($cal.find('.flatpickr-clear').length < 1) {
                        $cal.append('<div class="flatpickr-clear"><button class="btn btn-warning btn-sm rounded-round">Clear</button></div>');
                        $cal.find('.flatpickr-clear button').on('click', function() {
                            instance.clear();
                            instance.close();
                        });
                    }
                }
            });
        }
    }

    var _initConfirmModal = function () {
        $(document).on('click', '.js-delete', function () {
            let url = $(this).data('url');
            Core.confirmationModal.modal('show').find('form').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    dataType: 'json',
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function() {
                        window.error('ERROR!');
                    },
                });
            });
        });
    };

    var _initFormComponent = function () {
        $('#button-create').on('click', function() {
            $.ajax({
                url: $(this).data('url'),
                success: function (response) {
                    Core.modalAjax.html(response);
                    Core.modalAjax.modal('show');
                },
                dataType: 'text'
            });
        });
        $('.js-edit').on('click', function() {
            $.ajax({
                url: $(this).data('url'),
                success: function (response) {
                    Core.modalAjax.html(response);
                    Core.modalAjax.modal('show');
                },
                dataType: 'text'
            });
        });
        $(document).on('submit', '.form-ajax', function (e) {
            e.preventDefault();
            let form = $(this);
            let button = form.find('button[type="submit"]');
            let url = form.attr('action');
            let data = new FormData( form[0]);

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function () {
                    setLoading(button);
                },
                success: function (response) {
                    $('#modal-ajax').modal('hide');
                    if (response.hasOwnProperty('redirectUrl')) {
                        window.location.href = response.redirectUrl;
                    } else {
                        window.location.reload();
                    }
                },
                error: function (error) {
                    if (error.status === 422) {
                        $.each(form.find('.form-group'), function (key, group) {
                            $(group).find('.border-danger').removeClass('border-danger');
                            $(group).find('.form-text.text-danger').remove();
                        });
                        const errors = error.responseJSON.errors;
                        Object.keys(errors).forEach(function (field) {
                            let message = errors[field][0];
                            //handle arrays
                            if (field.indexOf('.') !== -1) {
                                field = field.replace('.', '[');
                                //handle multi dimensional array
                                for (let i = 1; i <= (field.match(/./g) || []).length; i++) {
                                    field = field.replace('.', '][');
                                }
                                field = field + "]";
                            }
                            var formGroup = $('[name="' + field + '"]', form).closest('.form-group');
                            //Try array name
                            if (formGroup.length === 0) {
                                formGroup = $('[name="' + field + '[]"]', form).closest('.form-group');
                            }

                            if (formGroup.length === 0) {
                                field = field.replace(/[0-9]/, '');
                                formGroup = $('[name="' + field + '"]', form).closest('.form-group');
                            }
                            $('[name="' + field + '"]', form).addClass('border-danger');
                            $('<span class="form-text text-danger">' + message + '</span>').insertAfter('[name="' + field + '"]');
                            // formGroup.append('<span class="form-text text-danger">' + message + '</span>');
                        });
                    }

                    if (error.status >= 500) {
                        window.error('ERROR!');
                    }
                },
                complete: function () {
                    stopLoading(button);
                }
            });
        });
    };

    var _checkBoxAll = function() {
        $('.checkbox-all').on('change', function (e) {
            let table= $(e.target).closest('table');
            $('td input:checkbox',table).prop('checked',this.checked);
            $.uniform.update();
        });
    }

    var _initSortRow = function() {
        let el = document.getElementById('sortable');
        if (!el) {
            return
        }
        Sortable.create(el, {
            handle: '.dragula-handle',
            animation: 150,
            onEnd: function (/**Event*/evt) {
                let itemEl = evt.item;
                let ids = [];
                let table = $(itemEl).closest('table');
                $('td input:checkbox', table).each(function (index, value) {
                    ids.push($(this).val());
                });
                $.ajax({
                    type: 'POST',
                    url: window.location.protocol + '//' + window.location.hostname + window.location.pathname + '/sort',
                    data: {
                        ids: ids
                    },
                    success: function(response) {
                        success('Sorted');
                    },
                    error: function() {
                        window.error('ERROR!');
                    }
                })
            },
        });
    }

    var _removeLoading = function () {
        $('.loadingcover').fadeOut();
    }

    var _loadingAjax = function () {
        $(document).ajaxStart(() => $('.loadingcover').fadeIn());
        $(document).ajaxComplete(() => $('.loadingcover').fadeOut());
    }

    var _componentSelect2 = function () {
        $('.js-select2').select2({
            width: '100%',
            allowClear: true
        });
    }

    var _loadingSubmitButton = function () {
        $('form').on('submit', function () {
            const button = $(this).find('button[data-loading]');
            setLoading(button);
        });
    }

    var _sticky = function () {
        $('.sidebar-sticky .sidebar').stick_in_parent({
            offset_top: 20,
            parent: '.content'
        });
        // Detach on mobiles
        $('.sidebar-mobile-component-toggle').on('click', function() {
            $('.sidebar-sticky .sidebar').trigger("sticky_kit:detach");
        });

        $('.page-header.page-fixed').stick_in_parent({
            parent: '.content-wrapper'
        });
        // Detach on mobiles
        $('.sidebar-mobile-component-toggle').on('click', function() {
            $('.page-header.page-fixed').trigger("sticky_kit:detach");
        });
    }

    var _stickyAction = function () {
        $(window).scroll(function() {
            let lastCard = $('.left-content .card:last');
            if (lastCard.length == 0) {
                return;
            }
            if($(window).scrollTop() >= lastCard.offset().top + lastCard.outerHeight() - window.innerHeight) {
                $('#action-form').removeClass('action').removeClass('justify-content-center').addClass('justify-content-end');
            } else {
                $('#action-form').addClass('action').addClass('justify-content-center').remove('justify-content-end');
            }
        });
    }

    var _initSubmitType = function () {
        $('.submit-type').click(function () {
            let submitType = $(this).data('submit_type');
            $(this).closest('form').append('<input type="hidden" value="'  + submitType + '" name="submit_type">');
            $(this).closest('form').submit();
        })
    }
    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _csrf();
            _componentUniform();
            _componentSelect2();
            _componentDatePicker();
            _checkBoxAll();
            _initFormComponent();
            _initConfirmModal();
            _initSortRow();
            _removeLoading();
            _loadingSubmitButton();
            _sticky();
            _stickyAction();
            _initSubmitType();
            // _loadingAjax();
        }
    }
}();


// Initialize module
// ------------------------------

Core.ready(function() {
    Application.init();
})
