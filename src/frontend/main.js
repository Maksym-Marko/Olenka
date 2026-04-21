/*!
 * This file contains stuff for the frontend part
 *
 * @package Olenka Theme Starter Kit
 * @author Maksym Marko <markomaksym@gmail.com>
 *
 * @link https://markomaksym.com.ua/
 !*/
 
import './assets/css/frontend.css'
import '../assets/css/contact-form-7.scss'

import { olenkaModalWindow } from './components/olenkaModalWindow'
import { olenkaPriceSwitcher } from './components/olenkaPriceSwitcher'
import { olenkaLenis } from './components/olenkaLenis'
import { olenkaScrollToSection } from './components/olenkaScrollToSection'
import { olenkaContentSlider } from './components/olenkaContentSlider'
import { olenkaAnimatedSection } from './components/olenkaAnimatedSection'
import { olenkaFreezeElement } from './components/olenkaFreezeElement'
import { olenkaAnimatedBox } from './components/olenkaAnimatedBox'
import { olenkaAnimatedText } from './components/olenkaAnimatedText'
import { olenkaMenuManager } from './components/olenkaMenuManager'
import { olenkaStickyHeaderManager } from './components/olenkaStickyHeaderManager'

; (function ($) {
    $(function () {

        /**
         * Sticky Header
         */
        olenkaStickyHeaderManager.init();

        /**
         * Toggle Menu
         */
        olenkaMenuManager.init();

        /**
         * Smooth scrolling.
         */
        olenkaLenis.init();

        /**
         * Scroll to Section.
         */
        olenkaScrollToSection.init();

        /**
         * Content Slider.
         */
        olenkaContentSlider.init();

        /**
         * Animated Section.
         */
        olenkaAnimatedSection.init();

        /**
         * Freeze an element when a page is scrolled.
         */
        olenkaFreezeElement.init();

        /**
         * Animation Box.
         */
        olenkaAnimatedBox.init();

        /**
         * Animated Text.
         */
        olenkaAnimatedText.init();

        /**
         * Price switcher
         */
        olenkaPriceSwitcher.init();

        /**
         * Modal Window
         */
        olenkaModalWindow.init();

    });
})(jQuery);
