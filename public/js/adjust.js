window.onload = function() {
    var currentUrl = window.location.href;
    var referrer = document.referrer;
    if (referrer && referrer === currentUrl) {
        showMessage();
    }
};

function showMessage() {
    document.getElementById("message").style.display = "block";
    setTimeout(function() {
        document.getElementById("message").style.display = "none";
    }, 1000);
}