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
    $("#test"+0).on("click", function() {
	$("#dataTable"+0).toggle("slow");
    });	
    $("#test"+1).on("click", function() {
	$("#dataTable"+1).toggle("slow");
    });
    $("#draw").on("click", function() {
	$("#win").toggle("slow");
	$("#lose").toggle("slow");
	$("h4").toggle();
    });
    /*for(var i = 0; i < numb; i++) {
       	$("#test"+i).on("click", function(){
		$("#test"+i).toggle("slow");
    	});
    }*/ 
});
