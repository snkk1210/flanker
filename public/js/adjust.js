window.addEventListener('load', function() {
    var currentUrl = window.location.href;
    var referrer = document.referrer;
    var performanceNavigation = performance.getEntriesByType('navigation')[0];
  
    if (referrer && (referrer === currentUrl || referrer + '#' === currentUrl) && (performanceNavigation.type === 'back_forward' || performanceNavigation.type === 'navigate')) {
      showMessage();
    }
});

function showMessage() {
    document.getElementById("message").style.display = "block";
    setTimeout(function() {
        document.getElementById("message").style.display = "none";
    }, 1000);
}