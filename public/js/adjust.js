window.onload = function() {
    var currentUrl = window.location.href;
    var referrer = document.referrer;
    if (referrer && (referrer === currentUrl || referrer + '#' === currentUrl) && (performance.navigation.type === 2 || performance.navigation.type === 0)) {
        showMessage();
    }
};

function showMessage() {
    document.getElementById("message").style.display = "block";
    setTimeout(function() {
        document.getElementById("message").style.display = "none";
    }, 1000);
}