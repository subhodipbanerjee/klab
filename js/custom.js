
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


