/**
 * Button.
 */

if (typeof jQuery !== 'undefined') {
    $ = jQuery;
}

export const olenkaButton = window.olenkaButton || {

    buttonElements: '.olenka-button a',

    bindEvents: function () {
        $(this.buttonElements).on('click', function () {
            console.log('click');
        });
    },

    init: function () {
        if (typeof jQuery !== 'undefined') {
            this.bindEvents();
        }
    }
};