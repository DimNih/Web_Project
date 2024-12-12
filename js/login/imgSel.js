document.addEventListener('DOMContentLoaded', function () {
    const input = document.querySelector('input[type="file"]');
    const preview = document.getElementById('preview-image');

    // Menambahkan event listener untuk perubahan input file
    input.addEventListener('change', function (event) {
        previewImage(event);
    });
});

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview-image');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}


