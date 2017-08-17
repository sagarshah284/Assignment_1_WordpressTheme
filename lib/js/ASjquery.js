sliderimg();
function postchiled(mainid, id) {
    $('.pages-title').removeClass("page-active");
    $(id).addClass("page-active");
    $('.allchild').css('display', 'none');
    $('.childpage' + mainid).css('display', 'block');
}

$(window).scroll(function(){
	var windowwidth= window.innerWidth;
	if(windowwidth<=800){
		$( "#cssmenu" ).hide('down');
	}
});