$(document).ready(function() {
    //$("#dominoStatsHead").effect("bounce"); //testing for jquery animations, does WORK!
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
        $("#date").attr("type", "date");
        $(".num").attr("type", "tel");
    }
    else
        $("#date").datepicker({dateFormat: "yy-mm-dd"}).datepicker("setDate", new Date());
});