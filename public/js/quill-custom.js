var quill = null;

document.addEventListener("DOMContentLoaded", function() {
    var options = [
        ['bold', 'italic', 'underline'],
        ['blockquote', 'code-block'],
        [{'header': 1}, {'header': 2}],
        [{'list': 'ordered'}, {'list': 'bullet'}],
        [{'indent': '-1'}, {'indent': '+1'}],
        [{'header': [1, 2, 3, 4, 5, 6, false]}],
        [{'color': []}, {'background': []}],
        [{'font': []}],
        [{'align': []}],
        ['link', 'image'],
        ['clean']
    ];

    editor = new Quill('#editor', {
        modules: {
            syntax: true,
            toolbar: options,
        },
        theme: 'snow'
    });

});