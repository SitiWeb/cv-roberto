import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import stickybits from 'stickybits';

document.addEventListener('DOMContentLoaded', () => {
    stickybits('#right-content', {
        stickyBitStickyOffset: 40,
        parent: '.grid' // dit moet de container zijn waarin sticky moet blijven
    });
});
