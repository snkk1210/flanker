window.addEventListener("DOMContentLoaded", () => {
    const textareaEls = document.querySelectorAll(".results");
  
    textareaEls.forEach((textareaEl) => {
      textareaEl.setAttribute("style", `height: ${textareaEl.scrollHeight}px;`);
    });
});