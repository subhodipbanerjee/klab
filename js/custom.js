jssor_1_slider_init = function() {  
  var jssor_1_options = {
    $AutoPlay: false,
    $AutoPlaySteps: 1,
    $SlideDuration: 1500,
    $SlideWidth: 275,
    $SlideHeight: 600,              
    $SlideSpacing: 3,
    $Cols: 4,
    $ArrowNavigatorOptions: {
      $Class: $JssorArrowNavigator$,
      $Steps: 1
    },
    $BulletNavigatorOptions: {
      $Class: $JssorBulletNavigator$,
      $SpacingX: 1,
      $SpacingY: 1
    }
  };
  var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
  function ScaleSlider() {
    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
    if (refSize) {
      refSize = Math.min(refSize, 809);
      jssor_1_slider.$ScaleWidth(refSize);     
    }
    else {
      window.setTimeout(ScaleSlider, 30);
    }
  }
  ScaleSlider();
  $Jssor$.$AddEvent(window, "load", ScaleSlider);
  $Jssor$.$AddEvent(window, "resize", ScaleSlider);
  $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
};

function init() {
  iimClick();
  myFunction1();
}
function iimClick() {
	$("a.leftMenu_iim").on("click", function (event) {
		$("#iim").show();
		$("#uem").hide();
	});
}
function validate() {
  if( document.sentMessage.name.value == "" ) {
    alert( "Please provide your Name." );
    document.sentMessage.name.focus() ;
	  return false;
  }
  var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
  var c=emailfilter.test(document.sentMessage.email.value);
  if(c==false) {
    alert("Please enter a valid Email ID.");
    document.sentMessage.email.focus();
    return false;
  }
  var a = document.sentMessage.phone.value;
  if(a=="") {
    alert("Contact number can't be Blank");
    document.sentMessage.phone.focus();
    return false;
  } 
  if(isNaN(a)) {
    alert("Please provide a valid 10 digit Mobile Number.");
    document.sentMessage.phone.focus();
    return false;
  }
  if((a.length < 10) || (a.length > 10)) {
    alert("Please provide a valid 10 digit Mobile Number.");
    document.sentMessage.phone.select();
    return false;
  }
  if( document.sentMessage.message.value == "" ) {
    alert( "Please write your message." );
    document.sentMessage.message.focus() ;
	  return false;
  }
  return( true );
}