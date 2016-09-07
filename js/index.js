$(document).ready(function() {
    //$("#dominoStatsHead").effect("bounce"); //testing for jquery animations, does WORK!
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
        $("#date").attr("type", "date")
    }
    else
        $("#date").datepicker().datepicker("setDate", new Date());
});
