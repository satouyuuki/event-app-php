window.addEventListener('DOMContentLoaded', (event) => {
    const preview = document.getElementById('preview');
    textPreview(preview);
});

document.addEventListener('keyup', (event) => {
    textPreview(preview);
});

function textPreview(preview) {
    preview.innerHTML = marked(form.text.value);
}
