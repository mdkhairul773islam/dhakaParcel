$(document).ready(function(){
	
	// main-menu
    var target = $('body').data('target'),
		subMenu = $('#'+target).data('target');
	$('#'+target).addClass('active');
	$('#'+subMenu).addClass('active');



	// sub-menu
	var subMenuTarget = $("div.container-fluid").data("target");
	$("a#" + subMenuTarget).addClass('active');

	// alert-box
	$("button.close").on("click", function(e){
		$(this).closest("div.alert").fadeOut(600);
		// $(this).closest("div.alert").remove();
		e.preventDefault();
	});
	
	// nice scroll
	$("#sidebar-wrapper").niceScroll({
		cursorcolor:"#787878",
		smoothscroll: true
	});


});

//Confirmation
function strong_confirm(){
	var conf=prompt("Write 'CONFIRM' To Make Sure to Delete This Data","");
	if (conf=='CONFIRM'){
		return true;
	}
	return false;
}
//$('.aside-nav').addClass('head-slide');

// this script for img preview
function previewFile(place,e) {
  var preview = document.getElementById(place);
  var file    = e.files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}