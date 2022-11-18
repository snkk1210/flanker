window.addEventListener("DOMContentLoaded", () => {
  const textareaEls = document.querySelectorAll(".results");

  textareaEls.forEach((textareaEl) => {
    textareaEl.setAttribute("style", `height: ${textareaEl.scrollHeight}px;`);
  });
});

history.pushState(null, null, location.href);
window.addEventListener('popstate', (e) => {
  history.go(1);
});