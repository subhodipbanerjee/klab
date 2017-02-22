
function init() {
    iimClick();
    uemclick();

    myFunction1();
}


function iimClick() {
    $("a.leftMenu_iim").on("click", function (event) {
    	$("#iim").show();
    	$("#uem").hide();

    });
}

function uemclick(){
	$("a.leftMenu_uem").on("click", function (event) {
		var content = $("#uem").innerHtml();
		$("#uem").html(content);
    //	alert("hi!");
    });

}




