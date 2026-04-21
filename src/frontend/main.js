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

import { olenkaButton } from './components/olenkaButton'

; (function ($) {
    $(function () {

        /**
         * Button
         */
        olenkaButton.init();
    });
})(jQuery);
