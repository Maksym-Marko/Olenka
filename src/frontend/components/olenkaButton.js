/**
 * Button.
 */
export const olenkaButton = window.olenkaButton || {

    buttonElements: '.olenka-button',

    bindEvents: function () {
        const buttonElements = document.querySelectorAll(this.buttonElements);
        buttonElements.forEach(function (el, i) {
            el.addEventListener('click', function () {
                console.log('click');
            });
        });
    },

    init: function () {

        this.bindEvents();
    }
};