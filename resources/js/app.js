// import './bootstrap';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
    init: function () {
        if (document.querySelector('[name="image"]').value.trim()) {
            const img = {
                size: 1234,
                name: document.querySelector('[name="image"]').value.trim(),
            };

            this.options.addedfile.call(this, img);
            this.options.thumbnail.call(this, img, `/uploads/${img.name}`);

            img.previewElement.classList.add('dz-success', 'dc-complete');
        }
    },
});

dropzone.on('success', function (file, response) {
    document.querySelector('[name="image"]').value = response.imagen;
});

dropzone.on('removedfile', function () {
    document.querySelector('[name="image"]').value = '';
});
