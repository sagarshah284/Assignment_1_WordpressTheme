(function ($) {

    "use strict";
   
    window.Ascreate = {

        init: function () {
            this.postchiled();
            this.homeSlider();
        },
    		
        postchiled: function () {

            $(".child-post").on("mouseover", function () {
            	var mainid = $(this).attr("data-id");
                $('.pages-title').removeClass("page-active");
                $(this).addClass("page-active");
                $('.allchild').css('display', 'none');
                $('.childpage' + mainid).css('display', 'block');
            });

            $(".navbar-toggle").click(function() {
                $( "#cssmenu" ).toggle('down');
            });
            $(window).scroll(function(){
                var windowwidth= window.innerWidth;
                if(windowwidth<=800){
                    $( "#cssmenu" ).hide('down');
                }
            });
        },

        homeSlider: function() {
            $('.slider-box').cycle({
                fx:     'turnDown',
                speed:  'fast',
                timeout: 3000,
                pager:  '.nav-buttons',
                slideExpr: '.slider-show',
                prev:   '.slider-prev',
                next:   '.slider-next',
            });
        }


    }

    $(document).ready(function () {
        	Ascreate.init();
    });
})(jQuery)
