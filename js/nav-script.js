var a = 0;
function display(){
	if(a == 0){
		jQuery('#myslidemenu').addClass('menushow');
		a = 1;
	}
	else if(a == 1){
		jQuery('#myslidemenu').removeClass('menushow');
		a = 0;
	}		
}