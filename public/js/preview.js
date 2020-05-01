"use strict";
(function () {
    if (checkEditPage()) {
        const preview = document.getElementById('preview');
        textPreview(preview);
        document.addEventListener('keyup', (event) => {
            textPreview(preview);
        });
    }
    else {
        const previewFlg = document.querySelectorAll('.previewFlg');
        const previewNum = previewFlg.length;
        textArrayPreview(previewFlg, previewNum);
        document.addEventListener('keyup', (event) => {
            textArrayPreview(previewFlg, previewNum);
        });
    }


    function textPreview(preview) {
        preview.innerHTML = marked(form.text.value);
    }

    function textArrayPreview(preview, num) {
        for (let i = 0; i < num; i++) {
            let textArea = 'text' + i;
            preview[i].innerHTML = marked(eval(`record.${textArea}.value`));
        }
    }

    function checkEditPage() {
        const mainForm = document.getElementsByName('form');
        return mainForm.length > 0 ? true : false;
    }
}());
