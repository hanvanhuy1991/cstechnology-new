import tinyMCE from 'tinymce/tinymce';
import 'tinymce/themes/modern/theme';
import 'tinymce/themes/mobile/theme';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/link';
import 'tinymce/plugins/paste';
import 'tinymce/plugins/autosave';
import 'tinymce/plugins/table';
import 'tinymce/plugins/autolink';
import 'tinymce/plugins/wordcount';
import 'tinymce/plugins/code';
import 'tinymce/plugins/image'
import 'tinymce/plugins/fullscreen'


let isRTL = $('body').hasClass('rtl');

let direction = (isRTL) ? 'rtl' : 'ltr';

tinyMCE.baseURL = `${Setting.baseUrl}/js/wysiwyg`;

tinyMCE.init({
    selector: '.wysiwyg',
    theme: 'modern',
    mobile: { theme: 'mobile' },
    height: 300,
    menubar: false,
    branding: false,
    image_advtab: true,
    image_title: true,
    relative_urls: false,
    directionality: direction,
    cache_suffix: `?v=${Setting.version}`,
    plugins: 'lists, link, table, paste, autosave, autolink, wordcount, code, image, fullscreen',
    toolbar: 'styleselect bold italic underline | bullist numlist | alignleft aligncenter alignright | outdent indent | link table code image fullscreen',
});
