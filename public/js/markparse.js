"use strict";
(function () {
  markParse();
  function markParse() {
    let inputText = document.querySelectorAll('.input-area');
    inputText.forEach((e, i) => {
      e.innerHTML = e.innerHTML.trim();
      e.innerHTML = unescapeHTML(marked(DOMPurify.sanitize(e.innerHTML)));
    });
  }
  function unescapeHTML(target) {
    if (typeof target !== 'string') return target;

    var patterns = {
      '&lt;': '<',
      '&gt;': '>',
      '&amp;': '&',
      '&quot;': '"',
      '&#x27;': '\'',
      '&#x60;': '`'
    };

    return target.replace(/&(lt|gt|amp|quot|#x27|#x60);/g, function (match) {
      return patterns[match];
    });
  };
}());