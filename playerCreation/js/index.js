$(document).ready(function() {
    var totAvg = $("#totAvg").text(); //works?
    $("#totAvg").hide();
    var avgArr = [];
    
    for (var i = 0; i < parseInt(totAvg); i++) {
        $("#avg" + i).hide();
        avgArr.push(parseFloat($("#avg"+i).text()));
    }
    for (var j = 0; j < parseInt(totAvg); j++) {
        $("#playerP"+j).append("<p><strong>Draw Time Per Game Average: </strong>" + avgArr[j] + "</p>");
    }
    /* $("#dominoStatsHead").hover(function() {
        $(this).style(""); //testing for hover, works!
    }); */
    
    $(".bord").hover(function() {
        $(this).css("background-color", "#969696");
    }, function() {
        $(this).css("background-color", "transparent");
    });
    $("#blah").hide();
	$("#showGame").on("change", function() {
		if ($("#showGame").val() === "blah") {
		    $("#blah").show("slow");
		}
		else if ( $("#showGame").val() !== "blah") {
		    $("#blah").hide("slow");
		}
	}
    /*$("#compare").on("change", function() {
        if($("#compare").val() === )
    });*/
    
});
