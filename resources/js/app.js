import './bootstrap';

document.body.addEventListener('closeModal', function () {
    document.getElementById('journal-modal').innerHTML = '';
});

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
