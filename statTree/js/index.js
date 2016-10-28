$(document).ready(function() {
    function sortDrawAvg() {
        $("#big").hide();
        //sorts the tree by draw time/game average
        var totAvg = $("#totAvg").text(); //works?
        $("#totAvg").hide();
        var avgArr = [];

        for (var i = 0; i < parseInt(totAvg); i++) {
            $("#avg" + i).hide();
            avgArr.push(parseFloat($("#avg"+i).text()));
        }
        for (var j = 0; j < parseInt(totAvg); j++) {
            $("#player"+j).append("<p><strong>Draw Time Per Game Average: </strong><p id='float" + j + "'>" + avgArr[j] + "</p></p>");
        }

        //sorts avgArr from lowest to highest. confirmed to work. probably don't need this, however.
        //avgArr.sort(function(a, b) {return a-b});
        //$("#floatTest").html(avgArr[0] + "<br>" + avgArr[1] + "<br>" + avgArr[2]); //testing to make sure array is sorted low->high. again, probably don't need this.

        //stores html for divs in array. also stores the floats associated with each div for sorting.
        var drawHTML = [];
        var a = 0;
        while (a < avgArr.length) {
            drawHTML.push(
                {"theText": "<div class='col-sm-3 col-centered'>" + $("#player"+a).html() + "</div>", 
                "float": parseFloat($("#float"+a).text())
            });
            a++;
        }

        drawHTML.sort(function(a, b) {
           return a.float - b.float;
        });
        
        //making the tree layout
        var inc = 0;
        for (var i = 0; i < drawHTML.length; i+=2) {
            $("#treeDrawAvg").append("<div class='row row-centered'>");
            for(var j = inc; j <= i; j++) {
                $("#treeDrawAvg").append(drawHTML[j].theText);
            }
            $("#treeDrawAvg").append("</div><hr>");
            inc++;
        }
    }
    
    function sortWins() {
        $("#winDiv").hide();
        //total number of win/loss divs
        var winInc = parseInt($("#winInc").text());
        var divHTML = [];
        
        for (var i = 0; i < winInc; i++) {
            divHTML.push({"theText": "<div class='col-md-3 col-centered back'>"
                          + $("#playerWin"+i).html() + "</div>",
                          "theRatio": parseFloat($("#winRatio"+i).text())});
        }
        
        divHTML.sort(function(a, b) {
           return b.theRatio - a.theRatio; 
        });
        
        //tree layout
        var inc = 0;
        for (var i = 0; i < divHTML.length; i+=2) {
            $("#winLossStat").append("<div class='row row-centered'>");
            for(var j = inc; j <= i; j++) {
                $("#winLossStat").append(divHTML[j].theText);
            }
            $("#winLossStat").append("</div><hr>");
            inc++;
        }
    }
    
    sortDrawAvg();
    sortWins();
    $("#winLossStat").hide();
    $("#statSelect").on("change", function() {
        if ($("#statSelect").val() === "drawAvg") {
            $("#treeDrawAvg").show("slow");
            $("#winLossStat").hide("slow");
        }
        else if ( $("#statSelect").val() === "winnersAndLosers") {
            $("#winLossStat").show("slow");
            $("#treeDrawAvg").hide("slow");
        }
    });
    /* $("#dominoStatsHead").hover(function() {
        $(this).style(""); //testing for hover, works!
    }); */
});