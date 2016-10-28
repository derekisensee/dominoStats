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

	$("#showGame").click(function(){
	    $("#blah").show("slow");
	});
	$("#hideGame").click(function(){
	    $("#blah").hide("slow");
	});
});
