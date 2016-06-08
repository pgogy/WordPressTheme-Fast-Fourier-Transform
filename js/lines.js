jQuery(document).ready( function(){
	setInterval(movelines,300);
});

chosen = 0;
turn = 10;

function movelines(){
	if(chosen==0){
		chosen = Math.floor((Math.random()*jQuery("svg").length));
	}
	jQuery("svg")
		.each(
			function(index,value){
				if(index==chosen){
					jQuery(value).children().each(
						function(index,child){
							if(jQuery(child).attr("turn")!="10"){
								turn = 10 - jQuery(child).attr("turn");
								
								if(parseInt(jQuery(child).attr("y1"))>50){
									new_y1 = (jQuery(child).attr("y1") - 50) / turn;
									jQuery(child).attr("y1", (jQuery(child).attr("y1") - new_y1));
								}else{
									new_y1 = (jQuery(child).attr("y1") - 50) / turn;
									jQuery(child).attr("y1", (jQuery(child).attr("y1") - new_y1));
								}
								
								if(parseInt(jQuery(child).attr("y2"))>50){
									new_y2 = (jQuery(child).attr("y2") - 50) / turn;
									jQuery(child).attr("y2", (jQuery(child).attr("y2") - new_y2));
								}else{
									new_y2 = (jQuery(child).attr("y2") - 50) / turn;
									jQuery(child).attr("y2", (jQuery(child).attr("y2") - new_y2));
								}
								jQuery(child).attr("turn", (parseInt(jQuery(child).attr("turn")) + 1));
							}else{
								
								jQuery(child).attr("turn",1);
								jQuery(child).attr("y2", jQuery(child).attr("orig_y2"));
								jQuery(child).attr("y1", jQuery(child).attr("orig_y1"));
								chosen = 0;
								
							}							
						}
					)	
				}
			}
		)
}
