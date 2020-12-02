import { ohSnap } from './vendors/ohsnap';

export function notify(type, message, { duration = 5000, context = document }) {
    let types = {
        'info': 'blue',
        'success': 'green',
        'warning': 'yellow',
        'error': 'red',
    };

    ohSnap(message, {
        'container-id': 'notification-toast',
        context,
        color: types[type],
        duration,
    });
}

export function info(message, duration) {
    notify('info', message, { duration });
}

export function success(message, duration) {
    notify('success', message, { duration });
}

export function warning(message, duration) {
    notify('warning', message, { duration });
}

export function error(message, duration) {
    notify('error', message, { duration });
}

export function adminUrl(path) {
    return Setting.adminPrefix + '/' + path;
}
/**
 * @see https://stackoverflow.com/a/3955096
 */
if (! Array.prototype.remove) {
    Array.prototype.remove = function () {
        let what, a = arguments, L = a.length, ax;

        while (L && this.length) {
            what = a[--L];

            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }

        return this;
    };
}

/**
 * @see https://stackoverflow.com/a/4673436
 */
if (! String.prototype.format) {
    String.prototype.format = function () {
        return this.replace(/%(\d+)%/g, (match, number) => {
            return typeof arguments[number] !== 'undefined' ? arguments[number] : match;
        });
    };
}


export function setLoading (button) {
    const initText = button.html();
    const text = button.data('loading-text') || 'Loading...';
    button.attr('disabled', true);
    button.addClass('cursor-wait');
    button.html(`<i class="icon-spinner4 spinner mr-2"></i>${text}`);
    button.attr('initText', initText);
}

export function stopLoading(button) {
    button.removeAttr('disabled');
    button.removeClass('cursor-wait');
    button.html(button.attr('initText'));
}


export function setTaxonSelect(selector) {
    function formatTaxon (taxon) {
        return taxon.pretty_name;
    }
    if ($(selector).length > 0) {
        $(selector).select2({
            placeholder: 'Add taxon',
            width: '100%',
            ajax: {
                url: adminUrl('taxons/search'),
                datatype: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.data,
                        pagination: {
                            more: (params.page * 15) < data.total
                        }
                    };
                },
            },
            templateResult: formatTaxon,
            templateSelection: function(item) { return item.pretty_name || item.text; }
        });
    }
}