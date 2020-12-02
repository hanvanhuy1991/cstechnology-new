import 'alpinejs';
import Sortable from 'sortablejs';
window.Popper = require('popper.js').default;
window.Sortable = Sortable;
global.$ = global.jQuery = require('jquery');
require('bootstrap');
require('select2');
require('sticky-kit');
require('flatpickr');

import './vendors/loaders/blockui.min';
import './vendors/forms/styling/uniform.min';
import './vendors/app';
import { notify, info, success, warning, error, setLoading, stopLoading, adminUrl, setTaxonSelect } from './functions';
window.notify = notify;
window.info = info;
window.success = success;
window.warning = warning;
window.error = error;
window.setLoading = setLoading;
window.stopLoading = stopLoading;
window.adminUrl = adminUrl;
window.setTaxonSelect = setTaxonSelect;
import './core';

