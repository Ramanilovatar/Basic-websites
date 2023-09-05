var $ = document;
var clock = $.getElementById('clock');
setInterval(() => {
    const currentDate = new Date();
    var secondRatio = currentDate.getSeconds();
    var minuteRatio = currentDate.getMinutes();
    var hourRatio = currentDate.getHours();
    if (hourRatio > 12) {
        hourRatio = hourRatio - 12;
    }
    clock.textContent = secondRatio + " : " + minuteRatio + " : " + hourRatio;
}, 1000)