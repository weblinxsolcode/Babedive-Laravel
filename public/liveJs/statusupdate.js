
$(function () {
    setInterval(expireEvent, 3000);
    setInterval(expirePackage, 3000);
});

// This function is working expire event
function expireEvent() {
    $.ajax({
        url: "/api/status-update",
        type: "GET",
        success: function (response) {
            // console.log(response);
        }
    });
}

function expirePackage()
{
    $.ajax({
        url: "/api/package-status-update",
        type: "GET",
        success: function (response) {
            // console.log(response);
        }
    });
}
