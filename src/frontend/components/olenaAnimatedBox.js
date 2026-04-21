import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"

/**
 * Enable ScrollTrigger to GSAP.
 */
if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);
}

/**
 * Animation Box.
 */
export const olenkaAnimatedBox = window.olenkaAnimatedBox || {

    zoomInElements: '[data-animation-type="zoomIn"]',
    fadeInRightElements: '[data-animation-type="fadeInRight"]',
    fadeInLeftElements: '[data-animation-type="fadeInLeft"]',
    fadeInUpElements: '[data-animation-type="fadeInUp"]',

    zoomIn: function () {

        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

        const _this = this;

        const zoomIn = document.querySelectorAll(_this.zoomInElements);

        if (zoomIn.length === 0) return;

        zoomIn.forEach(function (el, i) {

            gsap.from(el, {
                scale: '.4',
                scrollTrigger: {
                    trigger: el,
                    start: 'top bottom',
                    end: 'top 60%',
                    scrub: 1
                }
            });

        });

    },

    fadeInRight: function () {

        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

        const _this = this;

        const fadeInRight = document.querySelectorAll(_this.fadeInRightElements);

        if (fadeInRight.length === 0) return;

        fadeInRight.forEach(function (el, i) {

            gsap.from(el, {
                x: '100%',
                scrollTrigger: {
                    trigger: el,
                    start: 'top bottom',
                    end: 'top 60%',
                    scrub: 1
                }
            });

        });

    },

    fadeInLeft: function () {

        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

        const _this = this;

        const fadeInLeft = document.querySelectorAll(_this.fadeInLeftElements);

        if (fadeInLeft.length === 0) return;

        fadeInLeft.forEach(function (el, i) {

            gsap.from(el, {
                x: '-100%',
                scrollTrigger: {
                    trigger: el,
                    start: 'top bottom',
                    end: 'top 60%',
                    scrub: 1
                }
            });

        });

    },

    fadeInUp: function () {

        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

        const _this = this;

        const fadeInUp = document.querySelectorAll(_this.fadeInUpElements);

        if (fadeInUp.length === 0) return;

        fadeInUp.forEach(function (el, i) {

            gsap.from(el, {
                y: '50%',
                scrollTrigger: {
                    trigger: el,
                    start: 'top bottom',
                    end: 'top 60%',
                    scrub: 1
                }
            });

        });

    },

    init: function () {

        this.zoomIn();
        this.fadeInRight()
        this.fadeInLeft();
        this.fadeInUp();

    }

};