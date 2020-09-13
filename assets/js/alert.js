var resultUA = {};
var xmlhttp = new XMLHttpRequest();
xmlhttp.open(
    "GET",
    "http://www.video-game-codeur.fr/download/ws/userAgentCapacityWS.php?ua=" +
    navigator.userAgent +
    "&u=bla&p=bla",
    true
);
xmlhttp.onload = function() {
    resultUA = JSON.parse(xmlhttp.responseText);
    var stringDisplay = "PC";
    if (resultUA.mobile == 1) {
        stringDisplay = "SMARTPHONE";
    } else if (resultUA.tablet == 1) {
        stringDisplay = "TABLETTE";
    }
    document.getElementById("resultUA").innerHTML =
        "Vous utilisez : " + stringDisplay;
};
xmlhttp.send(null);