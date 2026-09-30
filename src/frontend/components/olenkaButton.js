/**
 * Button.
 */

const $ = typeof jQuery !== 'undefined' ? jQuery : undefined;

export const olenkaButton = window.olenkaButton || {

    buttonElements: '.olenka-button a',

    bindEvents: function () {
        $(this.buttonElements).on('click', function () {
            // Button click handler — add frontend behavior here.
        });
    },

    init: function () {
        if (typeof jQuery !== 'undefined') {
            this.bindEvents();
        }
    }
};