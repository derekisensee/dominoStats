$(document).ready(function() {
    var numb = parseInt($("#playerInc").text());
    
    $("#compare").on("change", function() {
        var divToShow = parseInt($("#compare").val());
        for(var i = 0; i < numb; i++) {
            $("#compareDiv"+i).hide("slow");
        }
        $("#compareDiv"+divToShow).show("slow");
    });
    
    for(var i = 0; i < numb; i++) {
        $("#compareDiv"+i).hide("slow");
    }
    var tableInc = parseInt($("#tableInc").val());
    for(int i = 0; i < tableInc; i++) {
	$("#showGame"+i).click(function(){
	    $("#blah"+i).show("slow");
	});
	$("#hideGame"+i).click(function(){
	    $("#blah"+i).hide("slow");
	});
    }
});
