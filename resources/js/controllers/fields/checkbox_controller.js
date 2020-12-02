import { Controller } from 'stimulus';

export default class extends Controller {
    /**
     *
     */
    connect() {
        if (document.documentElement.hasAttribute('data-turbolinks-preview')) {
            return;
        }
        const checkbox = this.element.querySelector('input');

        $(checkbox).uniform();

        document.addEventListener('turbolinks:before-cache', () => {
            $.uniform.restore(checkbox)
        }, { once: true });
    }
}
