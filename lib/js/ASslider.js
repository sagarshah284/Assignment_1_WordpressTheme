var loop=0;
function sliderimg() {   
	        var td=datatotal();
	        var id=$(".slider-box").attr("data-load"); 	           
           	if(id==td){id=1;}else{id++;}             	
           	if(loop==0){
                looppointe(id,td); 
               	loop++;
            } 
           	looppost(id,td); 
           	looppointeactive(id,td);           	
           	setTimeout(function () {            	
                sliderimg();
            }, 8000);
}
function datatotal() {
	var td=0;
	$(".slider-data").each(function () {
		 td++;
	});
	return td;	
}
function looppointe(id,td){
	
	$(".view-position").html("");     
	var margin=100/td;
	td++;
	for(i=1;i<td;i++)
	 {
		var dataimg='<img class="pagepoint pagepoint'+i+'" onclick="loadthis('+i+')" src="./wp-content/themes/AScreative/images/';
    		if(id==i){
      dataimg+='slider-active.png';
    		}else{
      dataimg+='slider-unactive.png';
    		}
    		dataimg+='" style="margin-top: '+margin+'px;"/>';
    		
    		$(".view-position").append(dataimg); 
    } 
}
function looppointeactive(id,td){
	$(".pagepoint").attr("src","./wp-content/themes/AScreative/images/slider-unactive.png");
	$(".pagepoint"+id).attr("src","./wp-content/themes/AScreative/images/slider-active.png");
}
function loadthis(id) {
	var td=datatotal();
	looppointeactive(id,td);          	 
	looppost(id,td);
}
function looppost(id,td)
{  
	
	$(".slider-box").attr("data-load",id); 
    var img = $(".slider-data" + id).attr("data-img");
    $(".slider-data").css('display','none');
    $(".slider-data"+ id).css('display','block');
    $(".slider-box").attr('style','background-image: url('+img+');');
   
    
}
function nextload() {	
	var td=datatotal();
	 id=$(".slider-box").attr("data-load");
	 if(id==td){id=1;}else{id++;} 		
	 looppointeactive(id,td);          	 
 	 looppost(id,td); 
}
function prevload() {
	var td=datatotal();
	id=$(".slider-box").attr("data-load");
	if(id==1){id=td;}else{id--;} 	
	looppointeactive(id,td);          	 
	looppost(id,td);
	 
}