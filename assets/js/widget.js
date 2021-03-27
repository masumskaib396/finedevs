(function ($) {

"use strict";
console.log('hello owlrd');


/* 
* Portfolio Widget Js
*/
var Finedev_Gallery = function(){
    

}




 // Make sure you run this code under Elementor..
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/fsd-changelog.default', Finedev_Gallery);
    });

})(jQuery);

